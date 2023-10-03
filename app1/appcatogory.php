<?php
include 'connect.php';

session_start();
$id = $_SESSION['u']['ID'];

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
      align-content: flex-end;
    }


    .card-container {
      display: flex;
      flex-direction: row;
      flex-wrap: nowrap;
      align-content: flex-end;
      justify-content: space-around;
      align-items: flex-start;
    }

    .logo img {
      width: 32px;
      height: 32px;
    }

    .card {

      border: 1px solid #ccc;
      background-color: #ededed;
      padding: 10px;
      margin-bottom: 10px;
      border: 0px;
      border-radius: 8px;
      box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2)
    }


    .card img {
      width: 122px;
      height: 122px;

    }

    .card img :hover {

      width: 122px;
      height: 122px;
    }

    a {
      text-decoration: none;
      color: #333;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(4, 4, 4, 0.2);
    }

    h1 {
      color: #070f34;
      font-family: monospace;
      font-size: 25px;
    }

    img {
      width: 122px;
      height: 122px;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <h2>dulinahejitha</h2>
    <h1>Apps</h1>
    <div class="card-container">
      <?php
      $paymenttype1 = 'free';
      $paymenttype2 = 'Premium';
      $sql1 = "SELECT * FROM appstatus WHERE Security ='OK' AND Payment ='OK' AND headadmin ='OK';";
      ;
      $result1 = $connect->query($sql1);
      while ($data = $result1->fetch_assoc()) {
        // get approval app ID
        $appid = $data['appID'];

        $sql1 = "SELECT ID, Name, Price, Logo FROM apps WHERE Category ='App' AND ID='$appid'";
        $result1 = $connect->query($sql1);

        if ($result1->num_rows > 0) {
          while ($row1 = $result1->fetch_assoc()) {
            $appId = $row1["ID"];
            $appName = $row1["Name"];

            $appPrice = $row1["Price"] > 0 ? $paymenttype2 : $paymenttype1;
            $appLogo = base64_encode($row1["Logo"]);


            echo '<div class="card">';
            echo '<a href="Appcontent.php?id=' . $appId . '">';
            echo '<img src="data:image/jpeg;base64,' . $appLogo . '">';
            echo '<h3>' . $appName . '</h3>';

            echo '<p>$' . $appPrice . '</p>';
            echo '</a>';
            echo '</div>';

          }
        } else {
          echo "No apps found.";
        }
      }


      ?>
    </div>
  </div>
  <div class="container">
    <h1>Games</h1>
    <div class="card-container">
      <?php
      $paymenttype1 = 'free';
      $paymenttype2 = 'Premium';
      $sql3 = "SELECT * FROM appstatus WHERE Security ='OK' AND Payment ='OK' AND headadmin ='OK';";
      ;
      $result3 = $connect->query($sql3);
      while ($data = $result3->fetch_assoc()) {
        // get approval app ID
        $appid = $data['appID'];
        $sql2 = "SELECT ID, Name, Price, Logo FROM apps WHERE Category ='Game' AND ID='$appid'";

        $result2 = $connect->query($sql2);
        if ($result2->num_rows > 0) {
          while ($row2 = $result2->fetch_assoc()) {
            $appId = $row2["ID"];
            $appName = $row2["Name"];
            $appPrice = $row2["Price"] > 0 ? $paymenttype2 : $paymenttype1;
            $appLogo = base64_encode($row2["Logo"]);
            echo '<div class="card">';
            echo '<a href="Appcontent.php?id=' . $appId . '">';
            echo '<img src="data:image/jpeg;base64,' . $appLogo . '">';
            echo '<h3>' . $appName . '</h3>';

            echo '<p>$' . $appPrice . '</p>';
            echo '</a>';
            echo '</div>';

          }
        } else {
        
        }
      }
      



      ?>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>