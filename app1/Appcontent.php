<!DOCTYPE html>
<html>

<head>
    <title>App Content Page</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .app-details {
            text-align: center;
        }

        .app-details img {
            width: 200px;
            height: 200px;
            margin-bottom: 10px;
        }

        .app-details h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .app-details .download-button,
        .app-details .wishlist-button {
            display: inline-block;
            padding: 10px 55px;
            border-radius: 26px;
            background-color: #08154c;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }

        .app-details .download-button:hover,
        .app-details .wishlist-button:hover {
            background-color: #08374c;
        }

        .app-description {
            margin-top: 30px;
        }

        .app-description h2 {
            font-size: 20px;
            font-family: sans-serif;
            margin-bottom: 10px;
        }

        .comments {
            margin-top: 30px;
            padding: 10px;
            border-radius: 8px 0px 0px 8px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2)
        }

        .comments h2 {
            font-size: 20px;
            font-family: sans-serif;
            margin-bottom: 10px;
        }

        .comment-box {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment {
            margin-bottom: 5px;
        }

        .comments h3 {
            font-size: 18px;
            font-family: sans-serif;
            margin-bottom: 10px;
        }

        .comments textarea {
            width: 90%;
            padding: 39px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comments input[type="submit"] {
            padding: 10px 27px;
            border-radius: 26px;
            background-color: #08154c;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .comments input[type="submit"]:hover {
            background-color: #08374c;
        }
    </style>
</head>

<body>
<?php
    include 'connect.php';
    
    session_start();
    $id = $_SESSION['u']['ID'];

    if (isset($_GET['id'])) {
        $appId = $_GET['id'];
        $sql = "SELECT * FROM apps WHERE ID = '$appId'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $appName = $row["Name"];
            $appLogo = $row["Logo"];
            $appPrice = $row["Price"];
            $appDescription = $row["Description"];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comment = $_POST['comment'];
        $appId = $_POST['appId'];

        $sql = "INSERT INTO comments (AppID, Comment) VALUES ('$appId','$comment')";
        if (mysqli_query($connect, $sql)) {
            // Redirect to the same page after adding the comment
            header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $appId);
            exit();
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
    ?>



<div class="container">
        <div class="app-details">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($appLogo) . '">'; ?>
            <h1><?php echo $appName; ?></h1>
            <?php
            if ($appPrice == 0) {
                echo '<a href="download.php?id=' . $appId . '" class="download-button">Download</a>';
            } else {
                echo '<a href="payment.php?id=' . $appId . '" class="download-button">Buy Now</a>';
            }
            echo '<a href="../app/addwishlist.php?id=' . $appId . '" class="wishlist-button">Add to Wishlist</a>';
            ?>
            <p><?php echo $appPrice; ?></p>
        </div>

        <div class="app-description">
            <h2>Description</h2>
            <p><?php echo $appDescription; ?></p>
        </div>
        <div class="comments">
            <h2>Comments</h2>
            <div class="comment-box">

            <?php
                $sql = "SELECT * FROM comments WHERE AppID = '$appId'";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="comment">' . $row["Comment"] . '</div>';
                    }
                } else {
                    echo "No comments yet.";
                }
                ?>
            </div>

            <h3>Write a Comment</h3>
            <?php


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $comment = $_POST['comment'];
                $appId = $_POST['appId'];



                $sql = "INSERT INTO comments (AppID, Comment) VALUES ('$appId','$comment')";
                if (mysqli_query($connect, $sql)) {
                    header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $appId);
                    exit();



                } else {
                    echo "Error: " . mysqli_error($connect);
                }

            }
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $appId; ?>">
                <textarea name="comment" rows="4" cols="50"></textarea><br>
                <input type="hidden" name="appId" value="<?php echo $appId; ?>">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>




</html>