<?php

function openDBConnection() {
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
}
function closeDBConnection() {
	mysql_close();
}

function getReplies() {
	$replies = array();

	$sql = "select * from replies;";
	$query = mysql_query($sql);
	while ($res = mysql_fetch_array($query)) {
		$replies[] = new Reply(array(
			"name" => $res["name"],
			"text" => $res["text"]
		));
	}
	return $replies;
}

function postReply($params) {
	foreach ($params as $key => $val) {
		$$key = $val;
	}
	$sql = "insert into replies select NULL, '$name', '$text';";
	mysql_query($sql);
}

