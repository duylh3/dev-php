<?php
include_once 'db/db.php';
include_once 'db/function.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$idErr = $nameErr = $yearErr = "";
$error = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = getCarById($db, $id);

    if (isset($_POST['update'])) {
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
            $sql = "UPDATE cars SET name='$name',year=$year WHERE id = $id";
            $stmt = $db->prepare($sql);
            $respon = $stmt->execute();
            if ($respon) {
                $stmt->closeCursor();
                header('Location: index.php');
            }
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
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Edit Cars </h2>
                        <form class="form-horizontal" method="POST" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" value="<?php echo $data['id'] ?>" disabled="">
                                    <span class="text-danger"><?php echo $idErr; ?></span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $data['name'] ?>">
                                    <span class="text-danger"><?php echo $nameErr; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="year">Year</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="year" placeholder="Enter year" value="<?php echo $data['year'] ?>">
                                    <span class="text-danger"><?php echo $yearErr; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="update" value="Update" class="btn btn-primary">Update</button>
                                    <a href="index.php" class="btn btn-default">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <?php
} 

