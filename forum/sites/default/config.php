<?php

/* 
 * @CODOLICENSE
 */

defined('IN_CODOF') or die();

$installed=true;

function get_codo_db_conf() {


    $config = array (
  'driver' => 'mysql',
  'host' => 'localhost',
  'database' => 'forum_test',
  'username' => 'root',
  'password' => '',
  'prefix' => '',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
);

    return $config;
}

$DB = get_codo_db_conf();

$CONF = array (
    
  'driver' => 'Custom',
  'UID'    => '59d7d250a902f',
  'SECRET' => '59d7d250a902f',
  'PREFIX' => ''
);
