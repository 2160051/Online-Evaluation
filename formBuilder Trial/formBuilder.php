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
	   
        echo "<form action='formProcessor.php?id=1' method='post' id='quizForm' id='1' class='quiz'> 
                <ol>";      

        foreach ($formCriteria as $formCriterias) {
            if($formCriterias != null || $formCriterias != undefined){
            echo '<li style="text-align:center;">
                    <h3>'. $formCriterias['criteria']. '</h3> 
                    <div id="radioAlign">
                        <input type="radio" name='.$counter.' id='.$counter.' value="a" />
                        <label for="answerOneA">'. $formCriterias['choices'][0]. '</label>
                    </div>
        
                    <div id="radioAlign">
                        <input type="radio" name='.$counter.' id='.$counter.' value="b" />
                        <label for="answerOneB">'. $formCriterias['choices'][1]. '</label>
                    </div>
        
                    <div id="radioAlign">
                        <input type="radio" name='.$counter.' id='.$counter.' value="c" />
                        <label for="answerOneC">'. $formCriterias['choices'][2]. '</label>
                    </div>

                    <div id="radioAlign">
                        <input type="radio" name='.$counter.' id='.$counter.' value="d" />
                        <label for="answerOneD">'. $formCriterias['choices'][3].'</label>
                    </div>
                </li>';
                $counter++;
        }
    }
        echo "</ol>
                <button class='submitButton' onclick='goBack()'>Go Back</button>
                <input type='submit' value='Submit' class='submitButton' />
             </form>";
?>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>