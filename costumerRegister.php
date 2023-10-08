<html>
    <head>
        <link rel="stylesheet" href="signup.css">
   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">

    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form onsubmit='return false' action="index.html" method="post">
        
        <fieldset>
        
        <style>
            #plus {
    display: block;
    position: absolute;
    top: 25%;
    left: 25%;
    width: 50%;
    height: 50%;
    font-family: sans-serif;
    font-size: 40px;
    color: black;
    vertical-align: middle;
    text-align: center;
            }
    #center {
    top: 45%;
    left: 48%;
    width: 20px;
    height: 20px;
    margin-top: -20px;
    margin-left: -20px;
    padding-top: 10px;
    padding-left: 10px;

    z-index: 10000;
    position: relative;
}
  }
        </style>
   
   <label for="name">Name:</label>
          <input type="text" id="name" name="name">
        
          <label for="email">Email:</label>
          <input type="email" id="mail" name="email">
          <label for="email">House Information (Floor, Address):</label>
          <input type="email" id="mail" name="description">
          <label for="email">Pick location:</label>


          <div style="height:400px" id="mapdiv"><div id="center"><label style="font-size:50px;">+</label></div></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
       
    var pois = new OpenLayers.Layer.Text( "My Points",
                    { location:"./textfile.txt",
                      projection: map.displayProjection
                    });
    map.addLayer(pois);
 // create layer switcher widget in top right corner of map.
    var layer_switcher= new OpenLayers.Control.LayerSwitcher({});
    map.addControl(layer_switcher);
    //Set start centrepoint and zoom    
    var lonLat = new OpenLayers.LonLat( 9.5788, 48.9773 )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
    var zoom=11;
    map.setCenter (lonLat, zoom);  
    
  </script>



        </fieldset>
        <fieldset>  
        <!--
          <legend><span class="number">2</span> Your Role</legend>
            
          <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="light" for="development">Volunteer </label><br>
          <input type="checkbox" id="design" value="interest_design" name="user_interest"><label class="light" for="design">Customer</label><br>
          <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="light" for="development">Shop Owner </label><br>
         </fieldset>  map.getCenter() map.getCenter() map.getCenter() map.getCenter()map.getCenter() map.getCenter() map.getCenter() map.getCenter()map.getCenter() map.getCenter() map.getCenter() map.getCenter()map.getCenter() map.getCenter() map.getCenter() map.getCenter()map.getCenter() map.getCenter() map.getCenter() map.getCenter()
       --> 

       <script>
       function register(){
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            var lon = String( map.getCenter().lon);
            var lat = String( map.getCenter().lat);
            
            window.location.href = "/api.php?data="+  encodeURI( "registerCostumer|"+name+"|"+email+"|"+description+"|"+lon+"|"+lat );
        } 
       </script>
        <div class="sign"><button onclick="register()">SignUp</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
