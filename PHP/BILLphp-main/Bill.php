<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Electricity Bill Calculator</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    body {
      background-color: #f5f5f5;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #007bff;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <h2 class="text-center">Electricity Bill Calculator</h2>
    <form id="billForm">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label for="billNo">Bill Number</label>
        <input type="text" class="form-control" id="billNo" placeholder="Enter bill number" required>
      </div>

      <div class="form-group">
        <label for="units">Units Consumed</label>
        <input type="number" class="form-control" id="units" placeholder="Enter units" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Calculate Bill</button>
    </form>

    <div id="result" class="mt-3"></div>

  </div>

  <script>
    $("#billForm").submit(function (e) {
      e.preventDefault();

      var name = $("#name").val();
      var billNo = $("#billNo").val();
      var units = $("#units").val();

      var totalBill = 0;

      if (units <= 50) {
        totalBill = units * 3.5;
      } else if (units <= 150) {
        totalBill = 50 * 3.5;
        totalBill += (units - 50) * 4;
      } else if (units <= 250) {
        totalBill = 50 * 3.5;
        totalBill += 100 * 4;
        totalBill += (units - 150) * 5.2;
      } else {
        totalBill = 50 * 3.5;
        totalBill += 100 * 4;
        totalBill += 100 * 5.2;
        totalBill += (units - 250) * 6.5;
      }

      var resultText = `<p><strong>Name:</strong> ${name}</p><p><strong>Bill Number:</strong> ${billNo}</p><p><strong>Total Bill Amount:</strong> Rs. ${totalBill.toFixed(2)}</p>`;
      $("#result").html(resultText);
    });
  </script>

</body>

</html>