<! –– Code author : Muhammad Asnawie ––>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKE RENTAL</title>
</head>
    <body>
            <style>
            body {
                text-align: center;
                /* padding: 40px 0; */
                background-color: #ABE7FF;
                background-position: center;
                background-size: cover;
            }
            h1 {
            color: #059AF5;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
            }
            p {
            color: #000;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
            }
            i {
                color: #0522F5;
                font-size: 100px;
                line-height: 200px;
                margin-left:-15px;
            }
            .card {
                background: white;
                padding: 60px;
                border-radius: 4px;
                box-shadow: 0 2px 3px #C8D0D8;
                display: inline-block;
                margin-top: 100px;
               


            }


            
            #back{
                width: 150px;
                height: 40px;
                background: #FFB2D8;
                border:none;
                margin-top: 10px;
                margin-left: 65px;
                font-size: 18px;
            transition: 0.4s ease;

            }
            
            #back:hover {
                background: #FFDDF6;
                color: black; /* Set the font color to the same as the background color */
            }

            #back a{
                text-decoration: none;
                color: black;
                font-weight: bold;
            }
            .ba{
                width: 1px;
                
            }
            </style>

       
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #ABE7FF; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1>
        <p>We received your rental request,<br/> we'll be in touch shortly!</p>
        <div class="ba"><button id="back"><a href="menu.php">HOME</a></button></div>
        
      </div>
    </body>
</html>
