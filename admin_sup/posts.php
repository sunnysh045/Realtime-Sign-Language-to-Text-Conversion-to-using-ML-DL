<?php  include('C:/xampp/htdocs/col_social_network/admin_sup/includes/admin_header.php'); ?>
<?php  include 'C:/xampp/htdocs/col_social_network/includes/db.php'; ?>

<?php  session_start();  ?>


<!-- Copy Paste from admin -->
<div id="wrapper">

    <!-- Navigation -->
    <?php  include('C:/xampp/htdocs/col_social_network/admin_sup/includes/admin_navigation.php'); ?>

    <?php  //include('C:/xampp/htdocs/col_social_network/admin/functions.php'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                        Welcome <?php echo $_SESSION['name'];  ?>
                        <!-- <small>Author</small> -->
                    </h1>
                    <?php
                        //Adding pages based on Conditions
                        if(isset($_GET['source'])){ //Sent from admin_navigation.php

                            $source = $_GET['source'];
                        }
                        else{

                            $source = '';
                        }

                        switch ($source) {
                            case 'add_post':
                                include 'includes/add_post.php'; 
                                break;
                            
                            case 'edit_post':
                                 include 'C:/xampp/htdocs/col_social_network/admin/edit_post.php';
                                 break;
                            
                            case 'view_all_posts':
                                 include "includes/view_all_posts.php";
                                 break;
                            
                            default:
                                include 'includes/view_all_users_posts.php';
                                break;
                        }

                    ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php  include('C:/xampp/htdocs/col_social_network/admin_sup/includes/admin_footer.php'); ?>
