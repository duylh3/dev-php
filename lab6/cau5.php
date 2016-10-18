<html>
    <head>
        <title>Calculator</title>
        <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
    </head>
    <body>

        <div class="row">

            <div class="col-md-5">
                <header class="panel-heading">
                    <h3 class="panel-header">My Calculator</h3>
                </header>
                <div class="panel-body">
                    <form method='post' action='cau5.php'>
                        <div class="form-group">
                            <label>Number 1</label>
                            <input type="text" class="form-control" name='number1' >
                        </div>
                        <div class="form-group">
                            <label>Number 1</label>
                            <input type="text" class="form-control" name='number2' >
                        </div>
                        <div class="form-group">
                             <label>Operation</label>
                            <select name='action' class="form-control m-bot15">
                                <option>+</option>
                                <option>-</option>
                                <option>*</option>
                                <option>/</option>
                                <option>^</option>
                                <option>+/-</option>
                            </select>
                        </div>
                        <input type='submit' class="btn btn-block btn-primary" name='submit' value='Calculator'>
                    </form>

                </div>

            </div>

    </body>
    <?php
    if (isset($_POST['submit'])) {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $action = $_POST['action'];
        if ($action == "+") {
            echo "<b>Your Answer is:</b><br>";
            echo $number1 + $number2;
        }
        if ($action == "-") {
            echo "<b>Your Answer is:</b><br>";
            echo $number1 - $number2;
        }
        if ($action == "*") {
            echo "<div>Your Answer is:</b><br>";
            echo $number1 * $number2;
        }
        if ($action == "/") {
            echo "<b>Your Answer is:</b><br>";
            echo $number1 / $number2;
        }
        if ($action == "^") {
            echo "<b>Your Answer is:</b><br>";
            echo pow($number1, $number2);
        }
        if ($action == "+/-") {
            echo "<b>Your Answer is:</b><br>";
            echo pow($number1, $number2);
        }
    }
    ?>
</html>


