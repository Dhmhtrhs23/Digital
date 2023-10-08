
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
        //return "File not found: $filePath";
    }
}
function dialog($name,$description,$image,$buttonText,$link)
{
    echo        '<li style="width"class="flex-section product-box">';
    echo            '<div class="productText-box">';
    echo               '<h4 class="mb-1-only">'.$name.'</h4>';
    echo                '<p class="text mb-1-only">'.$description.'</p>';
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
        <header>
            <a id="logo" href="#"><bold>RSS</bold></a>
            <a class="button" href="dashboard.php">Back</a>
        </header>
        <hr>
        <h1>Your cart</h1>
        <a class="button" style="float:right;font-size:20px;" onclick='document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";location.reload(); '>Clear your cart.</a>
        <ul class="flex-section cards-box">
        <?php
            $cart = rawurldecode($_COOKIE["cart"]);
            $products = explode("~", $cart);
            $c=0;
            foreach ($products as &$product) {
                try{
                    if ($product == ""){continue;}
                    $c = $c+1;
                    $productSplit = explode("|", $product);
                    $name = explode("/",$productSplit[1])[8];
                    $contents = readFileContents($productSplit[1]);
                    $contentsS = explode("|",$contents);
                    dialog($name,"Ordered ".$productSplit[0]." units.",$contentsS[3],"","");
                
                    
                    //dialog($name,"",)
                } catch (Exception $e) {
                }
            }
            if ($c ==0){
                echo "<h3>You have nothing in your cart.. You should go buy something!</h3>";
            }
        ?>
        </ul>
        <a class="button" href="costumerRegister.php" style="width:100%;font-size:20px;">Checkout</a>
        
    </body>
</html>

