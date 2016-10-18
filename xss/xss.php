<?php
    //setcookie('name', time());
    $filePath = 'data/';
    $fileHandle = fopen($filePath . time(), 'w+');
//    foreach($_COOKIE as $key => $value) {
//        fwrite($fileHandle, $key . '=' . $value . PHP_EOL);
//        echo $key . '=' . $value . '<br />';
//    }
    
    if (isset($_GET['query']))
    {
        $query = $_GET['query'];
        $params = explode(';', $query);
        foreach($params as $param) {
            $item = explode('=', $param);
            $key = trim($item[0]);
            $value = $item[1];
            fwrite($fileHandle, $key . '=' . $value . PHP_EOL);
            echo $key . '=' . $value . '<br />';
        }
    }    
    
    fclose($fileHandle);
    //phpinfo();
?>
