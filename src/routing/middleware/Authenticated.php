<?php
require_once base_path("src/routing/middleware/Middleware.php");
class Authenticated extends Middleware
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {

            header("Location: /");
            
            exit();
        }

    }
}
?>