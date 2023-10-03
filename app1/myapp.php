<?php
include 'connect.php';

session_start();
$id = $_SESSION['u']['ID'];

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];
    
    // Delete the item from the wishlist
   
    $deleteSql = "DELETE FROM apps WHERE ID='$itemId' AND devID='$id';";
    if ($connect->query($deleteSql) === TRUE) {

        $deleteSql1 = "DELETE FROM appstatus WHERE appID='$itemId' AND devID='$id';";
        mysqli_query($connect, $deleteSql1);

        header("Location: myapp.php");
        exit();
    } else {
        echo "Error deleting item: " .mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>MY Apps</title>
    <style>
        .card-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
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
            background-color: #f44336;
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
            $sql = "SELECT * FROM apps WHERE devID='$id';";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    echo '<div class="card">';
                    echo '<a href="Appcontent.php?id='.$row['ID'].'">';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Logo']) . '">';
                    echo '<a href="?id=' . $row['ID'] . '" class="delete-button">Delete</a>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo 'No items found in the myapps.';
            }

            $connect->close();
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
