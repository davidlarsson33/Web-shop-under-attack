<?php


class AutoLoader
{
     public static function databaseLoader($className)
     {
          if (str_contains($className, "Db") || str_contains($className, "Database")) {
               require_once base_path("src/db/$className.php");
          }

     }

     public static function utilityLoader($className)
     {
          if (str_contains($className, "Validator")) {
               require_once base_path("src/utilities/$className.php");
          }

     }

}

spl_autoload_register('AutoLoader::databaseLoader');
spl_autoload_register('AutoLoader::utilityLoader');
?>