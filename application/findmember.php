<?php
include DIR_APPLICATION.'header.php';

$key = isset($_POST['key'])?$_POST['key']:'';
?>

    <h3>Search by name or phone number</h3>

    <form class="form-inline" action="" role="search" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="key" placeholder="name or phone partial" value="<?=$key?>">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Search result</h3>
        </div>
        <div class="panel-body">
            <?php
            if ($key != "") {
                $res = $edb->select("user", "*", "WHERE fullName LIKE '$key%' OR fullName LIKE '% $key%' OR mobileNumber LIKE '%$key%'");
                //var_dump($res);
                if ($res->num_rows > 0) {
                    ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($res->rows as $indx=>$val) {
                            ?>
                            <tr>
                                <td><?=$indx+1?></td>
                                <td><?=$val['fullName']?></td>
                                <td><?=$val['mobileNumber']?></td>
                                <td>
                                    <a href="<?=$url->applink('addmember', 'edit='.$val['id'])?>" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?=$url->applink('addmoney', 'mid='.$val['id'].'&key='.$key)?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    Found nothing...
                    <?php
                }
            } else {
                ?>
                Nothing searched yet!
                <?php
            }
            ?>
        </div>
    </div>

<?php
include DIR_APPLICATION.'footer.php';
?>