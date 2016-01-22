<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("profile.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");

$profile = new Profile(null, "Jacob", "ABQ", "I am Jake");
$profile->insert($pdo);
$profile->setProfileName("Jake");
$profile->update($pdo);
$profile->delete($pdo);