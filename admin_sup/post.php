<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>

<?php include 'C:/xampp/htdocs/col_social_network/includes/db.php';  ?>

<?php  include 'C:/xampp/htdocs/col_social_network/includes/left_nav.php'  ?>

<?php  include 'C:/xampp/htdocs/col_social_network/includes/header.php'  ?>


<?php  

if(isset($_POST['liked'])){
   
    $post_id = $_POST['post_id'];


    // Select Post
    // Update Post with likes
    // insert likes

    $searchPost = "SELECT * FROM `posts` WHERE `post_id` = '$post_id'";
    $searchPostQuery =  mysqli_query($conn,$searchPost);

    $post = mysqli_fetch_array($searchPostQuery);
    $likes = $post['likes'];  

    if(mysqli_num_rows($searchPostQuery) >= 1){

        echo $post['POST_ID'];
    }

    mysqli_query($conn,"UPDATE `posts` SET `likes` = '$likes' + 1 WHERE `post_id` = '$post_id'");

    mysqli_query($conn,"INSERT INTO `likes`(`user_id`,`post_id`) VALUES ('$user_id','$post_id')");

}

//Unlike
if(isset($_POST['unliked'])){

   
    $post_id = $_POST['post_id'];

    $searchPost = "SELECT * FROM `posts` WHERE `post_id` = '$post_id'";
    $searchPostQuery =  mysqli_query($conn,$searchPost);

    $post = mysqli_fetch_array($searchPostQuery);
    $likes = $post['likes'];  

//Delete likes everytime we unlike posts. 
    mysqli_query($conn,"DELETE FROM `likes` WHERE `post_id` = '$post_id' and `user_id`='$user_id'");
//decrement likes
    mysqli_query($conn,"UPDATE `posts` SET `likes` = '$likes' - 1 WHERE `post_id` = '$post_id'");

  

}


?>


<?php

function userLikedThisPost($post_id = ''){
    include 'C:/xampp/htdocs/col_social_network/includes/db.php';
    global $user_id;
    $result = mysqli_query($conn,"SELECT * FROM `likes` WHERE `user_id` = '$user_id' AND `post_id` = '$post_id'");
    return mysqli_num_rows($result) >= 1 ? true: false;
}


?>



<div class="container outer-container">

    <div class="row post-row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 post-column">
            <?php

                     //Catching from index.php
                    if(isset($_GET['p_id'])){

                        $the_post_id = $_GET['p_id'];
                    

                        // $view_query = "UPDATE `posts` SET `post_views_count` = post_views_count + 1 WHERE `post_id`= '$the_post_id'";
                        // $send_query = mysqli_query($conn,$view_query);

                        // if(!$send_query){
                        //     die("Error");
                        // }


                        $query1 = "SELECT * FROM `posts` WHERE `POST_ID` = '$the_post_id'";
                        $select_all_posts_query = mysqli_query($conn,$query1);


                        while($row = mysqli_fetch_array($select_all_posts_query)){

                            $post_id = $row['POST_ID'];
                            $post_title = $row['POST_TITLE'];
                            $post_status = $row['POST_STATUS'];
                            $post_image = $row['POST_IMAGE'];
                            $post_content = $row['POST_CONTENT'];
                            $post_tags = strip_tags($row['POST_TAGS']);
                            $post_comment_counts = $row['POST_COMMENT_COUNTS'];
                            $post_date = $row['POST_DATE'];
                            $total_likes = $row['likes'];
                            $post_user_id = $row['USER_ID'];
                ?>



            <!-- First Blog Post -->
            <h2>
                <a href="#" id="title"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                <?php 

                    $user_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `user_id` = '$post_user_id'");
                    while($row = mysqli_fetch_assoc($user_query)){
                            
                        $fname = $row['FIRST_NAME'];
                        $lname = $row['LAST_NAME'];

                    }

                   
                ?>
                by <a href="#"><?php  echo $fname . ' '. $lname;   ?></a>&nbsp;<button
                    class="btn btn-primary follow-btn1">Follow</button>
            </p>
            <p class="time"><i class="far fa-clock"></i>&nbsp; Posted on <?php echo $post_date; ?></p>
            <svg width="29" height="29" class="hf">
                <path
                    d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z">
                </path>
            </svg>
            <svg width="29" height="29" class="hf">
                <path
                    d="M5 6.36C5 5.61 5.63 5 6.4 5h16.2c.77 0 1.4.61 1.4 1.36v16.28c0 .75-.63 1.36-1.4 1.36H6.4c-.77 0-1.4-.6-1.4-1.36V6.36z">
                </path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.76 20.9v-8.57H7.89v8.58h2.87zm-1.44-9.75c1 0 1.63-.65 1.63-1.48-.02-.84-.62-1.48-1.6-1.48-.99 0-1.63.64-1.63 1.48 0 .83.62 1.48 1.59 1.48h.01zM12.35 20.9h2.87v-4.79c0-.25.02-.5.1-.7.2-.5.67-1.04 1.46-1.04 1.04 0 1.46.8 1.46 1.95v4.59h2.87v-4.92c0-2.64-1.42-3.87-3.3-3.87-1.55 0-2.23.86-2.61 1.45h.02v-1.24h-2.87c.04.8 0 8.58 0 8.58z"
                    fill="#fff"></path>
            </svg>
            <svg width="29" height="29" class="hf">
                <path
                    d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79">
                </path>
            </svg>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="thumbnail" width="900"
                height="300">
            <hr>
            <p class="post-cont"><?php echo $post_content; ?></p>
            <hr>
            <p><strong>Post Tags:</strong>&nbsp; <button class="btn btn-light"><?php echo $post_tags; ?></button></p>
            <?php 
                //freeing result
                //mysqli_stmt_free_result($stmt); 
            
            ?>
            <div class="row">
                <p class="pull-right"><a href=""
                        class="btn btn-primary <?php echo  userLikedThisPost($the_post_id)?' unlike': ' like' ; ?>"><i
                            class="far fa-thumbs-up"></i>&nbsp;<?php  echo userLikedThisPost($the_post_id) ? 'Unlike': 'Like' ; ?></a>
                </p>
            </div>
            <!-- <div class="row">
                <p class="pull-right"><a href="javascript:void(0)" class="btn btn-primary btn-lg unlike"><i class="far fa-thumbs-down"></i>&nbsp;Unlike</a> </p>         
            </div> -->
            <div class="row">
                <p class="pull-right like-count">Likes: <?php  echo $total_likes;  ?></p>
            </div>
            <div class="clearfix"></div>
            <hr id="break">

            <?php     


                } //while

                    }
                    else{

                        header("Location: index.php");
                    }

                ?>
<?php

$name_query = mysqli_query($conn,"SELECT * FROM `users` WHERE `USER_ID` = '$user_id'");
while($row2 = mysqli_fetch_assoc($name_query)){
    $first_name = $row2['FIRST_NAME'];
    $last_name = $row2['LAST_NAME'];
   
}
$fullname = $first_name . ' ' . $last_name;
?>

            <?php
                $msg = '';
                if(isset($_POST['create_comment'])){

                    $the_post_id = $_GET['p_id'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];


                    if(!empty($comment_email) && !empty($comment_content))
                    {

                        $query = "INSERT INTO `comments` (`comment_post_id`,`comment_user_id`,`comment_user`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ('$the_post_id','$user_id','$fullname', '$comment_email', '$comment_content','unapproved',now())";
                        $create_comment_query = mysqli_query($conn,$query);

                        if($create_comment_query){
                            $msg = "<p class='bg-success' style='font-weight: bold;'>Your comment has been added, please wait to be approved by the moderator</p>";
                        
                        }
                        else{
                            die("query failed" . mysqli_error($conn));
                        }
                    
                        // $query1 = "UPDATE `posts` SET `post_comment_counts` = `post_comment_counts` + 1 WHERE `post_id` = '$the_post_id'";
                        // $update_comment_count = mysqli_query($conn,$query1);
                        // if(!$update_comment_count){
                        //     die("Query Failed" . mysqli_error($conn));
                        // }



                    }
                    // else{

                    //     echo "<script>alert('Fields cannot be empty')</script>";
                    // }
                    
                }

            ?>



            <!-- Comments Form -->
            <div class="well">
                <?php echo $msg;  ?>
                <h4>Leave a Comment:</h4>
                <form role="form" action="post.php?p_id=<?php  echo $the_post_id; ?>" method="post">
                    <div class="form-group">
                        <!-- <label for="author" style="font-size:18px;">Author</label><br> -->
                        <!-- <input type="text" class="form-control" name="comment_author" id="author" required> -->
                        <h4 style="font-weight:bold;font-size:19px;"><?php echo $first_name .' ' . $last_name; ?></h4>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="comment_email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea class="form-control" name="comment_content" id="body" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Leave Comment</button>
                </form>
            </div>
            <hr>


            <!-- Posted comments -->

            <?php

                $query = "SELECT * FROM `comments` WHERE `comment_post_id` = {$the_post_id} AND `comment_status` = 'approved' ORDER BY `comment_id` DESC"; //Newest comments first
                $select_comment_query = mysqli_query($conn,$query);
                if(!$select_comment_query){
                    die("Query Failed" . mysqli_error($conn));
                }

                while($row = mysqli_fetch_assoc($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_user = $row['comment_user'];

              
                ?>

            <div class="media comments">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment_user; ?>
                        <small><?php echo $comment_date; ?></small>
                    </h4>
                    <p class="comment-content"><?php echo $comment_content; ?></p>
                </div>
            </div> <!-- comments -->
            <?php }  ?>
            <hr>

        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div> <!-- Container -->

<?php  include 'C:/xampp/htdocs/col_social_network/includes/footer.php'  ?>


<script>
$(document).ready(function() {

    var post_id = <?php echo $the_post_id;   ?>;
    var user_id = <?php echo $user_id; ?>;

    //Likes
    $(".like").click(function() {

        $.ajax({

            url: "post.php?p_id=<?php echo $the_post_id;  ?>",
            type: "POST",
            data: {
                liked: 1,
                post_id: post_id,
                user_id: user_id
            },
        });
    });

    $(".unlike").click(function() {

        $.ajax({

            url: "post.php?p_id=<?php echo $the_post_id;  ?>",
            type: "POST",
            data: {
                unliked: 1,
                post_id: post_id,
                user_id: user_id
            },
        });
    });


})
</script>