<?php include('connection.php');?>
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
            <label for="dueDate" id="dueDate">Due Date: </label>
            <input type="date" name="due" id="dueDate" /><br>
            <?php
              $user = $_SESSION['username'];
              $query = mysqli_query($conn, "SELECT * from users JOIN user_course USING(id) JOIN group_form ON courseCode = courseCodeForm JOIN form USING(formID) WHERE username = $user AND identification = 'teacher'");

              while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                echo $row['groupID'];
              }
            ?>
            <div id="groupBox" style="margin-bottom: 50px;"></div><br>
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