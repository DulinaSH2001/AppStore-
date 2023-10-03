<?php 

    include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="style.css">
    <style>
        .count-card {
    border: 1px solid #ffffff;
    padding: 10px;
    text-align: center;
    background-color: #ffffff;
    height: 100px;
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
}
    </style>
</head>
<body>
	<?php include "adminheader.php"; ?>
	<div class="main-content">
		
		<div class="nav">
			<div class="navbar-item">
				<h1>Dashboard</h1>
			</div>
						
		</div>
		
		<div class="">
            <div class="container margintop50">
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM apps";
                            $rs = mysqli_query($connect,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Apps</span>
                </div>
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM users WHERE usertype = 'User'";
                            $rs = mysqli_query($connect,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Users</span>
                </div>
                <div class="count-card col2">
                    <div class="count-part">
                        <?php

                            $query = "SELECT * FROM `users` WHERE usertype = 'Developer'";
                            $rs = mysqli_query($connect,$query);

                            $data = $rs->num_rows;

                        ?>
                        <h1><?php echo "$data";?></h1>
                    </div>
                    <span>Developer</span>
                </div>
            </div>
           
        </div>

	</div>
	

</body>
</html>