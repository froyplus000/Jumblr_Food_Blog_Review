<?php require "./header.php"; ?>

<?php 

    if(isset($_GET['post']) == "success"){
        echo '
            <h1>
                <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
                    Post had been Created!
                </div>
            </h1>
            ';
    }

?>
<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">All Food Blogs Review Are Here</h1>
    </div>
</section>

<div class="container p-5">

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card shadow text-light">
                <img src="./img/test.jpg" class="card-img-top" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Restaurant Name</h5>
                    <p class="card-text lead">Ramia Restaurant</p>
                    <h5 class="card-title">Our Thought</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eligendi at quos nisi reprehenderit vero necessitatibus alias praesentium voluptates natus. Itaque necessitatibus tenetur at et ad saepe molestiae distinctio. Illo assumenda, fuga mollitia ipsa tenetur, sit fugiat nobis libero ut eaque natus quam iure non reprehenderit aut praesentium earum illum.
                    </p>
                    <h5 class="card-title"> Our Rating</h5>
                    <p class="card-text">4.5</p>
                    <h5 class="card-title">Our Favourites Dish</h5>
                    <p class="card-text">Cabonara, Steak and Pizza</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow text-light">
                <img src="./img/test.jpg" class="card-img-top" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Restaurant Name</h5>
                    <p class="card-text lead">Ramia Restaurant</p>
                    <h5 class="card-title">Our Thought</h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum eligendi at quos nisi reprehenderit vero necessitatibus alias praesentium voluptates natus. Itaque necessitatibus tenetur at et ad saepe molestiae distinctio. Illo assumenda, fuga mollitia ipsa tenetur, sit fugiat nobis libero ut eaque natus quam iure non reprehenderit aut praesentium earum illum.
                    </p>
                    <h5 class="card-title"> Our Rating</h5>
                    <p class="card-text">4.5</p>
                    <h5 class="card-title">Our Favourites Dish</h5>
                    <p class="card-text">Cabonara, Steak and Pizza</p>
                </div>
            </div>
        </div>
    </div>

</div>


<?php require "./footer.php"?>
