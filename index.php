<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML= req.responseText;
				}
			}
			req.open('GET','chat.php',true );
			req.send();
			setInterval(function(){ajax()},1000);
		}

	</script>
</head>
<body onload="ajax();">
<div id="container">
	<div id="chat_box">
	<div id="chat"></div>
	</div>
	<form method="post" action="index.php">
		<input type="text" name="name" placeholder="enter your name">
		<textarea name="msg" placeholder="enter the messge"></textarea>
		<input type="submit" name="submit" value="send">
	</form>
	<?php
    
     if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $query = "INSERT INTO chat (name,message) VALUES ('$name','$msg')";
    $run = $con->query($query);

     if($run){
     echo "<embed loop='false' src='tone.mp3' hidden='true' autoplay='true' />";
     header("refresh:1;url=index.php");
 }

}
	?>
</div>
</body>
</html>