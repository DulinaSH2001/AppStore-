<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $DOB = $_POST['DOB'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $C_password = $_POST['cpassword'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];
    $type = $_POST['usertype'];

    if ($type == 'User') {
        $userID = uniqid('user');
    } else {
        $userID = uniqid('dev');
    }

    $sql1 = "SELECT * FROM users WHERE Email = '$email' OR Username = '$username'";
    $result = mysqli_query($connect, $sql1);

    if (mysqli_num_rows($result) > 0) {
        echo "User email or username already exists";
    } else {
        if ($C_password === $password) {
            $sql = "INSERT INTO users (ID, FName, LName, Address, DOB, Age, Phonenumber, Username, Email, Password, usertype)
                    VALUES ('$userID', '$firstname', '$lastname', '$address', '$DOB', '$age', '$tel', '$username', '$email', '$password', '$type')";

            if (mysqli_query($connect, $sql)) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($connect);
            }
        } else {
            echo "Passwords do not match";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h3 {
            color: #0a0b47;
            text-align: center;
            font-size: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="reset"],
        .form-group button[type="submit"] {
            display: inline-block;
            padding: 10px 171px;
            border: none;
            border-radius: 26px;
            background-color: #08154c;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 4px;
        }

        .form-group input[type="reset"]:hover,
        .form-group button[type="submit"]:hover {
            background-color: #08374c;
        }
    </style>
</head>

<body>
    <h3>Registration Form</h3>
    <form method="POST" action="Registation.php">
        <div class="form-group">
            <label for="fname">First name:</label>
            <input type="text" name="firstname" id="fname" placeholder="First name" required>
        </div>

        <div class="form-group">
            <label for="lname">Last name:</label>
            <input type="text" name="lastname" id="lname" placeholder="Last name" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" placeholder="Address" required>
        </div>

        <div class="form-group">
            <label for="DOB">Date of birth:</label>
            <input type="date" name="DOB" id="DOB" required>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" placeholder="Age" required>
        </div>

        <div class="form-group">
            <label for="tel">Mobile number:</label>
            <input type="tel" name="tel" id="tel" placeholder="Mobile number" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select name="usertype" id="type" required>
                <option value="User">User</option>
                <option value="Developer">Developer</option>
            </select>
        </div>

        <div class="form-group">
            <input type="reset" value="Reset">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</body>

</html>
