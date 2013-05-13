<?php

error_reporting(E_ALL);

include "classes/Reply.php";
include "configure.php";
include "common_functions.php";
include "db_queries.php";

openDBConnection();

if(isset($_GET["postReply"]) && $_GET["postReply"] == "form") {
	$action = "showPostReplyForm";
} elseif(isset($_GET["postReply"]) && $_GET["postReply"] == "posted") {
	$action = "postReply";
	$params = array(
		"name" => $_POST["name"],
		"text" => $_POST["text"]
	);
	postReply($params);
	$replies = getReplies();
} else {
	$action = "listReplies";
	$replies = getReplies();
}

closeDBConnection();

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>dummy title</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">

</head>
<body>

<?php 
if($action == "showPostReplyForm")
	loadTemplate("templates/postReply.phtml");
else
	loadTemplate("templates/listReplies.phtml");
?>


</body>
</html>