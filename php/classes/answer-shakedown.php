<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("answer.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");

$answer = new Answer(null, 1, 2, "The answer", null);
$answer->insert($pdo);
$answer->setAnswerText("A better answer");
$answer->update($pdo);
$answer->delete($pdo);