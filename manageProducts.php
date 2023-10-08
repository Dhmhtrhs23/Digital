
<?php
//echo getcwd();
?>

<link rel="stylesheet" href="style.css">
<?php
function readFileContents($filePath) {
    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file contents
        $fileContents = file_get_contents($filePath);
        
        // Return the file contents
        return $fileContents;
    } else {
        // Return an error message if the file doesn't exist
        return "File not found: $filePath";
    }
}
$current = "sdfsdfsdf";
function dialog($name,$description,$image,$buttonText,$link, $amountleft=-1)
{
    global $current;
    echo        '<li style="width"class="flex-section product-box">';
    echo            '<div class="productText-box">';
    echo               '<h4 class="mb-1-only">'.$name.'</h4>';
    if ($amountleft != -1)
    {
        echo                '<p class="text mb-1-only">'.$description."<br><label style='color:red'>Amount Left: ".$amountleft."</label>".'</p>';
    }else if ($amountleft == -1)
    {
        echo                '<p class="text mb-1-only">'.$description.'</p>';
    }
    echo                '<a class="button" disabled style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link.'">'.$buttonText.'</a>';
    if ($amountleft != -1){echo '  <input style="width:50px;" type="number" value="1" id="points" name="'.$current.'" step="1">';}
    echo            '</div>';
    echo            '<div class="productImg-box">';
    echo                '<img src="'.$image.'"/>';
    echo            '</div>';
    echo        '</li>';
    $current = substr(md5(microtime()),rand(0,26),5);
}
$nnnn = htmlspecialchars($_GET["data"]);
?>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Healthy Diet</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <header>
            <a id="logo" href="#"><bold>RSS</bold></a>
            <a class="button" href="dashboard.php">Back</a>
        </header>
        <hr>
        <h1><?php echo $nnnn; ?></h1>
        <ul class="flex-section cards-box">
        <?php
            if ($_COOKIE['restaurant'] == $nnnn) {
                dialog("Add a new item to your market","Humanitarian","https://i.insider.com/55e58b909dd7cc0f008b7390?width=1000&format=jpeg","Create!","publishProduct.php", -1);
            }
            $files = scandir(getcwd()."/restaurantsF/".$nnnn);
            $a=0;
            foreach($files as $file) { //NAME|DESCRIPTION|AMOUNT|PNG
                if (str_contains($file, '.')){continue;}
                $dataSS = explode("|", readFileContents(getcwd()."/restaurantsF/".$nnnn.'/'.$file) );
                $apotelesma= "/api.php?data=addToCart|'+document.getElementsByName('".$current."')[0].value+'|". getcwd()."/restaurantsF/".$nnnn.'/'.$file;
                dialog($dataSS[0],$dataSS[1],$dataSS[3],"Put in cart!", " #\" onclick=\"window.location.href = ' " .$apotelesma. "'; \" ",$dataSS[2]);
                $a = $a + 1;
            }
            if ($a == 0 and $_COOKIE['restaurant'] != $nnnn){echo "<h1>NO FOOD AVAILABLE FROM THIS MARKET...</h1><h2>CHECK AGAIN LATER.</h2>";}
        ?>
        </ul>
    </body>
</html>

