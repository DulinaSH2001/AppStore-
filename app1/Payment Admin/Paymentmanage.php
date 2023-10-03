<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Manage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "adminheader.php"; ?>
    <div class="main-content">

        <!-- Header -->
        <div class="nav">
            <div class="navbar-item">
                <h1>Manege Payment</h1>
            </div>

        </div>
        <!-- Header -->

        <div class="container">

            <?php
            include 'connect.php';



            $query = "SELECT * FROM payments";
            $rs = mysqli_query($connect, $query);



            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>App ID</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                            <th>Optimize</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       while ($row = mysqli_fetch_assoc($rs)) {
                            if ($rs->num_rows > 0) {
                                echo "
                                <tr>
                                    <td>{$row['AppID']}</td>
                                    <td>{$row['UserID']}</td>
                                    <td>{$row['Amount']}</td>
                                    <td>{$row['PaymentDate']}</td>
                                    <td><div class='col6'>
                                            <button class='btn4' onclick=\"window.location.href='paymentdelete.php?id={$row['ID']}'\">Delete payment </button>
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