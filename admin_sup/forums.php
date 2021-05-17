<!-- logic from comments.php and posts.php -->

<?php  include('C:/xampp/htdocs/col_social_network/admin_sup/includes/admin_header.php'); ?>
<!-- Copy Paste from admin -->
<div id="wrapper">

    <!-- Navigation -->
    <?php  include('C:/xampp/htdocs/col_social_network/admin_sup/includes/admin_navigation.php'); ?>


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
                            case 'add_categories':
                                include 'includes/add_categories.php'; 
                                break;
                            
                            case 'edit_categories':
                                 include 'includes/edit_categories.php';
                                 break;
                            
                            default:
                                include "includes/view_all_categories.php";
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
