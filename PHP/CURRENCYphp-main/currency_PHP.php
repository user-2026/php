<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .converter {
            margin: 50px auto;
            max-width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="converter">
        <h2>Currency Converter</h2>
        <form action="" method="post">
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" placeholder="Enter amount" required>
            
            <label for="currency">Currency:</label>
            <select id="currency" name="currency" required>
                <option value="usd">USD</option>
                <option value="eur">EUR</option>
                <option value="gbp">GBP</option>
            </select>

            <button type="submit">Convert</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST["amount"];
            $currency = $_POST["currency"];
            
            // Assuming fixed exchange rates for simplicity
            $exchangeRates = [
                "usd" => 0.014,  // 1 INR = 0.014 USD
                "eur" => 0.012,  // 1 INR = 0.012 EUR
                "gbp" => 0.011,  // 1 INR = 0.011 GBP
            ];

            $convertedAmount = $amount * $exchangeRates[$currency];

            echo "<p>Converted amount: $convertedAmount $currency</p>";
        }
        ?>
    </div>

</body>
</html>
