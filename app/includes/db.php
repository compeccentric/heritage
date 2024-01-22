<?php

$db['db_host'] = "mysql";
$db['db_user'] = "user";
$db['db_pass'] = "password";
$db['db_name'] = "heritage";

define("DB_HOST",  'mysql');
define("DB_USER",  'user');
define("DB_PASS",  'password');
define("DB_NAME",  'heritage');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
