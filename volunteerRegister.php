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
           let params = new URLSearchParams(document.location.search);
            var name = String( document.getElementsByName("name")[0].value );
            var email = String( document.getElementsByName("email")[0].value);
            
            window.location.href = "/api.php?data="+  encodeURI( "registerVolunteer|"+name+"|"+email+"|"+params.get('data') );
        } 
       </script>
        <div class="sign"><button onclick="register()">SignUp</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
