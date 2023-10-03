<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "adminheader.php"; ?>
	<div class="main-content">
		<!-- Header -->
		<div class="nav">
			<div class="navbar-item">
				<h1>Profile</h1>
			</div>
			<div class="navbar-item">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>            
                </a>
            </div>			
		</div>
		<!-- Header -->

		<!-- content -->
		<div class="container margintop25">

			<?php
            include 'connect.php';

            // if (isset($_SESSION['u'])) {
            //     $email = $_SESSION['u']['email'];
            // }

            $query = "SELECT * FROM `app_store_admin` WHERE a_email = 'appplusepayment665@gmail.com'";
            $rs = mysqli_query($connect, $query);

            $data = $rs->fetch_assoc();
            


                if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];

                $message = array();

                if (empty($fname) || empty($lname) || empty($mobile)) {
                    $message[] = 'All fields are required';
                } else {
                  

                    $query = "UPDATE `app_store_admin` SET a_fname = '$fname', a_lname = '$lname', a_phone_number = '$mobile' WHERE a_email = 'appplusepayment665@gmail.com'";
                    $rs = mysqli_query($connect, $query);

                    if ($rs) {
                        $message[] = 'Data updated correctly';
                        header('location: PaymentadminProfile.php');
                        exit;
                    } else {
                        $message[] = 'Error updating data: ' . mysqli_error($conn);
                    }
                }
            }
            ?>

            <div class="col6">
                <div class="">

                    <div class="fheading">
                        <h4 class="fh2">Profile Settings</h4>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="container margintop25">
                                <div class="col3">
                                    <label class="flable">First Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["a_fname"]); ?>" name="fname"/>
                                </div>

                                <div class="col3">
                                    <label class="flable">Last Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["a_lname"]); ?>" name="lname"/>
                                </div>  
                            </div>

                            <div class="container margintop25">
                                <div class="col3">
                                    <label class="flable">User Name</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["a_username"]); ?>" name="username"/>
                                </div>

                                <div class="col3">
                                    <label class="flable">Password</label>
                                    <input type="text" class="fcontrol" value="<?php echo ($data["a_password"]); ?>" readonly name="password"/>
                                </div>  
                            </div>

                            <div class="col8 margintop25">
                                <label class="flable">Mobile</label>
                                <input type="mobile" class="fcontrol" value="<?php echo ($data["a_phone_number"]); ?>" name="mobile"/>
                            </div>
                            <div class="col8 margintop25">
                                <label class="flable">Email</label>
                                <input type="email" class="fcontrol" value="<?php echo ($data["a_email"]); ?>" readonly />
                            </div>
                                                
                            <div class="col3 margintop25">
                                <button class="fbtn" type="submit" name="submit">Update My Profile</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
		<!-- content -->

		
	</div>
	

</body>
</html>