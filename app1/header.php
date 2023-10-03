<?php
$fname = $_SESSION['u']['FName'];
?>
<style>
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        background-color: #070f34;
        text-align: right;
    }

    .logo {
        float: left;
        float: left;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    nav li {
        display: inline-block;
    }

    nav li a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: white;
    }

    .dropdown {
        position: relative;
        float: right;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
        text-align: left;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Hover Effect */
    nav li a:hover {
        background-color: #08374c;
        color: white;
    }
</style>


<?php

if ($_SESSION['u']['usertype'] === 'User') {
    echo '<nav>
<ul>
    <div class="logo">
        <img width="32" height="32" src="../app/images/icons8-accusoft-32.png" />
        <h5>App Pulse</h5>
    </div>
    <li><a href="../app/homepage.php">Home</a></li>
    <li><a href="../app/appcatogory.php">Category</a></li>
   
    
    <li class="dropdown">
        <a href="#" class="dropbtn">
            ' . $fname . '
        </a>
        <div class="dropdown-content">
            <a href="../app/userprofile.php">Profile</a>
            <a href="../app/Wishlist.php">Wishlist</a>
            <a href="../app/logout.php">Logout</a>
        </div>
    </li>
    <li><a href="../app/Complaint.php">Contact</a></li>
</ul>
</nav>';

} else {
    echo '<nav>
<ul>
    <div class="logo">
        <img width="32" height="32" src="../app/images/icons8-accusoft-32.png" />
        <h5>App Pulse</h5>
    </div>
    <li><a href="../app/homepage.php">Home</a></li>
    <li><a href="../app/appcatogory.php">Category</a></li>
  
    
    <li class="dropdown">
        <a href="#" class="dropbtn">
            ' . $fname . '
        </a>
        <div class="dropdown-content">
            <a href="../app/devprofile.php">Profile</a>
            <a href="Add_apps.php">Add Apps</a>
            <a href="../app/myapp.php">My Apps</a>
            <a href="../app/Wishlist.php">Wishlist</a>

            <a href="../app/logout.php">Logout</a>
        </div>
    </li>
    <li><a href="../app/Complaint.php">Contact</a></li>
</ul>
</nav>';


}


?>