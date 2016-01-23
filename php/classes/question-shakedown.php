<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("question.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");

$question = new Question(null, 1, 2, "Huh?", null);
$question->insert($pdo);
$question->setQuestionText("What?");
$question->update($pdo);
$question->delete($pdo);