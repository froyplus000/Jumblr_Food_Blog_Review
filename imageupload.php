<?php require "./header.php"; ?>


<?php

// Declare general variable initial states
$directory = 'uploads';
$uploadOk = 1;
$the_massage = "";

// Declare PHP Upload Errors Scenarios
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
    );

if(isset($_POST['imageUpload-submit'])){
    $temp_name = $_FILES['fileToUpload']['tmp_name'];
    $target_file = $_FILES['fileToUpload']['name'];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $my_url = $directory . DIRECTORY_SEPARATOR . $target_file;
    
    // PHP Custom Errors
    $the_error = $_FILES['fileToUpload']['error'];
    if ($_FILES['fileToUpload']['error'] != 0) {
        $the_massage_ext = $phpFileUploadErrors[$the_error];
        $uploadOk = 0;
    }

    //  Set Custom Error
    //  1. File Already Exist
    if ($the_massage_ext == "" && file_exists($my_url)) {
        $the_massage_ext = "The File already exists, please save as different name or upload a differnet file.";
        $uploadOk = 0;
    }

    // 2. Incorrect File Extension
    if ($the_massage_ext == "" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $the_massage_ext = "File type is not allowed, please choose jpg, png, jpeg or gif";
        $uploadOk = 0;
    }

    // Set our Main Error Handler & Success Upload Case
    if ($uploadOk == 0) {
        $the_massage = "<p>Sorry, your file was not upload</p>" . "<strong>Error: </strong>" . $the_massage_ext;
    } else {
        if (move_uploaded_file($temp_name, $directory . DIRECTORY_SEPARATOR . $target_file)) {
        $the_massage = "File Uploaded Successfully" . 'Preview it: <a href="' . $my_url . '" target="_blank">' . $my_url . '</a>';
        }
    }
}


?>

<!-- Heading -->
<section class="secondarybg">
    <div class="container text-start text-light">
        <h1 class="pt-5 pb-5 p-4">Upload Image Here</h1>
    </div>
</section>

<!-- Form -->
<div class="container p-5 pt-2">

    <form action="imageupload.php" method="POST" enctype="multipart/form-data">
    
        <div class="input-group mb-3">
            <!-- File Input -->
            <input type="file" class="form-control" id="inputGroupFile" name="fileToUpload">
            <!-- Submit Button -->
            <input type="submit" value="Upload" name="imageUpload-submit" class="btn secondarybtn input-group-text"></input>
        </div>
    
    </form>

    <h3>Copy Your Image File Name below</h3>
    <p>Notice : Copy this Image File Name to Create Post Page to use it in your Blog</p>
    
    <?php
        if ($the_massage == "") {
          echo null;
        } else if ($uploadOk == 0) {
          echo '
            <h3>
                <div class="alert text-light rounded-pill text-center shadow errorbg mt-5" role="alert">
                ' . $the_massage . '
                </div>
            </h3>
          ';
        } else {
            echo '
            <h3>
                <div class="alert text-light rounded-pill text-center shadow successbg mt-5" role="alert">
                ' . $the_massage . '
                </div>
                
                <form action="./createpost.php" method="GET">
                <input type="text" class="visually-hidden" name="imgName" value="'. $target_file .'">
                    <button type="submit" class="btn secondarybtn rounded-pill">
                        Create Post with this Image : '. $target_file .'
                    </button>
                </form>
            </h3>
          ';
            
            

        }
        ?>



    


</div>


<?php require "./footer.php" ?>
