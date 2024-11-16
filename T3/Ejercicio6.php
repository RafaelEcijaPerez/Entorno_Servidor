<?php
$us_price = 4;
$rates = [
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'a' => 1.30,
    'c' => 1.25,
];

function calculate_prices($usd, $exchange_rates)
{
    $prices = [
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        'aud' => $usd * $exchange_rates['a'],
        'cad' => $usd * $exchange_rates['c']
    ];
    return $prices;
}

function format_price($amount, $currency)
{
    switch ($currency) {
        case 'pound':
            return '&pound;' . number_format($amount, 2);
        case 'euro':
            return '&euro;' . number_format($amount, 2);
        case 'yen':
            return '&yen;' . number_format($amount, 2);
        case 'aud':
            return 'A$' . number_format($amount, 2);
        case 'cad':
            return 'C$' . number_format($amount, 2);
        default:
            return '$' . number_format($amount, 2);
    }
}

$global_prices = calculate_prices($us_price, $rates);
$products = [
    'Chocolate Bar' => 4,
    'Candy Cane' => 2.5,
    'Lollipop' => 1.5
];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Functions with Multiple Values</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>The Candy Store</h1>
    <h2>Product Prices</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Product</th>
                <th>US Price</th>
                <th>UK (Pounds)</th>
                <th>EU (Euros)</th>
                <th>JP (Yen)</th>
                <th>AUD (Australian Dollar)</th>
                <th>CAD (Canadian Dollar)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product => $price) : 
                $prices = calculate_prices($price, $rates); ?>
                <tr>
                    <td><?= $product ?></td>
                    <td>$<?= number_format($price, 2) ?></td>
                    <td><?= format_price($prices['pound'], 'pound') ?></td>
                    <td><?= format_price($prices['euro'], 'euro') ?></td>
                    <td><?= format_price($prices['yen'], 'yen') ?></td>
                    <td><?= format_price($prices['aud'], 'aud') ?></td>
                    <td><?= format_price($prices['cad'], 'cad') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
