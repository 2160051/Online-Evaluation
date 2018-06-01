<html>
    <head>
        <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="styles/formStyle.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
    <div id='wrapper'>
    <?php
        $counter = 0;
        $url = 'form.json'; 
        $data = file_get_contents($url); 
        $formCriteria = json_decode($data, true);
	   	
        if(filesize("form.json") == 0){
        	echo '<h3 class="quiz" style="text-align:center;">There is something wrong with your form</h3>
        		  <button class="submitButton" onclick="formBuilder.php">Go Back</button>';
        }else{
        	echo "<form action='formProcessor.php?id=1' method='post' id='quizForm' id='1' class='quiz'> 
                <ol>";      
        	foreach ($formCriteria as $formCriterias) {
            	if($formCriterias != null || $formCriterias != undefined){
            	echo '<li style="text-align:center;">
                    <h3>'. $formCriterias['criteria']. '</h3>';
                
            	$choice = '';
            	$length = count($formCriterias['choices']);
            	for($ctr = 0; $ctr < $length; $ctr++){
            		$choice .= '<div id="radioAlign">';
            		$choice .= '<input type="radio" name='.$formCriterias['choices'][$ctr].' id='.$formCriterias['choices'][$ctr].' value='.$formCriterias['choices'][$ctr].' />';
            		$choice .= '<label for='.$formCriterias['choices'][$ctr].' style="margin: 1em;">'. $formCriterias['choices'][$ctr]. '</label></div>';
            	}

            	echo $choice;
                $counter++;
        	}
    	}
        	echo '</ol>
                <button class="submitButton" formaction="formBuilder.php">Go Back</button>
                <input type="submit" value="Submit" class="submitButton" />
             </form>';
        }        
?>
</div>
</body>
</html>