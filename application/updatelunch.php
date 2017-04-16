<?php
include DIR_APPLICATION.'header.php';

$day = isset($_GET['day'])?$_GET['day']:date('j');
$month = isset($_GET['month'])?$_GET['month']:date('n');
$year = isset($_GET['year'])?$_GET['year']:date('Y');

echo date_default_timezone_get();

?>

    <h4>DATE: <i><?=$day.' / '.$month.' / '.$year?></i></h4>

<?php
if (isset($_POST['submit'])) {
    echo "<pre>";

    // process posted data for update query
    $updateReqData = array();
    foreach ($_POST as $key=>$value) {
        $ret = explode('_', $key);
        $ref = array_pop($ret);
        if ($ret) {
            if (!isset($updateReqData[$ref])) {
                $updateReqData[$ref] = orderDataFormat($_POST['unit_'.$ref], $_POST['price_'.$ref]);
            }
        }
    }

    // Update corresponding data or insert if not updated
    foreach ($updateReqData as $userId=>$data) {
        updateOrderData($day, $month, $year, $userId, $data);
    }

    echo "</pre>";
} else {
    $memberList = $edb->select('user', '*');
    $prevOrders = $edb->select('orders', "'id', reference, d_$day", "WHERE year='$year' AND month='$month'" );

    $udt = array();
    foreach ($prevOrders->rows as $key=>$value) {
        $udt[$value['reference']] = json_decode($value["d_$day"], true);
    }

    echo "<pre>";
    //print_r($udt);
    echo "</pre>";

    ?>

    <form action="" method="post" autocomplete="off">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>NAME</th>
                <th>MOBILE No.</th>
                <th>ADDRESS</th>
                <th>BALANCE</th>
                <th>PRICE</th>
                <th>UNIT</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($memberList->rows as $key=>$value) {
                $sl = $key + 1;
                ?>
                <tr>
                    <td><?=$sl?></td>
                    <td><?=$value['fullName']?></td>
                    <td><?=$value['mobileNumber']?></td>
                    <td><?=$value['address']?></td>
                    <td><?=$value['deposit']-$value['expense']?></td>
                    <td>
                        <input type="number" name="price_<?=$value['id']?>" class="form-control" min="0" value="<?=isset($udt[$value['id']])?$udt[$value['id']]['version_1']['price']:'0'?>" max="200">
                    </td>
                    <td>
                        <input type="number" name="unit_<?=$value['id']?>" class="form-control" min="0" value="<?=isset($udt[$value['id']])?$udt[$value['id']]['version_1']['unit']:'0'?>" max="50">
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input type="submit" name="submit" class="btn btn-primary" value="UPDATE">
    </form>
    <?php
}

include DIR_APPLICATION.'footer.php';