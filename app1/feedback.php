
<?php
// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate form data (you can add more validation if needed)
if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all the required fields.";
    exit;
}
 include 'connect.php';

$sql = "INSERT INTO feedback (name, email, messege) VALUES ('$name', '$email', '$message')";

if ($connect->query($sql) === TRUE) {
    echo "Thank you for your feedback!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

// Close the database connection
$connect->close();
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Feedback Page</title>
    <style>
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 42px;
            border-radius: 8px 0px 0px 8px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2)
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            margin-top: 21px;
            padding: 9px 33px;
            background-color: #08154c;
            color: #fff;
            border: none;
            border-radius: 26px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #08374c;
        }
        .message {
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback Page</h1>
        <form action="process.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="message">Message:</label>
            <textarea name="message" required></textarea>

            <input type="submit" value="Submit">
        </form>
        <div class="message">
            <!-- Display the feedback confirmation message from PHP here -->
            <?php
                if(isset($_PODT['message'])){
                    echo $_POST['message'];
                }
            ?>
        </div>
    </div>
</body>
</html>
