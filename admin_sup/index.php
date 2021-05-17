<?php
session_start();
$adminid = $_SESSION['admin_id'];
?>
<?php

//security purposes
if(!isset($_SESSION['is_login']) || $_SESSION['is_login']!= true)
{
    header("location: login.php"); 
    //exit;
}

?>
<?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_header.php'); ?>

<div id="wrapper">

    <?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_navigation.php'); ?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <?php  


$name_query = mysqli_query($conn,"SELECT * FROM `admins` WHERE `ADMIN_ID` = '$adminid'");

while($row = mysqli_fetch_array($name_query)){

    $fname = $row['FIRST_NAME'];
}

?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome <?php  echo $fname;   ?>
                        <small>SIGNRECOG Analytics</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6" style="position:relative;left:12rem;">
                    <div class="panel panel-yellow">
                        <div class="panel-heading" style="background:blueviolet;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                   
                                   $query = "SELECT * FROM `users`";
                                   $select_all_users = mysqli_query($conn,$query);
                                   $user_counts = mysqli_num_rows($select_all_users);

                                ?>
                                    <div class='huge'><?php  echo $user_counts; ?></div>
                                    <div>SIGNRECOG Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php?source=view_all_users">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> <!-- col-lg-3 -->


                <div class="col-lg-3 col-md-6" style="position:relative;left:46rem;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                   
                                   $query = "SELECT * FROM `admins`";
                                   $select_all_admins = mysqli_query($conn,$query);
                                   $admins_counts = mysqli_num_rows($select_all_admins);

                                ?>
                                    <div class='huge'><?php echo $admins_counts; ?></div>
                                    <div>SIGNRECOG Admins</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php?source=view_all_admins">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> <!-- row -->

            <!-- CHARTS -->
            <!-- Add script tag in header section of admin -->

            <div class="row">
                <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],

                        <?php

                            $element_text = ['Total Users', 'Total Admins'];
                            $element_count = [$user_counts,$admins_counts];


                            for($i = 0; $i < 2; $i++){

                                echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";
                            }

                        ?>
                        //['Posts', 1000]
                    ]);

                    var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
                </script>
            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>  <!-- chart row -->




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php  include('C:/xampp/htdocs/sign_recognition/admin_sup/includes/admin_footer.php'); ?>