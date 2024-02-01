<?php
require_once base_path("src/routing/middleware/Middleware.php");
class Guest extends Middleware
{

    public function handle()
    {
        if (Session::has("user")) {
            redirect("/");
        }
    }
}
