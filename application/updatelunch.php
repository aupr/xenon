<?php
include DIR_APPLICATION.'header.php';

$day = isset($_POST['day'])?$_POST['day']:date('j');
$month = isset($_POST['month'])?$_POST['month']:date('n');
$year = isset($_POST['year'])?$_POST['year']:date('Y');
echo date_default_timezone_get();
?>
<h4>DATE: <i><?=$day.' / '.$month.' / '.$year?></i></h4>
<form action="" method="post" autocomplete="off">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SL</th>
            <th>NAME</th>
            <th>MOBILE No.</th>
            <th>ADDRESS</th>
            <th>BALANCE</th>
            <th>Meal</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <input type="number" name="reference_1" class="form-control" min="0" max="50">
            </td>
        </tr>
        </tbody>
    </table>
    <input type="submit" name="submit" class="btn btn-primary" value="UPDATE">
</form>

<?php

include DIR_APPLICATION.'footer.php';