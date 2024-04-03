<?php

require_once 'datafeed.php';

use PHPUnit\Framework\TestCase;

class DataFeedTest extends TestCase {

    public function testPrepareDataFromXml()
    {
        // Loading XML file containing test data
        $xmlFile = 'data/test_feed.xml';
        $xml = simplexml_load_file($xmlFile);

        // Mock the PDO object
        $pdoMock = $this->createMock(PDO::class);

        $pdoMock->expects($this->never())
            ->method($this->anything());

        // Instance of DataFeed with the mock PDO object
        $dataFeed = new DataFeed($pdoMock);

        $preparedData = $dataFeed->prepareDataFromXml($xml);

        $this->assertCount(2, $preparedData);

        $expectedItem1 = [
            'entity_id' => '1',
            'CategoryName' => 'Category 1',
            'sku' => 'SKU001',
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'shortdesc' => 'Short description of Product 1',
            'price' => '10.99',
            'link' => 'http://example.com/product1',
            'image' => 'http://example.com/images/product1.jpg',
            'Brand' => 'Brand A',
            'Rating' => '4.5',
            'CaffeineType' => 'Caffeinated',
            'Count' => '100',
            'Count_agg' => 'Aggregated Count for Product 1',
            'Flavored' => 'No',
            'Seasonal' => 'No',
            'Instock' => 'Yes',
            'Facebook' => 'http://facebook.com/product1',
            'IsKCup' => 'No',
            'entity_id_agg' => 'Entity ID Aggregated for Product 1',
            'Facebook_agg' => 'Facebook Aggregated for Product 1',
            'IsKCup_agg' => 'IsKCup Aggregated for Product 1',
            'Rating_agg' => 'Rating Aggregated for Product 1',
            'price_agg' => 'Price Aggregated for Product 1'
        ];

        $this->assertEquals($expectedItem1, $preparedData[0]);

        $expectedItem2 = [
            'entity_id' => '2',
            'CategoryName' => 'Category 2',
            'sku' => 'SKU002',
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'shortdesc' => 'Short description of Product 2',
            'price' => '19.99',
            'link' => 'http://example.com/product2',
            'image' => 'http://example.com/images/product2.jpg',
            'Brand' => 'Brand B',
            'Rating' => '4.0',
            'CaffeineType' => 'Decaffeinated',
            'Count' => '50',
            'Count_agg' => 'Aggregated Count for Product 2',
            'Flavored' => 'Yes',
            'Seasonal' => 'No',
            'Instock' => 'Yes',
            'Facebook' => 'http://facebook.com/product2',
            'IsKCup' => 'Yes',
            'entity_id_agg' => 'Entity ID Aggregated for Product 2',
            'Facebook_agg' => 'Facebook Aggregated for Product 2',
            'IsKCup_agg' => 'IsKCup Aggregated for Product 2',
            'Rating_agg' => 'Rating Aggregated for Product 2',
            'price_agg' => 'Price Aggregated for Product 2'
        ];

        $this->assertEquals($expectedItem2, $preparedData[1]);
    }
}
