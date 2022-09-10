<?php require "./header.php"; ?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Upload Image Here</h1>
    </div>
</section>

<!-- Form -->
<div class="container p-5 pt-2">

    <form action="">
    
        <div class="input-group mb-3">
            <!-- File Input -->
            <input type="file" class="form-control" id="inputGroupFile" name="fileToUpload">
            <!-- Submit Button -->
            <input type="submit" value="Upload" name="imageUpload-submit" class="btn secondarybtn input-group-text"></input>
        </div>
    
    </form>

    
    <h3>
        <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
            Error to Upload Your Image to the Server
        </div>
    </h3>
    <h3>
        <div class="alert text-light rounded-pill text-center shadow successbg mt-5" role="alert">
            Successfully Upload Your Image to the Server
        </div>
    </h3>
    
    <h3>Copy Your Image File Name below</h3>
    <p>Notice : Copy this Image File Name to Create Post Page to use it in your Blog</p>
    <h5> >> Cat.jpg << </h5>


</div>


<?php require "./footer.php" ?>
