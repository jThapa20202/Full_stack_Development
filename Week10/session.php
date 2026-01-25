<?php

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false,     // set true if using HTTPS
    'httponly' => true,    // prevents JS access
    'samesite' => 'Lax'    // helps prevent CSRF
]);

session_start();
