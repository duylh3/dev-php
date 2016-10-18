<?php
include_once 'db/db.php';
include_once 'db/function.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$idErr = $nameErr = $yearErr = "";
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'submit') {
    $message = [];
    $id = test_input($_POST['id']);
    $name = test_input($_POST['name']);
    $year = test_input($_POST['year']);
    $message = check($id, $name, $year);
    $error = $message[0];
    $idErr = $message[1];
    $nameErr = $message[2];
    $yearErr = $message[3];

    if (!$error) {
        $sql = 'INSERT INTO cars (id, name, year) VALUES (?,?,?)';
        $stml = $db->prepare($sql);
        var_dump($stml);die;
        $res = $stml->execute(array($_POST['id'], $_POST['name'], $_POST['year']));
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
        } else {
            $errTyp = "false";
            $errMSG = "Something went wrong, try again later...";
        }
        $stml->closeCursor();
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Create New Cars </h2>
                    <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <?php
                        if (isset($errMSG)) {
                            ?>
                            <div class="form-group">
                                <div>
                                    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" placeholder="Enter id">
                                <span class="text-danger"><?php echo $idErr; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                                <span class="text-danger"><?php echo $nameErr; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="year">Year</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="year" placeholder="Enter year">
                                <span class="text-danger"><?php echo $yearErr; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Insert</button>
                                <button type="reset" name="reset" class="btn btn-default">Reset</button>
                                 <a href="index.php" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
