<?php
require_once base_path("src/db/ReviewDbHandler.php");
require_once base_path("src/utilities/ReviewFormValidator.php");

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new ReviewDbHandler($dbConfig, 'db-username', 'db-password');

$review = $_POST["text-area"];
$review = $_POST["nbrOfStars"];
$errors = (new ReviewFormValidator())->validateFormData($_POST);

if (empty($errors)) {
    $db->insertReview($_POST);
}

require base_path("src/views/reviews.php");

?>