<?php
include_once "CategorySeeder.php";
include_once "SubcategorySeeder.php";
include_once "Database.php";

$db = new Database();
$connection = $db->getConnection();
// $seeder = new CategorySeeder($connection);
// $seeder->seed();
$seeder = new SubcategorySeeder($connection);
$seeder->seed();

?>