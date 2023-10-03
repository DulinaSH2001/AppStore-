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
      padding: 10px;
      margin-bottom: 10px;
      border: 0px;
      border-radius: 8px;
      box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
      s
    }

    .card :hover {}

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

    img {
      width: 122px;
      height: 122px;
    }

    h1 {
      font-family: sans-serif;
      color: #091d70;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <h1>Welcome to the App Store!</h1>
    <div class="card-container">
      <?php
      $paymenttype1 = 'free';
      $paymenttype2 = 'Premium';

//select approval apps
      $sql1 = "SELECT * FROM appstatus WHERE Security ='OK' AND Payment ='OK' AND headadmin ='OK';";
      ;
      $result1 = $connect->query($sql1);
     

      while ($data = $result1->fetch_assoc()) {
// get approval app ID
        $appid = $data['appID'];
        // get app details 
        $sql = "SELECT ID, Name, Price, Logo FROM apps Where ID ='$appid'";
        $result = $connect->query($sql);


        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $appId = $row["ID"];
            $appName = $row["Name"];
            $appPrice = $row["Price"] > 0 ? $paymenttype2 : $paymenttype1;
            $appLogo = base64_encode($row["Logo"]);


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

      $connect->close();
      ?>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>