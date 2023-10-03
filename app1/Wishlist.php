<?php
include 'connect.php';

session_start();
$id = $_SESSION['u']['ID'];

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Delete the item from the wishlist
    $deleteSql = "DELETE FROM wishlist WHERE id='$itemId' AND UserID='$id'";
    if ($connect->query($deleteSql) === TRUE) {
        header("Location: Wishlist.php");
        exit();
    } else {
        echo "Error deleting item: " . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>App Store Homepage</title>
    <style>
        .card-container {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: flex-start;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border: 0px;
            border-radius: 8px;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
            width: auto;
            height: auto;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: space-evenly;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(4, 4, 4, 0.2);
        }

        .card img {
            width: 112px;
            height: 112px;
        }

        .card a.delete-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #3d7793;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .card a.delete-button:hover {
            background-color: #d32f2f;
        }

        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="card-container">
            <?php
            $sql = "SELECT * FROM wishlist WHERE UserID='$id';";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $appID = $row['appID'];
                    $sql2 = "SELECT * FROM Apps WHERE ID='$appID';";
                    $result2 = $connect->query($sql2);

                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();

                        echo '<div class="card">';
                        echo '<a href="Appcontent.php?id=' . $row['appID'] . '">';
                        echo '<h3>' . $row2['Name'] . '</h3>';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row2['Logo']) . '">';
                        echo '<a href="?id=' . $row['id'] . '" class="delete-button">Delete</a>';
                        echo '</a>';
                        echo '</div>';
                    }
                }
            } else {
                echo 'No items found in the wishlist.';
            }

            $connect->close();
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html