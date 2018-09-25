<?php
define('DB_SERVER', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

// Cronjob key
define('KEY', '2136DAasUIt');
define('MAXIMUM_MONEY_NEWPLAYER', '1000000');
define('MAXIMUM_MONEY_24H', '3000000');
define('MAXIMUM_MONEY_3D', '4000000');
define('MAXIMUM_MONEY_1W', '8000000');
define('MAXIMUM_MONEY_1m', '15000000');
define('MAXIMUM_MONEY_3m', '25000000');

// Show data in view user
define('SHOW_PROPERTIES', true);
define('SHOW_CAR_LIST', true);

// Set Tables and Columns
define('USERS_TABLE', 'users');
define('USERS_TABLE_COLUM_ID', 'id');
define('USERS_TABLE_COLUM_TIMEPLAYED', 'timeplayed');
define('USERS_TABLE_COLUM_ONLINE', 'online');

// Banned Table
define('USERS_BANNED_TABLE', 'ea_bans');
define('USERS_BANNED_ID_COLUMN', 'banid');

// Kicks table
define('KICKS_TABLE', 'kicks');
define('KICKS_COLUMN_STEAMID', 'steamid');
define('KICKS_COLUMN_REASON', 'reason');
define('KICKS_COLUMN_KICKED', 'kicked');

// Owned vehicles table
define('OWNED_VEHICLES_TABLE', 'owned_vehicles');
define('OWNED_VEHICLES_OWNER_COLUMN', 'owner');

// Inventory Table
define('TRUNK_INVENTORY_TABLE', 'truck_inventory');
define('TRUNK_INVENTORY_COLUM_ID', 'id');

// Accounts table
define('USER_ACCOUNTS_TABLE', 'user_accounts');
define('USER_ACCOUNTS_IDENTIFIER_COLUMN', 'identifier');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
