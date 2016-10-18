<?php
include_once 'db/db.php';
include_once 'db/function.php';
$db = new PDO(DB_INFO, DB_USER, DB_PASS);
$data = getAllCars($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Example</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>List Cars</h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thread>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thread>
                                <tbody>
                                    <?php foreach ($data as $entry) { ?>
                                        <tr>
                                            <td><?php echo $entry['id'] ?></td>
                                            <td><?php echo $entry['name'] ?></td>
                                            <td><?php echo $entry['year'] ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $entry['id'] ?>" class="btn btn-default" data-original-title="Sửa">Edit
                                                    <i class="icon-next"></i>
                                                </a>
                                                <a href="delete.php?id=<?php echo $entry['id'] ?>" class="btn btn-danger tooltips" data-placement="top" data-original-title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa?');">
                                                    Delete
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <a href="add.php" class="btn btn-info"> Thêm mới </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>