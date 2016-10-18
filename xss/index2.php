<?php
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';
    //echo $content;
	
    include_once 'HTMLPurifier/HTMLPurifier.standalone.php';
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.DefinitionID', 'enduser-customize.html tutorial');
    $config->set('HTML.DefinitionRev', 1);
    $purifier = new HTMLPurifier();
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>XSS Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body bgcolor="#ffffff">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<div>Title: </div>
<div>
    <input type="text" name="title" value="<?php echo $purifier->purify($title); ?>" />
</div>

<div>Content: </div>
<div>
    <textarea type="text" name="content" cols="50" rows="20"><?php echo $purifier->purify($content); ?></textarea>
</div>
<div>
    <input type="submit" value="Submit" />
</div>
</form>

<p>&nbsp;</p>
    
<div>Hiển thị kết quả</div>
<div>Title: </div>
<div><?php echo $purifier->purify($title); ?></div>
<div>Content: </div>
<div><?php echo $purifier->purify($content); ?></div>

</body>
</html>
