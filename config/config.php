<?php
// Data & Error logging
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_NAME')) define('DB_NAME', 'xml_datafeed');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '');
if (!defined('ERROR_LOG_FILE')) define('ERROR_LOG_FILE', 'error.log');
ini_set('log_errors', 1);
ini_set('error_log', ERROR_LOG_FILE);

if (!defined('SQL_INSERT_QUERY')) define('SQL_INSERT_QUERY', "
    INSERT INTO items (
    Brand, CaffeineType, CategoryName, Count, Count_agg, description,
    entity_id, entity_id_agg, Facebook, Facebook_agg, Flavored, image,
    Instock, IsKCup, IsKCup_agg, link, name, price, price_agg,
    Rating, Rating_agg, Seasonal, shortdesc, sku
  ) VALUES (
                :Brand, :CaffeineType, :CategoryName, :Count, :Count_agg, :description, 
                :entity_id, :entity_id_agg, :Facebook, :Facebook_agg, :Flavored, :image, 
                :Instock, :IsKCup, :IsKCup_agg, :link, :name, :price, :price_agg, 
                :Rating, :Rating_agg, :Seasonal, :shortdesc, :sku
            )
");




