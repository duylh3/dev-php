<?php

    function clean_string($string)
    {
      $canCheckUTF8Error = defined('PREG_BAD_UTF8_ERROR') && function_exists('preg_last_error');

      // Remove any attribute starting with "on" or xmlns
      $tmp = preg_replace('#(<[^>]+[\x00-\x20\"\'])(on|xmlns)[^>]*>#iUu',"$1>",$string);
      if ($canCheckUTF8Error && (PREG_BAD_UTF8_ERROR == preg_last_error()))
      {
          $tmp = preg_replace('#(<[^>]+[\x00-\x20\"\'])(on|xmlns)[^>]*>#iU',"$1>",$string);
      }
      $string = $tmp;

      // Remove javascript: and vbscript: protocol
      $tmp = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iUu','$1=$2nojavascript...',$string);
      if ($canCheckUTF8Error && (PREG_BAD_UTF8_ERROR == preg_last_error())) {
          $tmp = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2nojavascript...',$string);
      }
      $string = $tmp;
      $tmp = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iUu','$1=$2novbscript...',$string);
      if ($canCheckUTF8Error && (PREG_BAD_UTF8_ERROR == preg_last_error())) {
          $tmp = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iU','$1=$2novbscript...',$string);
      }
      $string = $tmp;

      // <span style="width: expression(alert('Ping!'));"></span>
      // only works in ie...
      $string = preg_replace('#(<[^>]+)style[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*).*expression[\x00-\x20]*\([^>]*>#iU',"$1>",$string);
      $string = preg_replace('#(<[^>]+)style[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*).*behaviour[\x00-\x20]*\([^>]*>#iU',"$1>",$string);
      $tmp = preg_replace('#(<[^>]+)style[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*).*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*>#iUu',"$1>",$string);
      if ($canCheckUTF8Error && (PREG_BAD_UTF8_ERROR == preg_last_error())) {
          $tmp = preg_replace('#(<[^>]+)style[\x00-\x20]*=[\x00-\x20]*([\`\'\"]*).*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*>#iU',"$1>",$string);
      }
      $string = $tmp;

      // Remove namespaced elements (we do not need them...)
      $string = preg_replace('#</*\w+:\w[^>]*>#i',"",$string);

      // Remove all control (i.e. with ASCII value lower than 0x20 (space),
      // except of 0x0A (line feed) and 0x09 (tabulator)
      $search =
        "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x0B\x0C\x0E\x0F\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x1A\x1B\x1C\x1D\x1E\x1F";
      $replace = //str_repeat("\r", strlen($search2));
        "\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D\x0D";

      $string = str_replace("\r\n", "\n", $string);
      $string = str_replace("\r",   "\n", $string);
      $string = strtr($string, $search, $replace);
      $string = str_replace("\r", '', $string);  // \r === \x0D

      // Remove really unwanted tags
      do {
        $oldstring = $string;
        $string = preg_replace('#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i',"",$string);
      } while ($oldstring != $string);

      return $string;
    }

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';
	
    //$title = clean_string($title);
    //$content = clean_string($content)
	
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
    <input type="text" name="title" value="<?php echo $title; ?>" />
</div>

<div>Content: </div>
<div>
    <textarea type="text" name="content" cols="50" rows="20"><?php echo $content; ?></textarea>
</div>

<div>
    <input type="submit" value="Submit" />
</div>
</form>

<p>&nbsp;</p>
    
<div>Hiển thị kết quả</div>
<div>Title: </div>
<div><?php echo $title; ?></div>
<div>Content: </div>
<div><?php echo $content; ?></div>


</body>
</html>
