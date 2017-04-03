<?php
    include DIR_APPLICATION.'header.php';

    if (isset($_POST['submit'])) {
        $fullName = $_POST['fullName'];
        $mobileNumber = $_POST['mobileNumber'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $mDate = $_POST['mDate'];
        $recipe = $_POST['recipe'];
        $deposit = $_POST['deposit'];
        $info = $_POST['info'];

        $checkExists = $db->query("SELECT mobileNumber FROM user WHERE mobileNumber = '$mobileNumber'");

        if ($checkExists->num_rows > 0) {
            ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <b>Error: </b>This member already been exists!
            </div>
            <a href="<?=$url->applink('addmember')?>" class="btn btn-primary">TRY AGAIN</a>
            <?php
        } else {
            $db->query("INSERT INTO user (fullName, mobileNumber, email, address, mDate, recipe, deposit, info)
                    VALUES ('$fullName', '$mobileNumber', '$email', '$address', '$mDate', '$recipe', '$deposit', '$info')");

            ?>

            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <b>Success: </b>A new member has been inserted successfully!
            </div>
            <a href="<?=$url->applink('addmember')?>" class="btn btn-primary">ADD ANOTHER MEMBER</a>

            <?php
        }
    } else {
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">ADD NEW MEMBER</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td><label for="fullName">Full Name</label></td>
                            <td> : </td>
                            <td><input type="text" id="fullName" name="fullName" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="mobileNumber">Contact Number</label></td>
                            <td> : </td>
                            <td><input type="text" id="mobileNumber" name="mobileNumber" class="form-control" maxlength="11" required></td>
                        </tr>
                        <tr>
                            <td><label for="email">E-mail ID</label></td>
                            <td> : </td>
                            <td><input type="text" id="email" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="address">Address</label></td>
                            <td> : </td>
                            <td><input type="text" id="address" name="address" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="mDate">Membership Date</label></td>
                            <td> : </td>
                            <td><input type="text" id="mDate" name="mDate" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="recipe">Recipe</label></td>
                            <td> : </td>
                            <td><input type="text" id="recipe" name="recipe" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="deposit">Initial Deposit</label></td>
                            <td> : </td>
                            <td><input type="number" id="deposit" name="deposit" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="info">Organization/Dignity/Info</label></td>
                            <td> : </td>
                            <td><input type="text" id="info" name="info" class="form-control"></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Member">
                </form>
            </div>
        </div>
        <?php
    }

    include DIR_APPLICATION.'footer.php';