<?php
include DIR_APPLICATION.'header.php';

$page = isset($_GET['page'])?$_GET['page']:1;

// Pagination section
$memberCount = $db->query("SELECT '' FROM user");
$pagination->total = $memberCount->num_rows;
$pagination->limit = 5;
$pagination->page = $page;
$pagination->url = $url->applink('memberlist', 'page={page}');

// Sql Data fetch
$sqlLimit = $pagination->sqlLimit();
$memberList = $db->query("SELECT * FROM user $sqlLimit");

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
        $sl = $pagination->getSqlLimitStart();
        for ($i=0; $i<$memberList->num_rows; $i++){
            $sl++;
            ?>
            <tr>
                <td><?=$sl?></td>
                <td><?=$memberList->rows[$i]['fullName']?></td>
                <td><?=$memberList->rows[$i]['mobileNumber']?></td>
                <td><?=$memberList->rows[$i]['email']?></td>
                <td><?=$memberList->rows[$i]['address']?></td>
                <td><?=$memberList->rows[$i]['recipe']?></td>
                <td><?=$memberList->rows[$i]['balance']?></td>
                <td>
                    <a href="<?=$url->applink('addmember', 'edit='.$memberList->rows[$i]['id'])?>" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php

echo $pagination->render();

include DIR_APPLICATION.'footer.php';
?>