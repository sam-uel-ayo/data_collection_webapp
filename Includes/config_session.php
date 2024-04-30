<?php

/*
Set the php initialize cookie and mode to true (security)
*/
ini_set('session.use_only_cokkies', 1);
ini_set('session.use_strict_mode', 1);

/*
Change the cookie parameter
*/
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

/*
Start session
*/
session_start();

/*
Change session cookie every 30 minutes
*/
if (!isset($_SESSION["Last_regeneration"])) {
    regenerate_session_id();
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["Last_regeneration"] >= $interval){
        regenerate_session_id();
    }
}

/*
Function that regenerate session id and check(time) when it was last generated
*/
function regenerate_session_id() 
{
    session_regenerate_id(); //Regenerate session id
    $_SESSION["Last_regeneration"] = time(); //Check when the last cookie was generated with the time function
}
