<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadStat = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])) {
        if($imageFileType == "JSON") {
            echo "File is JSON";
            $uploadStat = 1;
        } else {
            echo "File is not JSON.";
            $uploadStat = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadStat = 0;
    }

    if ($_FILES["upload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadStat = 0;
    }
    
    if($imageFileType != "json") {
        echo "Sorry, only JSON files are allowed.";
        $uploadStat = 0;
    }

    if ($uploadStat == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["upload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
<!--<?php include('connection.php');?>-->
<html>
    <head>
        <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="styles/formStyle.css" rel="stylesheet" type="text/css"/>
        <script src="jquery.min.js"></script>
        <meta charset="UTF-8">
        <meta name="description" content="online evaluation">
        <meta name="author" content="Group 2">
        <title>Online Evaluation</title>
    </head>

    <body>
    <div id='uploadContainer'>
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="file-upload">
            <label for="classCode" id="classCode">Class Code: </label>
            <input type="text" id="classCode" name="classCode" placeholder="9358A"><br>
            <label for="upload" class="btn">Choose a file</label>
            <input type="file" name="upload" accept="application/json" id="upload" style="display: none;" />
            <p class="file-name" style="margin-left: 230px;">Please select a JSON file</p>
            <input type="submit" value="Upload" class="uploadButton" /> 
        </form>
    </div>

<script>
    jQuery(function($) {
  $('#upload').change(function() {
    if ($(this).val()) {
        error = false;
    
      var filepath = $(this).val();
      var filename = filepath.split("\\");
      var length = filename.length;

            $(this).closest('.file-upload').find('.file-name').html(filename[length-1]);

      if (error) {
        parent.addClass('error').prepend.after('<div class="alert alert-error">' + error + '</div>');
      }
    }
  });
});
</script>
</body>
</html>
