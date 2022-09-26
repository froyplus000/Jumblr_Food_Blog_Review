<?php require "./header.php"; ?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">All Food Blogs Review Are Here</h1>
    </div>
</section>

<!-- Dynamic - Post successfully created - createpost.inc.php -->
<?php 
    
    if(isset($_GET['post']) == "success"){
        echo '
            <h1>
                <div class="alert text-light rounded-pill text-center shadow successbg" role="alert">
                    Post had been Created!
                </div>
            </h1>
            ';
    }

?>
<!-- Dynamic - Post successfully Deleted - deletepost.inc.php -->
<?php 
    
    if(isset($_GET['delete']) == "success"){
        echo '
            <h1>
                <div class="alert text-light rounded-pill text-center shadow successbg" role="alert">
                    Post had been Delete!
                </div>
            </h1>
            ';
    }

?>

<!-- Dynamic - Post successfully Edited - editpost.inc.php -->
<?php 
    
    if(isset($_GET['edit']) == "success"){
        echo '
            <h1>
                <div class="alert text-light rounded-pill text-center shadow successbg" role="alert">
                    Post had been Edited!
                </div>
            </h1>
            ';
    }

?>

<!-- Query DB for all posts -->

<?php
    // Connect to DB
    require "./include/connect.inc.php";
    // Save SQL query to variable
    $sql = "SELECT id, idUsers, restaurantName, imageurl, comment, rating, favouriteDish FROM posts";
    // Run SQL Query and save to Variable
    $result = mysqli_query($conn, $sql);

?>






<div class="container">
    <div class="">

        <?php 
            // Check that rows are exist in DB, (if any data in DB) run code in this if statement
            if(mysqli_num_rows($result) > 0){

                // Declare output variable
                $output = "";
                    // while loop, convert result to an array and store in variable
                    while($row = mysqli_fetch_assoc($result)) {
                        // Join output cards together with .=
                        $output .=
                        '


                                    <div class="card shadow text-light mb-4" id="'. $row['id'] .'">
                                        <img src="./uploads/'. $row['imageurl'] .'" class="card-img-top post-image" alt="'. $row['restaurantName'] .'">
                                        <div class="card-body">
                                            <h5 class="card-title">Restaurant Name</h5>
                                            <p class="card-text lead">'. $row['restaurantName'] .'</p>
                                            <h5 class="card-title">Our Thought</h5>
                                            <p class="card-text">
                                                '. $row['comment'] .'
                                            </p>
                                            <h5 class="card-title"> Our Rating</h5>
                                            <p class="card-text">'. $row['rating'] .'</p>
                                            <h5 class="card-title">Our Favourites Dish</h5>
                                            <p class="card-text">'. $row['favouriteDish'] .'</p>
                                            <a href="./uploads/' . $row['imageurl'] . '" class="btn primarybtn mt-2">Full screen Image</a>
                                            ';


                                            // Edit And Delete Button, Only visible if user are loggedin and userId match with idUsers in posts row data
                                            if(isset($_SESSION['userId']) && $_SESSION['userId'] == $row['idUsers']){
                                                $output .= '
                                                <div class="admin-btn">
                                                  <a href="./editpost.php?id=' . $row['id'] . '" class="btn primarybtn mt-2">Edit</a>
                                                  <a href="./include/deletepost.inc.php?id=' . $row['id'] . '" class="btn deletebtn mt-2">Delete</a>
                                                </div>';
                                            }



                                        $output .=      
                                        '
                                        </div>
                                    </div>

                                
                                
                        ';
                                
                    }
                        // echo out $output to user
                        echo $output;
                            
                        
            } else {
                echo "0 Results";
            }
            // Close Connection
            mysqli_close($conn);
        ?>


    </div>
</div>







<!-- <div class="container p-5">

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card shadow text-light" id="">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Restaurant Name</h5>
                    <p class="card-text lead">Ramia Restaurant</p>
                    <h5 class="card-title">Our Thought</h5>
                    <p class="card-text">
                        comment
                    </p>
                    <h5 class="card-title"> Our Rating</h5>
                    <p class="card-text">4.5</p>
                    <h5 class="card-title">Our Favourites Dish</h5>
                    <p class="card-text">Cabonara, Steak and Pizza</p>
                </div>
            </div>
        </div>
        
    </div>

</div> -->


<?php require "./footer.php"?>
