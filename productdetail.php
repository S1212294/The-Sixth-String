<?php
// Databaseverbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dummydatabase";

// Maak verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Haal productinformatie op
$Id = isset($_GET['id']) ? intval($_GET['id']) : 1; // Default productId is 1
$sql = "SELECT * FROM producten WHERE Id = $Id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product niet gevonden.");
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['Naam']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F9F9F9;
            margin: 0;
            padding: 0;
            color: #0F0F0F;
        }
        .header {
            background-color: #5cb85c;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 4px solid #5cb85c;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 1.1em;
        }
        main {
            padding: 20px;
        }
        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 20px;
        }
        .product-image {
            flex: 1;
            background-color: #E5E5E5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 300px;
        }
        .product-details {
            flex: 2;
            background-color: #FFF;
            padding: 20px;
            border: 1px solid #E5E5E5;
        }
        .product-details h1 {
            color: #007BFF;
        }
        .product-details .prijs {
            color: #FF0033;
            font-size: 24px;
            margin: 10px 0;
        }
        .product-details button {
            background-color: #007BFF;
            color: #FFF;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .product-details button:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-top: 4px solid #222;
            flex-shrink: 0;
            margin-top: 341.9px;
        }
        .footer p {
            margin: 5px 0;
            font-size: 0.9em;
        }
        .footer a {
            color: #5cb85c;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Guitarshop The Sixth String</h1>
    <p>Efficiënt beheer van de productgegevens</p>
</div>

<main>
    <div class="product-container">
        <div class="product-image">
            <p>Afbeelding hier</p>
        </div>
        <div class="product-details">
            <h1><?php echo htmlspecialchars($product['Naam']); ?></h1>
            <p><?php echo htmlspecialchars($product['Beschrijving']); ?></p>
            <p class="prijs"><?php echo htmlspecialchars($product['Prijs']); ?></p>
            <p>Voorraad: <?php echo htmlspecialchars($product['Voorraad']); ?></p>
            <button>In mijn Winkelwagen</button>

        </div>
    </div>
</main>

<div class="footer">
    <p>© 2024 Guitarshop The Sixth String. Alle rechten voorbehouden.</p>
    <p>Contact: <a href="mailto:support@thesixthstring.nl">support@thesixthstring.nl</a></p>
</div>
</body>
</html>