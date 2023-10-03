Copy code
<?php
include 'connect.php';
session_start();

// Move the inclusion of 'header.php' after the check for session start and before any output
include 'header.php';

$id = $_SESSION['u']['ID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the updated form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $DOB = $_POST['dob'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];

    // Update the user's profile in the database
    $sql = "UPDATE users SET FName = '$firstname', LName = '$lastname', Phonenumber = '$tel', Email = '$email', Password = '$password', Username = '$username', DOB = '$DOB' WHERE ID = '$id'";

    if (mysqli_query($connect, $sql)) {
        header("Location: userprofile.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

// Fetch the user's information from the database
$sql = "SELECT * FROM users WHERE ID = '$id'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();

$fname = $row["FName"];
$lname = $row["LName"];
$email = $row["Email"];
$username = $row["Username"];
$password = $row["Password"];
$dob = $row["DOB"];
$tel = $row["Phonenumber"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            box-sizing: border-box;

        }
        form{
            padding :10px;
        }

        .full-frame {
            display: flex;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: center;
            height: 546px;

        }

        /* Container div */
        .container {
            max-width: 514px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            border-radius: 8px 0px 0px 8px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2)

        }

        .container-left {
            padding: 10px;
            margin-right: 28px;
        }

        .container-right {
            padding: 10px;

        }


        /* Form styling */
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-array {

            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-content: stretch;
            align-items: center;
            padding: 10px;

        }

        /* Button styling */
        button {
            padding: 10px 20px;
            background-color: #08154c;
            color: #fff;
            border: none;
            border-radius: 26px;
            cursor: pointer;
        }

        button[type="reset"] {

            background-color: #b10303;
            margin: 5px;
        }
    </style>


<body>
    
<div class="full-frame">
            <div class="title-top">
                <h3>User Profile</h3>

            </div>
            <div class="container">

                <div class="container-left">
                    <form method="post" action="userprofile.php">
                        <label for="fname">First Name:</label>
                        <input type="text" name="firstname" id="fname" value="<?php echo $fname; ?>"><br><br>

                        <label for="lname">Last Name:</label>
                        <input type="text" name="lastname" id="lname" value="<?php echo $lname; ?>"><br><br>

                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>"><br><br>

                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" value="<?php echo $username; ?>"><br><br>
                </div>
                <div class="container-right">
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" value="<?php echo $password; ?>" ><br><br>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>"><br><br>

                    <label for="tel">Phone Number:</label>
                    <input type="tel" name="tel" id="tel" value="<?php echo $tel; ?>"><br><br>

                    <div class="btn-array">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <button type="reset">Cancel</button>
                    </div>
                    </form>
                </div>



            </div>
        </div>
</body>

</html>
