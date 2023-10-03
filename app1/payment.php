<?php
include 'connect.php';

session_start();
$userId = $_SESSION['u']['ID'];
$appId = $_GET['id'];



$sql1 = "SELECT * FROM apps WHERE ID = '$appId'";
$result1 = $connect->query($sql1);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();

    $appPrice = $row1["Price"];



}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $userId = $_POST['userId'];
    $appId = $_POST['appId'];
    $amount = $_POST['amount'];
    $cardNumber = $_POST['cardNumber'];
    $cvv = $_POST['cvv'];
    $expirationDate = $_POST['expirationDate'];

    // Insert payment details into the database
    $sql = "INSERT INTO payments (AppID, UserID, Amount, CardNumber, CVV, ExpDate)
            VALUES ('$appId', '$userId', ' $amount', '$cardNumber', '$cvv', '$expirationDate')";
    if ($connect->query($sql) === true) {
        echo "Payment successful!";
        header("Location: download.php?id=$appId");
    } else {
        echo "Payment failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #e2e5f0;
            border-radius: 8px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
        }

        .container h1 {
            text-align: center;
            font-family: serif;
            margin-bottom: 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container label {
            margin-bottom: 10px;
            font-family: ui-monospace;
        }

        .container input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .container input[type="submit"] {
            padding: 10px 20px;
            background-color: #08154c;
            color: #fff;
            border: none;
            border-radius: 26px;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #08374c;
        }

        .message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Page</h1>

        <form method="post" action="payment.php">
        <input type="hidden" name="appId" value="<?php echo $appId; ?>">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">

            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="<?php echo $appPrice; ?> " id="amount">

            <label for="cardNumber">Card Number:</label>
            <input type="text" name="cardNumber" id="cardNumber">

            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" id="cvv">

            <label for="expirationDate">Expiration Date:</label>
            <input type="text" name="expirationDate" id="expirationDate">

            <input type="submit" value="Submit Payment">
        </form>

        
    </div>
</body>

</html>