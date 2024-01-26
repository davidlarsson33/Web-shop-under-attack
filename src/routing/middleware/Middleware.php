<?php
require_once base_path("src/routing/middleware/Guest.php");
require_once base_path("src/routing/middleware/Authenticated.php");
abstract class Middleware
{
    private static $MAP = [
        'GUEST' => Guest::class,
        'AUTHENTICATED' => Authenticated::class,
    ];

    abstract public function handle();

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::$MAP[strtoupper($key)];

        if (!$middleware) {
            throw new Exception("There is no middleware associated with the key '$key' ");
        }

        (new $middleware)->handle();
    }


}

?>