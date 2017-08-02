<?php
$pos = strpos($_SERVER['REQUEST_URI'], "~siwa15");
if ($pos == false) {
    return [
        "dsn"             => "mysql:host=localhost;dbname=anax_lite",
        "username"        => "user",
        "password"        => "pass",
        "driver_options"  => null,
    ];
} else {
    return [
        "dsn"             => "mysql:host=blu-ray.student.bth.se;dbname=siwa15",
        "username"        => "siwa15",
        "password"        => "pFXiRRTahMW9",
        "driver_options"  => null,
    ];
}



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
 * Get value from POST variable or return default value.
 *
 * @param mixed $key     to look for, or value array
 * @param mixed $default value to set if key does not exists
 *
 * @return mixed value from POST or the default value
 */
function getPost($key, $default = null)
{
    if (is_array($key)) {
        // $key = array_flip($key);
        // return array_replace($key, array_intersect_key($_POST, $key));
        foreach ($key as $val) {
            $post[$val] = getPost($val);
        }
        return $post;
    }

    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}

/**
 * Check if key is set in POST.
 *
 * @param mixed $key     to look for
 *
 * @return boolean true if key is set, otherwise false
 */
function hasKeyPost($key)
{
    return array_key_exists($key, $_POST);
}

/**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 *
 * @return str the formatted slug.
 */
function slugify($str)
{
    $str = mb_strtolower(trim($str));
    $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
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
