<?php 
	include_once 'db/function.php';
	
	$db = new PDO ( DB_INFO, DB_USER, DB_PASS );
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'submit'){
		$fullname = testInput($_POST['fullname']);
		$email = testInput($_POST['email']);
		$password = testInput($_POST['password']);
		$phone = testInput($_POST['phone']);
		$address = testInput($_POST['address']);
		$gender = testInput($_POST['gender']);
		$hobby = testInput(implode(',',$_POST['hobby']));
		
		$sql = 'INSERT INTO register (fullname, email, password, phone, address, gender, hobby) VALUES (?,?,?,?,?,?,?)';
		
		$stml = $db->prepare($sql);

		$res = $stml->execute ( array (
				$fullname,
				$email,
				$password,
				$phone,
				$address,
				$gender,
				$hobby
		) );
		if ($res) {			
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
		} else {
			$errTyp = "false";
			$errMSG = "Something went wrong, try again later...";
		}
		$stml->closeCursor();
	}
?>
<html>
    <head>
        <title>Register form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Register form</h2>
                          <?php
                        if (isset($errTyp)) {
                        	
                            ?>
                            <div class="form-group">
                                <div>
                                    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
               
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="fullname">Full name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fullname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="password">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="re-password">Re-password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="re-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="phone">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="address">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="gender">Gender</label>
                            <div class="col-sm-9">
                                <label class="radio-inline"><input type="radio" name="gender" value="male"> Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="female"> Female</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="other"> Other</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="hobby">Hobby</label>
                            <div class="col-sm-9">
                                <label class="checkbox-inline"><input type="checkbox" name="hobby[]" value="football">Football </label>
                                <label class="checkbox-inline"><input type="checkbox" name="hobby[]" value="volleyball">Volleyball </label>
                                <label class="checkbox-inline"><input type="checkbox" name="hobby[]" value="badminton">Badminton </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-sm-6">
                                 <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                                 <button type="reset" name="reset" value="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

