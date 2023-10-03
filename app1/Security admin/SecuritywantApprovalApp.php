<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Want Security Admin Approval App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "adminheader.php"; ?>
    <div class="main-content">

       
        <div class="nav">
            <div class="navbar-item">
                <h1>Want Security Admin Approval App</h1>
            </div>
                    
        </div>
       

        <div class="container">

            <?php
            include 'connect.php';

            

                $query = "SELECT * FROM apps ";
                $rs = mysqli_query($connect, $query);

                
        
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
                        $query1 = "SELECT * FROM appstatus WHERE Security = 'NO';";
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
                                    <td>
                                        <div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='approval.php?id={$row1['appID']}'\">Approve</button>
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