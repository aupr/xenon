<?php
include DIR_APPLICATION.'header.php';

$page = isset($_GET['page'])?$_GET['page']:1;
$limit = 50;
$startPoint = ($page*$limit)-$limit;
$endPoint = 1*$limit;

$memeberCount = $db->query("SELECT '' FROM user");
$memeberList = $db->query("SELECT * FROM user LIMIT $startPoint, $endPoint");

/*echo "<pre>";
print_r($memeberList);
echo "</pre>";*/

?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Email ID</th>
            <th>Address</th>
            <th>Recipe</th>
            <th>Balance</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sl = $startPoint;
        for ($i=0; $i<$memeberList->num_rows; $i++){
            $sl++;
            ?>
            <tr>
                <td><?=$sl?></td>
                <td><?=$memeberList->rows[$i]['fullName']?></td>
                <td><?=$memeberList->rows[$i]['mobileNumber']?></td>
                <td><?=$memeberList->rows[$i]['email']?></td>
                <td><?=$memeberList->rows[$i]['address']?></td>
                <td><?=$memeberList->rows[$i]['recipe']?></td>
                <td><?=$memeberList->rows[$i]['balance']?></td>
                <td>Edit/delete</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php

echo getPageList($memeberCount->num_rows, $limit, $page, $url->applink('memberlist', 'page={page}'));

include DIR_APPLICATION.'footer.php';
?>