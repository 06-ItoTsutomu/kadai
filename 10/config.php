<?php

define("DSN","mysql:host=localhost;dbname=gs_line;charset=utf8");
define("DB_USER","root");
define("DB_PASSWORD","");

define("SITE_URL","");
define("PASSWORD_KEY","");

error_reporting(E_ALL & ~E_NOTICE);

session_set_cookie_params(0,"/");