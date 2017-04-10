<?php
/**
 * Created by PhpStorm.
 * User: Aman
 * Date: 4/3/2017
 * Time: 8:17 AM
 */

// Object for easy data base
global $edb;
$edb = new edb(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

// Object for pagination
$pagination = new pagination();
$pagination->num_links = 5;