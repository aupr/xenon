<?php

function orderDataFormat($unit, $price) {
    return array('version_1'=>array('unit'=>$unit, 'price'=>$price));
}


function updateOrderData($day, $month, $year, $userId, $data) {
    global $edb;

    $newOneDayExpense = $data['version_1']['price'] * $data['version_1']['unit'];

    $rud = $edb->select('user', "expense", "WHERE id='$userId'");
    $rod = $edb->select('orders',"expense, d_$day", "WHERE reference='$userId' AND year='$year' AND month='$month'");

    if ($rod->num_rows > 0) {
        $oldValue = json_decode($rod->row["d_$day"], true);
        $oldPrice = isset($oldValue['version_1']['price'])?$oldValue['version_1']['price']:0;
        $oldUnit = isset($oldValue['version_1']['unit'])?$oldValue['version_1']['unit']:0;
        $OldOneDayExpense = $oldPrice * $oldUnit;

        $expense = $rod->row['expense'] + ($newOneDayExpense - $OldOneDayExpense);

        $udt = array(
            "d_$day"=>json_encode($data),
            "expense"=>$expense
        );

        $edb->update('orders', $udt, "reference='$userId' AND year='$year' AND month='$month'");

        // to update user total expense
        $totalExpense = $rud->row['expense'] + ($newOneDayExpense - $OldOneDayExpense);

        $tedt = array(
            "expense"=>$totalExpense
        );

        $edb->updateById('user', $tedt, $userId);
    } else {

        $udt = array(
            "d_$day"=>json_encode($data),
            "expense"=>$newOneDayExpense,
            'reference'=>$userId,
            'year'=>$year,
            'month'=>$month
        );

        echo $edb->insert('orders', $udt);

        // to update user total expense
        $totalExpense = $rud->row['expense'] + $newOneDayExpense;

        $tedt = array(
            "expense"=>$totalExpense
        );

        $edb->updateById('user', $tedt, $userId);
    }
}