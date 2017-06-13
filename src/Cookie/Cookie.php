<?php

namespace Knutte\Cookie;

class Cookie
{
    private $expire;
    /**
     * Constructor
     * Sets $expire to 30 days. 86400 = 1 day * 30 = 30 days
     * @return void
     */
    public function __construct($time = 86400*30)
    {
        $this->expire = time() + $time;
    }
    /**
     * Check if key exists in $_COOKIE
     * @param $key string The key to check for in $_COOKIE
     * @return bool true if $key exists, otherwise false
     */
    public function has($key)
    {
        return array_key_exists($key, $_COOKIE);
    }
    /**
     * Sets a cookie
     * @param $name string The name of the $_COOKIE
     * @param $val string The value of the $_COOKIE
     * @return void
     */
    public function set($key, $value)
    {
        setcookie($key, $value, $this->expire);
    }
    /**
     * Retrieve a cookie
     * @param $key string The key to get from $_COOKIE
     * @param $default optional The return value if not found
     * @return string The cookie if present, else $default
     */
    public function get($key, $default = false)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
    }
    /**
     * Dumps the $_COOKIE
     * Good for debugging
     * @return void
     */
    public function dump()
    {
        var_dump($_COOKIE);
    }
    /**
     * Deletes variable from $_COOKIE if exists
     * @param $key string The key variable to unset from $_COOKIE
     * @return void
     */
    public function delete($key)
    {
        unset($_COOKIE[$key]);
    }
    /**
     * Destroys all variables from $_COOKIE if exists
     * @return void
     */
    public function destroy()
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, time()-3600);
        }
    }
}
