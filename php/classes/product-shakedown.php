<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once("product.php");
$pdo = connectToEncryptedMySQL("/etc/apache2/data-design/jfindley2.ini");


$product = new Product(null, "imagefile", 10, "Info", "Detail", "Tech", "Name");
$product->insert($pdo);
$product->setProductName("This is the new name");
$product->update($pdo);
$product->delete($pdo);