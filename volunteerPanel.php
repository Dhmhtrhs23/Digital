
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
function dialog($name,$description,$image,$buttonText,$link)
{
    echo        '<li style="width"class="flex-section product-box">';
    echo            '<div class="productText-box">';
    echo               '<h4 class="mb-1-only">'.$name.'</h4>';
    echo                '<p class="text mb-1-only">'.$description.'</p>';
    echo                '<a class="button" disabled style="font-family: '."'".'Arial Black'."'".',sans-serif;" href="'.$link.'">'.$buttonText.'</a>';
    echo            '</div>';
    echo            '<div class="productImg-box">';
    echo                '<img src="'.$image.'"/>';
    echo            '</div>';
    echo        '</li>';
}
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

            <a id="logo" href="#"><bold>RSS</bold></a>
            <a style="float:right" class="button" href="dashboard.php">Back.</a><br><br>
        </header>
        <hr>
        <h1>Orders in requirement of delivery.</h1>
        <ul class="flex-section cards-box">
        <?php
        function convertWebMercatorToLatLon($x, $y) {
    $lon = ($x / 20037508.34) * 180;
    $lat = ($y / 20037508.34) * 180;

    $lat = (180 / M_PI) * (2 * atan(exp(($lat * M_PI) / 180)) - M_PI / 2);

    return array("latitude" => $lat, "longitude" => $lon);
}

    
     $data = $_GET['data'];
        $cart =readFileContents( getcwd()."/costumers/".$data);
            $products = explode("~",explode("~", $cart,2)[1]);
            $other = explode("|",explode("~", $cart,2)[0]);
            $c=0;
            $companies=[];
            foreach ($products as &$product) {//name|email|home address|1066307.1382622|6271010.555445|~4|/home/vol13_2/infinityfree.com/if0_35181984/htdocs/restaurantsF/MASOUTHS/ASDASDSD
                try{
                    if ($product == ""){continue;}
                    $c = $c+1;
                    $productSplit = explode("|", $product);
                    $name = explode("/",$productSplit[1])[8];
                    $contents = readFileContents($productSplit[1]);
                    $contentsS = explode("|",$contents);
                    dialog($name,"Ordered ".$productSplit[0]." units.",$contentsS[3],"","");
                
                    //dialog($name,"",)
                    $realname= explode("/",$productSplit[1])[7];
                    $restaurant = explode("|",readFileContents( getcwd()."/restaurants/".$realname)); // name|email|restaurant|description|4206951.7560064|7630978.1625056
                    if (!in_array($restaurant[0], $companies)) {
                        array_push($companies,$restaurant[0]);
                        $result2 = convertWebMercatorToLatLon(floatval($restaurant[4]),floatval($restaurant[5]));
                        echo '</ul><h3>SERVICE: '.$restaurant[0].'</h3><iframe width="100%" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-288.28125000000006%2C-81.97243132048266%2C298.82812500000006%2C86.87529661650542&amp;layer=mapnik&amp;marker='.strval($result2["latitude"]).'%2C'.strval($result2["longitude"]).'" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=26.2&amp;mlon=5.2#map=2/26.2/5.2">View Larger Map</a></small>';
                    }
                } catch (Exception $e) {
                }
            }
            $result = convertWebMercatorToLatLon(floatval($other[3]),floatval($other[4]));
                   echo '</ul><h3>Costumer Destination</h3><iframe width="100%" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-288.28125000000006%2C-81.97243132048266%2C298.82812500000006%2C86.87529661650542&amp;layer=mapnik&amp;marker='.strval($result["latitude"]).'%2C'.strval($result["longitude"]).'" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=26.2&amp;mlon=5.2#map=2/26.2/5.2">View Larger Map</a></small>';
            ?>

            <?php
            echo '<a class="button" style="width:100%" href="volunteerRegister.php?data='.$data.'">Volunteer to handle delivery.</a>';
            ?>
            
        
    </body>
</html>

