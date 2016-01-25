<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("helpful-vote.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");

$helpfulVote = new HelpfulVote(1, 2, TRUE);
$helpfulVote->insert($pdo);
$helpfulVote->setTheVote(FALSE);
$helpfulVote->update($pdo);
$helpfulVote->delete($pdo);