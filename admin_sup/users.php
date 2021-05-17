<!-- logic from comments.php and posts.php -->

<?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_header.php'); ?>
<!-- Copy Paste from admin -->
<div id="wrapper">

    <!-- Navigation -->
    <?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_navigation.php'); ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                        Welcome to Admin Panel
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
                            case 'add_admin':
                                include 'includes/add_admin.php'; 
                                break;
                            
                            case 'edit_admin':
                                 include 'C:/xampp/htdocs/cms/admin/edit_admin.php';
                                 break;
                            
                            case 'view_all_admins':
                                 include 'includes/view_all_admins.php';
                                 break;
                            
                            default:
                                include "includes/view_all_users.php";
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

    <?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_footer.php'); ?>
