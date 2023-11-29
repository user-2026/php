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
            <label for="amount">Amount in Dollar:</label>
            <input type="text" id="amount" name="amount" placeholder="Enter amount" required>
            
            <?php
            // Define exchange rates as constants
            define("INR_EXCHANGE_RATE", 83.34);
            define("EUR_EXCHANGE_RATE", 0.91);
            ?>

            <button type="submit">Convert</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST["amount"];

            // Perform the conversions using constants
            $convertedAmountINR = $amount * INR_EXCHANGE_RATE;
            $convertedAmountEUR = $amount * EUR_EXCHANGE_RATE;

            echo "<p>Converted amount to INR: $convertedAmountINR Rupees</p>";
            echo "<p>Converted amount to EUR: $convertedAmountEUR Euros</p>";
        }
        ?>
    </div>

</body>
</html>
