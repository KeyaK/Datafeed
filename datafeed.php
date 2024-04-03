<?php

require 'config/config.php';

class DataFeed {

    private $pdo;

    public function __construct(PDO $pdo = null) {
        $this->pdo = $pdo;
    }

    public function importData() {
        $file = 'data/feed.xml';
        try {
            $xml = simplexml_load_file($file);
            if (!$xml) {
                throw new Exception("Failed to load XML file: {$file}");
            }

            $stmt = $this->pdo->prepare(SQL_INSERT_QUERY);

            // Preparation of data from XML
            $preparedData = $this->prepareDataFromXml($xml);

            // Insert prepared data into the database
            foreach ($preparedData as $data) {
                $this->insertItem($stmt, $data);
            }

            echo "XML data has been successfully imported into the database.\n";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function prepareDataFromXml($xml): array
    {
        $preparedData = [];

        foreach ($xml->item as $item) {
            $data = [];
            foreach ($this->getColumns() as $column) {
                $data[$column] = isset($item->{$column}) && trim($item->{$column}) !== '' ? (string)$item->{$column} : null;
            }
            $preparedData[] = $data;
        }

        return $preparedData;
    }

    protected function getColumns(): array
    {
        return [
            'Brand', 'CaffeineType', 'CategoryName', 'Count', 'Count_agg', 'description',
            'entity_id', 'entity_id_agg', 'Facebook', 'Facebook_agg', 'Flavored', 'image',
            'Instock', 'IsKCup', 'IsKCup_agg', 'link', 'name', 'price', 'price_agg',
            'Rating', 'Rating_agg', 'Seasonal', 'shortdesc', 'sku'
        ];
    }

    public function insertItem(PDOStatement $stmt, $data): bool
    {
        $dataBind = [];
        foreach ($this->getColumns() as $column) {
            $dataBind[':' . $column] = $data[$column] ?? null;
        }

        try {
            $stmt->execute($dataBind);
            return true;
        } catch (PDOException $e) {
            error_log("Error inserting item: " . $e->getMessage());
            echo "Error inserting item: " . $e->getMessage() . "\n";
            return false;
        }
    }
}

try {
    // Database connection
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "Connected successfully\n";
} catch (PDOException $e) {
    // Log the error message to the error.log file
    error_log("Database connection error: " . $e->getMessage());
    // Print an error message
    echo "Database connection error: " . $e->getMessage() . "\n";
    // Exit the script or handle the error accordingly
    exit(1); // Exit with non-zero status code to indicate an error
}

$dataFeed = new DataFeed($pdo);
$dataFeed->importData();
