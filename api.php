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
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

if (isset($_GET['data'])) {
    $data = $_GET['data'];
    $dataS = explode("|", $data);
    if ($dataS[0] == "registerRestaurant")
    {
        $data = str_replace("registerRestaurant|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {

            }
        }
        if ($c)
        {
            echo getcwd();
            $myfile = fopen(getcwd()."/restaurants/".$dataS[1],"w");
            fwrite($myfile, $data);
            fclose($myfile);
            $myfile = fopen(getcwd()."/rating/".$dataS[1],"w");
            fwrite($myfile, "0");
            fclose($myfile);
            mkdir(getcwd()."/restaurantsF/".$dataS[1], 0777);
            setcookie("restaurant", $dataS[1], time() + ((86400 * 30)*360), "/");
            setcookie("volunteer", "", time()-3600,"/");
            setcookie("costumer", "", time()-3600,"/");
            echo("<script>window.location.replace(\"dashboard.php?data=Your restaurant has been registered on the database!\");</script>");
        }
    }
    if ($dataS[0] == "registerCostumer") //registerVolunteer
    {
        $data = str_replace("registerCostumer|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {

            }
        }
        if ($c) //window.location.href = "/api.php?data="+  encodeURI( "registerCostumer|"+name+"|"+email+"|"+description+"|"+lon+"|"+lat );
        {
            $myfile = fopen(getcwd()."/costumers/".getName(8),"w");
            fwrite($myfile, $data . "|" . $_COOKIE["cart"]);
            fclose($myfile);
            setcookie("volunteer", $dataS[1], time()-3600,"/"); 
            setcookie("costumer", $dataS[1],time() + ((86400 * 30)*360), "/");
            setcookie("restaurant", $dataS[1],time()-3600,"/"); 

            $cart = rawurldecode($_COOKIE["cart"]);
            $products = explode("~",explode("~", $cart, 2)[1]);
            $c=0;
            foreach ($products as &$product) {//BIG MAC WHOPPER|BIG BIG BIG|10|undefined
                try{
                    if ($product == ""){continue;}
                    $c = $c+1;
                    $productSplit = explode("|", $product);
                    $content = readFileContents($productSplit[1]);
                    $contentS = explode("|", $content);
                    $sum = intval( $contentS[2] ) - intval( $productSplit[0] );
                    $content = str_replace($contentS[2],strval($sum),$content);
                    
                    $myfile = fopen($productSplit[1], "w");
                    fwrite($myfile, $content);
                    fclose($myfile);
                    setcookie("rate", $dataS[1],time() + ((86400 * 30)*360), "/");
                    
                    //dialog($name,"",)
                } catch (Exception $e) {
                }
            }
            echo "Done";

            setcookie("cart", $dataS[1], time()-3600,"/"); 

            echo("<script>window.location.replace(\"dashboard.php?data=Your order will be delivered as soon as possible!\");</script>");
        }
    }
    if ($dataS[0] == "registerVolunteer") //registerVolunteer
    {
        $data = str_replace("registerVolunteer|","",$data);
        
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {

            }
        }
        if ($c)
        {
            echo getcwd() ."/costumers/". $dataS[3];
            file_put_contents(getcwd() ."/costumers/". $dataS[3], "|PENDING|", FILE_APPEND | LOCK_EX);
            
            setcookie("volunteer", $dataS[1],time() + ((86400 * 30)*360), "/");
            setcookie("costumer", $dataS[1],time()-3600,"/"); 
            setcookie("restaurant", $dataS[1],time()-3600,"/"); 
            echo("<script>window.location.replace(\"dashboard.php?data=The costumer will now await your delivery!\");</script>");
        }
    }



        






    if ($dataS[0] == "createProduct") //registerVolunteer
    {
        $data = str_replace("createProduct|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {

            }
        }
        if ($c)
        {
            echo getcwd();
            $myfile = fopen(getcwd()."/restaurantsF/".$_COOKIE["restaurant"]."/".$dataS[1],"w");
            fwrite($myfile, $data);
            fclose($myfile);
            
        }
        echo("<script>window.location.replace(\"manageProducts.php?data=". $_COOKIE["restaurant"] ."\");</script>");
    }





    


    if ($dataS[0] == "addToCart")
    {
         $data = str_replace("addToCart|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {

            }
        }
        if ($c)
        {
            $dataE = $data;
            
            //if(!isset($_COOKIE['cart'])){setcookie("cart", $_COOKIE["cart"] . "~" . $dataE + ((86400 * 30)*360), "/");}
            $sh = explode("|", $dataE)[1];
            if (!str_contains($_COOKIE["cart"],$sh))
            {#AMOUNT|PLACE
                setcookie("cart", $_COOKIE["cart"] . "~" . $dataE ,time() + ((86400 * 30)*360), "/");
            }
            echo $dataE;
            foreach ($sh as &$value) {
                echo $value;
            }
        }
        echo("<script>window.location.replace(\"dashboard.php?data=The products have been successfully added to your cart!\");</script>");
    }
    



    if ($dataS[0] == "rate")
    {
         $data = str_replace("rate|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {
                
            }
        }
        if ($c)
        {
            $number = $dataS[1];
            $company = rawurldecode($dataS[2]);
            if(isset($_COOKIE["rate"])) {
                echo '.....';
                echo $company;
                echo "````";

                
                    file_put_contents(getcwd()."/rating/".$company, "|". $number, FILE_APPEND | LOCK_EX);
                
            }
            setcookie("rate", $dataS[1],time()-3600,"/"); 
        }
        //echo("<script>window.location.replace(\"rating.php?data=".$company."\");</script>");
    }










    if ($dataS[0] == "delete")
    {
         $data = str_replace("delete|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {
                
            }
        }
        if ($c)
        {
            if(isset($_COOKIE["costumer"])) {
                unlink(getcwd()."/costumers/".$dataS[1]);
            }
        }
        //echo("<script>window.location.replace(\"rating.php?data=".$company."\");</script>");
    }

    if ($dataS[0] == "delete")
    {
         $data = str_replace("delete|","",$data);
        /*
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var restaurant = String( document.getElementsByName("restaurant")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
        */
        $c = true;
        foreach ($dataS as &$value) {
            if ($value == "")
            {
                
            }
        }
        if ($c)
        {
            if(isset($_COOKIE["costumer"])) {
                unlink(getcwd()."/costumers/".$dataS[1]);
            }
        }
        //echo("<script>window.location.replace(\"rating.php?data=".$company."\");</script>");
    }








} else {
}
 //createProduct //NAME|DESCRIPTION|AMOUNT|PNG?>