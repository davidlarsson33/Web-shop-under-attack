<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new ReviewDbHandler($dbConfig, 'db-username', 'db-password');

$errors = (new ReviewFormValidator())->validateFormData($_POST);

if (empty($errors)) {
    insertReview($db, $_POST);
}

require base_path("src/views/reviews.view.php");


function insertReview($db, $postData)
{
    $db->insertReview($postData);
}



?>