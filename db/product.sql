CREATE DATABASE IF NOT EXISTS xml_datafeed;

USE xml_datafeed;

CREATE TABLE IF NOT EXISTS items (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    Brand VARCHAR(255),
                                    CaffeineType VARCHAR(255),
                                    CategoryName VARCHAR(255),
                                    Count INT,
                                    Count_agg VARCHAR(255),
                                    description TEXT,
                                    entity_id INT,
                                    entity_id_agg VARCHAR(255),
                                    Facebook VARCHAR(255),
                                    Facebook_agg VARCHAR(255),
                                    Flavored VARCHAR(255),
                                    image VARCHAR(255),
                                    Instock VARCHAR(255),
                                    IsKCup VARCHAR(255),
                                    IsKCup_agg VARCHAR(255),
                                    link VARCHAR(255),
                                    name VARCHAR(255),
                                    price DECIMAL(10, 2),
                                    price_agg VARCHAR(255),
                                    Rating DECIMAL(3, 2),
                                    Rating_agg VARCHAR(255),
                                    Seasonal VARCHAR(255),
                                    shortdesc TEXT,
                                    sku VARCHAR(255)
    );
