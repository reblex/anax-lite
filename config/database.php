<?php
return [
    "dsn"             => "mysql:host=localhost;dbname=anax_lite",
    "username"        => "user",
    "password"        => "pass",
    "driver_options"  => null,
];

/**
 * Get value from GET array or return default value.
 * @param  string $key     Key for which value to get
 * @param  mixed $default Return value if key is not found
 * @return $_GET value or default
 */
function getGet($key, $default = null)
{
    return isset($_GET[$key])
        ? $_GET[$key]
        : $default;
}


/**
 * Get value from POST array or return default value.
 * @param  string $key     Key for which value to get
 * @param  mixed $default Return value if key is not found
 * @return $_POST value or default
 */
function getPost($key, $default = null)
{
    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}


/**
 * Sanitize value for safe output in view.
 * @param  string $value value to sanitize
 * @return Sanitized string
 */
function esc($value)
{
    return htmlentities($value);
}
