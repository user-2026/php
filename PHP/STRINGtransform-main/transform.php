<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
    <style>
        /* Your existing styles remain unchanged */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        button:nth-child(3) {
            background-color: #2196F3;
        }

        button:nth-child(3):hover {
            background-color: #0b7dda;
        }
    </style>
</head>
<body>

<?php
// Initialize the variable to store the transformed string
$transformedText = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input text from the form
    $inputText = $_POST["inputText"];

    // Check which button is clicked and transform the text accordingly
    if (isset($_POST["toUppercase"])) {
        $transformedText = strtoupper($inputText);
    } elseif (isset($_POST["toLowercase"])) {
        $transformedText = strtolower($inputText);
    } elseif (isset($_POST["firstLetterCap"])) {
        $transformedText = ucwords($inputText);
    }
}
?>

<!-- HTML form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="inputText">Enter Text:</label>
    <input type="text" id="inputText" name="inputText" value="<?php echo $transformedText; ?>" required>
    <br>
    <button type="submit" name="toUppercase">Transform to Uppercase</button>
    <button type="submit" name="toLowercase">Transform to Lowercase</button>
    <button type="submit" name="firstLetterCap">Capitalize First Letter</button>
</form>

</body>
</html>
