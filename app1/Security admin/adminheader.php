<style>
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 4px;
        background-color: #070f34;
        text-align: right;
        color:white
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
        font-family: sans-serif;
        font-size: 15px;
        color: white;
    }

    .dropdown {
        position: relative;
        float: right;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #070f34;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
        text-align: left;
    }

    .dropdown-content a {
        color: white;
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
        color: #f1f1f1;
    }
    h5{
        font-size: 15px;
        
    }
</style>



<nav>
    <ul>
        <div class="logo">
            <img width="32" height="32" src="../images/icons8-accusoft-32.png" />
            <h5>App Pulse</h5>
        </div>
        <li><a href="../Security admin/securityadminDashboard.php"> Dashboard</a></li>
        <li><a href="../Security admin/SecuritywantApprovalApp.php">wantApproval apps </a></li>
        <li><a href="../Security admin/pendingapproval.php">Pending apps</a></li>

        <li class="dropdown">
            <a href="#" class="dropbtn">
                Security Admin
            </a>
            <div class="dropdown-content">
                <a href="../Security admin/SecurityadminProfile.php">Profile</a>
                <a href="../logout.php">Logout</a>

            </div>
        </li>
        <li><a href="../Security admin/ManageComplain.php">Manage Complain</a></li>
    </ul>
</nav>