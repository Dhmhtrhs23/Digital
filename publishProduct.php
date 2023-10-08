<html>
    <head>
        <style>
        *, *:before, *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
          }
          
          body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
          }
          
          form {
            max-width: 300px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
          }
          
          h1 {
            margin: 0 0 30px 0;
            text-align: center;
          }
          
          input[type="text"],
          input[type="password"],
          input[type="date"],
          input[type="datetime"],
          input[type="email"],
          input[type="number"],
          input[type="search"],
          input[type="tel"],
          input[type="time"],
          input[type="url"],
          textarea,
          select {
            background: rgba(255,255,255,0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
            margin-bottom: 30px;
          }
          
          input[type="radio"],
          input[type="checkbox"] {
            margin: 0 4px 8px 0;
          }
          
          select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
          }
          
          button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
            margin-bottom: 10px;
          }
          
          fieldset {
            margin-bottom: 30px;
            border: none;
          }
          
          legend {
            font-size: 1.4em;
            margin-bottom: 10px;
          }
          
          label {
            display: block;
            margin-bottom: 8px;
          }
          
          label.light {
            font-weight: 300;
            display: inline;
          }
          
          .number {
            background-color: #5fcf80;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255,255,255,0.2);
            border-radius: 100%;
          }
          
          @media screen and (min-width: 480px) {
          
            form {
              max-width: 480px;
            }
          
          }
            body{
                background-color: #e5e5f7;
                opacity: 1;
                background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #e5e5f7 25px ), repeating-linear-gradient( #0b781255, #0b7812 );
        
        }
        </style>
   
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
      <form enctype="multipart/form-data" action="__URL__" method="POST" action="index.html" method="post">
        
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
   

        
          <label for="email">NAME:</label>
          <input type="email" id="mail" name="name">
          <label for="email">DESCRIPTION:</label>
          <input type="email" id="mail" name="description">
          <label for="email">Amount:</label>
          <input type="number" id="points" name="amount" step="1">
          <label for="email">Pick picture:</label>
          <input name="userfile" type="file" />





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
       function getBase64(file) {
   var reader = new FileReader();
   reader.readAsDataURL(file);
   reader.onload = function () {
     console.log(reader.result);
   };
   reader.onerror = function (error) {
     console.log('Error: ', error);
   };
}
       function register(){ //NAME|DESCRIPTION|AMOUNT|PNG
            var name = String( document.getElementsByName("name")[0].value );
            var amount = String( document.getElementsByName("amount")[0].value);
            var description = String( document.getElementsByName("description")[0].value);
            
            
            window.location.href = "/api.php?data=createProduct|"+name+"|"+description+"|"+amount+"|"+"";
        } 
       </script>

        <button type="submit" value="Send File" onclick="register()">Publish Restaurant!</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
