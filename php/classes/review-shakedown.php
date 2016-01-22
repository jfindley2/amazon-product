<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("review.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");


$review = new Review(null, 1, 2, "It was ok", 1, null);
$review->insert($pdo);
$review->setReviewText("It was decent");
$review->update($pdo);
$review->delete($pdo);