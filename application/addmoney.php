<?php
include DIR_APPLICATION.'header.php';

$id = isset($_REQUEST['mid'])?$_REQUEST['mid']:"";
$key = isset($_REQUEST['key'])?$_REQUEST['key']:"";

$membera = $edb->select("user", "*", "WHERE id=$id");
$member = $membera->row;
if ($membera->num_rows > 0) {
    ?>
    <h3>Add money to the account of: </h3>
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="image/self/svg/ic_contacts_black_24px.svg" alt="AVATAR" height="80px" width="80px">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=$member['fullName']?></h4>
            <table>
                <tbody>
                <tr>
                    <td>Designation</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?=$member['designation']?></td>
                </tr>
                <tr>
                    <td>Organization</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?=$member['org']?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?=$member['mobileNumber']?></td>
                </tr>
                <tr>
                    <td>E-mail ID</td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?=$member['email']?></td>
                </tr>
                <tr>
                    <td><b>Balance</b></td>
                    <td>&nbsp;:&nbsp;</td>
                    <td><?=$member['deposit']-$member['expense']?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <?php
} else {
    echo "<h2>Bad request!!!</h2>";
}
include DIR_APPLICATION.'footer.php';
?>