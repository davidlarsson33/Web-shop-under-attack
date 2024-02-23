<?php
header("Content-Security-Policy: frame-ancestors 'none';");

$BASE_PATH = __DIR__ . '/../';

require $BASE_PATH . "src/utilities/functions.php";

require base_path("public/Autoloader.php");

require base_path("src/routing/router.php");

?>