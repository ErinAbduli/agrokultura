<?php
include_once "CategorySeeder.php";
include_once "SubcategorySeeder.php";
include_once "Database.php";
include_once "ProductSeeder.php";

$db = new Database();
$connection = $db->getConnection();
$seeder = new ProductSeeder($connection);
$seeder->seed();

?>