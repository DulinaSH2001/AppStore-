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
                <h1>Published Apps</h1>
            </div>

        </div>
        <!-- Header -->

        <div class="container">

            <?php
            include 'connect.php';



            



            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>App ID</th>
                            <th>Developer ID</th>
                            <th>App Name</th>
                            <th>Price</th>
                            <th>Optimize</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                            $query1 = "SELECT * FROM `appstatus` WHERE headadmin = 'OK' AND( (Payment='No' OR Security='OK') OR (Payment='OK' OR Security='ON') OR (Payment='No' OR Security='NO') )";
                            $rs1 = mysqli_query($connect,$query1);
                            while ($row1 = $rs1->fetch_assoc()) {
                                $id =$row1['appID'];
    
                                $query = "SELECT * FROM `apps` Where ID ='$id' ";
                                $rs = mysqli_query($connect, $query);
                                $row = $rs->fetch_assoc();
                                
                                if($rs1->num_rows > 0) {
                                echo "
                                <tr>
                                <td>{$row1['appID']}</td>
                                <td>{$row1['devID']}</td>
                                <td>{$row['Name']}</td>
                                <td>{$row['Price']}</td>
                                <td><div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='adminappdelete.php?id={$row1['appID']}'\">Delete</button>
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