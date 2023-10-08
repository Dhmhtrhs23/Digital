
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
function dialog($name,$description,$image,$buttonText,$link,$grey=false)
{
    if ($grey){echo        '<li disabled style="opacity:0.5;"class="flex-section product-box">';}
    else{echo        '<li style="width"class="flex-section product-box">';}
    echo            '<div class="productText-box">';
    echo               '<h4 class="mb-1-only">'.$name.'</h4>';
    echo                '<p class="text mb-1-only">'.$description.'</p>';
    if ($grey){ echo               '<a class="button" disabled style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="">In Progress...</a>';}
    else{ echo               '<a class="button"  style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link.'">'.$buttonText.'</a>';}
    echo            '</div>';
    echo            '<div class="productImg-box">';
    echo                '<img alt="" src="'.$image.'"/>';
    echo            '</div>';
    echo        '</li>';
}
function dialog2($name,$description,$image,$buttonText,$link,$grey=false,$button2,$button3,$link2,$link3)
{
    if ($grey){echo        '<li disabled style="opacity:0.5;"class="flex-section product-box">';}
    else{echo        '<li style="width"class="flex-section product-box">';}
    echo            '<div class="productText-box">';
    echo               '<h4 class="mb-1-only">'.$name.'</h4>';
    echo                '<p class="text mb-1-only">'.$description.'</p>';
    if ($grey){ echo               '<a class="button" disabled style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="">In Progress...</a>';}
    else{ echo               '<a class="button"  style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link.'">'.$buttonText.'</a>';}
    echo               '<a class="button"  style="background-color: red;font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link2.'">'.$button2.'</a>';
    echo               '<a class="button"  style="background-color: #8B8000;font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link3.'">'.$button3.'</a>';
    echo            '</div>';
    echo            '<div class="productImg-box">';
    echo                '<img alt="" src="'.$image.'"/>';
    echo            '</div>';
    echo        '</li>';
}
?>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Food Rescue System</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

            <a id="logo" href="#"><bold>Food Rescue System</bold></a>
                    <?php
        if (isset($_GET['data'])) {
            echo "<p style='color:blue'>" . $_GET['data'] . "</p>";
        }
        ?>
            <a style="float:right" class="button" href="addtocart.php">Your cart.</a>
            <a style="float:right" class="button" href="register.php">Register your Restaurant.</a><br><br>
        </header>
        <hr>
        <h1>Orders in requirement of delivery.</h1>
        <ul class="flex-section cards-box">
        <?php
            $files = scandir(getcwd()."/costumers");
            foreach($files as $file) {
                if (str_contains($file, '.')){continue;}
                $dataS = explode("|", readFileContents(getcwd()."/costumers/".$file) );
                $greyOrNot= false;
                foreach($dataS as $file2) {
                    if (str_contains($file2,"PENDING"))
                    {
                        $greyOrNot=true;
                    }
                }
                if ($greyOrNot){dialog2($dataS[0],$dataS[3],"https://static1.moviewebimages.com/wordpress/wp-content/uploads/2023/06/still-from-five-nights-at-freddy-s.jpeg","Visit Page!", "volunteerPanel.php?data=".$file,true,"Delete","Finished","api.php?data=delete|".$file,"");}
                else{dialog2($dataS[0],$dataS[3],"https://static1.moviewebimages.com/wordpress/wp-content/uploads/2023/06/still-from-five-nights-at-freddy-s.jpeg","Visit Page!", "volunteerPanel.php?data=".$file,false,"Delete","Finished","","");}
            }
        ?>
        </ul>
        <hr>
        <h1>Registered Service Providers</h1>
        <ul class="flex-section cards-box">
        <?php
            $files = scandir(getcwd()."/restaurants");
            foreach($files as $file) {
                if (str_contains($file, '.')){continue;}
                $dataS = explode("|", readFileContents(getcwd()."/restaurants/".$file) );
                dialog($dataS[0],$dataS[3],"https://static1.moviewebimages.com/wordpress/wp-content/uploads/2023/06/still-from-five-nights-at-freddy-s.jpeg","Visit Page!", "manageProducts.php?data=".$file);
            }
        ?>
        </ul>
    </body>
</html>

