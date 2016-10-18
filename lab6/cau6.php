<!DOCTYPE html>
<html>
    <head>
        <title>Register from</title>
        <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <?php
        $firstnameErr = $lastnameErr = $emailErr = $passwordErr = $aboutErr = "";
        if (isset($_POST['submit'])) {
            if (strlen($_POST['firstname']) >= 30 || strlen($_POST['firstname']) <= 2) {
                $firstnameErr = "First name in 2-30 characters";
            }
            if (strlen($_POST['lastname']) >= 30 || strlen($_POST['lastname']) <= 2) {
                $lastnameErr = "Last name in 2-30 characters";
            }
            if (strlen($_POST['email']) >= 30 || strlen($_POST['email']) <= 2) {
                $passwordErr = "Password in 2-30 characters";
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
            if (strlen($_POST['about']) >= 1000) {
                $aboutErr = "About error";
            } else {
                echo '<h1> Complete!!</h1>';
            }
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Register form</h3>
                    </header>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First name">
                                <span class="error"><?php echo $firstnameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last name">
                                <span class="error"><?php echo $lastnameErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <span class="error"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                <span class="error"><?php echo $passwordErr; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2" for="inputSuccess">Birthday</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label>Date</label>
                                            <select class="form-control m-bot15">
                                                <?php
                                                for ($i = 1; $i <= 31; $i++) {
                                                    echo "<option> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Month</label>
                                            <select class="form-control m-bot15">
                                                <?php
                                                for ($i = 1; $i <= 12; $i++) {
                                                    echo "<option> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Year</label>
                                            <select class="form-control m-bot15">
                                                <?php
                                                for ($i = 1960; $i <= 2016; $i++) {
                                                    echo "<option> $i </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gender </label>

                                <label class="radio-inline"><input type="radio" name="optradio">Male</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Female</label>
                                <label class="radio-inline"><input type="radio" name="optradio">Other</label>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-lg-2" for="inputSuccess">Country</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15">
                                                <option>Vietnam</option>
                                                <option>Australia</option>
                                                <option>United States</option>
                                                <option>India</option>
                                                <option>Other</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">About</label>
                                <textarea class="form-control" rows="5" name="about"></textarea>
                                <span class="error"><?php echo $aboutErr; ?></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="submit">Success</button>
                                <button type="reset" class="btn btn-success" value="Reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </section>	
            </div>
        </div>

    </body>
</html>