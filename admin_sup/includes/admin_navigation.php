
<?php  
ob_start();
if(!isset($_SESSION)){
    session_start(); 
}

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SIGNRECOG ADMIN PANEL</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li> <a href="">Users Online: <span class="usersonline"></span></a></li>
        <!-- <li> <a href="../index.php">HOME</a></li> -->

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php if (isset($_SESSION['username'])){echo $_SESSION['username'];}  ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li class="divider"></li>
                <li>
                    <a href="./logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <?php

?>

<?php

include 'C:/xampp/htdocs/sign_recognition/db.php'; 
$email = $_SESSION['email'];
$sql = "SELECT * FROM `users` WHERE `EMAIL` = '$email'";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
    $userid = $row['USER_ID'];   
}

?>

<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <!-- <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                        class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a> -->
                <ul id="" class="">
                <!-- <ul id="posts_dropdown" class="collapse"> -->
                </ul>
            </li>
            <li>
                <!-- <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
                    Users <i class="fa fa-fw fa-caret-down"></i></a> -->
                <ul id="" class="">
                <!-- <ul id="demo" class="collapse"> -->
                    <li>
                        <a href="users.php">View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=view_all_admins">View All Admins</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_admin">Admin Registration</a>
                    </li>
                </ul>
            </li>   
        </ul>
    </div>
<!-- /.navbar-collapse -->
</nav>