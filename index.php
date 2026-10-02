<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload</title>
</head>

<body>

    <h2>File Upload Form</h2>

    <!-- File Upload Form -->
    <form method="post" enctype="multipart/form-data">

        <label>Select a file:</label>
        <input type="file" name="myfile" required>

        <br><br>

        <input type="submit" name="upload" value="Upload File">

    </form>

    <?php

    // Check whether the Upload button was clicked
    if (isset($_POST["upload"])) {

        // Get uploaded file information
        $fileName = $_FILES["myfile"]["name"];
        $fileSize = $_FILES["myfile"]["size"];
        $fileType = $_FILES["myfile"]["type"];
        $tempName = $_FILES["myfile"]["tmp_name"];

        // Specify the folder where the file will be saved
        $uploadFolder = "uploads/";

        // Create the complete file path
        $filePath = $uploadFolder . basename($fileName);

        // Move the uploaded file to the uploads folder
        if (move_uploaded_file($tempName, $filePath)) {

            echo "<h3>File Uploaded Successfully!</h3>";

            echo "File Name: " . htmlspecialchars($fileName) . "<br>";
            echo "File Size: " . $fileSize . " bytes<br>";
            echo "File Type: " . htmlspecialchars($fileType) . "<br>";
            echo "Saved Location: " . $filePath;

        } else {

            echo "<h3>File Upload Failed!</h3>";
        }
    }

    ?>

</body>
</html>