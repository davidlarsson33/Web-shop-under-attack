<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new ReviewDbHandler($dbConfig, 'db-username', 'db-password');

require base_path("src/views/reviews.view.php");

?>