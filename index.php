<!DOCTYPE html>
<html>
<head>
	<title>ajax</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
	<script language="javascript">
		function loadAjax(){
			$.ajax({
				url : "result.php",
				type : "post",
				dataType : "text",
				data : {
					number : $('#number').val()
				},
				success : function (result){
					$('#result').html(result)
				}
			});
		}
	</script>
</head>
<body>
	<div id="result">

	</div>
	<br/>
	<input type="text" value="" id="number"/>
	<input type="button" name="clickme" id="clickme" onclick="loadAjax()" value="Click Me"/>
</body>
</html>