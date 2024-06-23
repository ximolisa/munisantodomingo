<?php

include './database/SQLSRVConnector.php';

use database\SQLSRVConnector;

$connector = SQLSRVConnector::getInstance();
$connection = $connector->getConnection();

$sql = "SELECT * FROM Customers";

$statement = $connection->prepare($sql);
$statement->execute();

$customers = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        li:nth-child(even) {
            background: #ecf0f1;
        }
    </style>
</head>
<body>
    
    <h1>Customers</h1>
    <ul>
        <?php foreach ($customers as $customer) { ?>
            <li><?php echo $customer['CustomerID'] . " - " . $customer['CompanyName']; ?></li>
        <?php } ?>
    </ul>

</body>
</html>
