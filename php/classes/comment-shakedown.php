<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("comment.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");

$comment = new Comment(null, 1, 2, "text", null);
$comment->insert($pdo);
$comment->setCommentText("More text");
$comment->update($pdo);
$comment->delete($pdo);