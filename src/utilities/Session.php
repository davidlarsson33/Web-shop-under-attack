<?php

class Session
{

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function has($key, $default = null)
    {
        return (bool) static::get($key);
    }
    
    public static function destroy()
    {
        static::flush();
        session_destroy();
        static::destroySessionCookie();
    }

    public static function flush()
    {
        session_unset();
    }

    public static function destroySessionCookie()
    {
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}
