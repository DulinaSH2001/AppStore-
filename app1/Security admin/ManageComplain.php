<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Published Apps</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "adminheader.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Manage Complain</h1>
            </div>

        </div>
        <!-- Header -->

        <div class="container">

            <?php
            include 'connect.php';



            $query = "SELECT * FROM complain";
            $rs = mysqli_query($connect, $query);



            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Compain ID</th>
                            <th>User ID</th>
                            <th>E-mail</th>
                            <th>Complain</th>
                            <th>Optimize</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       while ($row = mysqli_fetch_assoc($rs)) {
                            if ($rs->num_rows > 0) {
                                echo "
                                <tr>
                                    <td>{$row['ID']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['messege']}</td>
                                    <td><div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='complaindelete.php?id={$row['ID']}'\">Delete complain </button>
                                        </div>
                                    </td>
                                    
                                </tr>
                                ";

                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</body>

</html>