<?php
session_start();
require 'getWeather.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's The Weather?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body id>
    
    <img src="images/sample-logo-design-png-3-2.png" id="logo">
    <div class="container">
        <form style="width: 60%; margin:auto;">
            <h1 class="color">What's The Weather in the World?</h1>
            <h2 class="color">The easiest and fastest way to know the weather</h2>
            <form action="index.php" method="POST">
                <div class="mb-3">
                    <input class="form-control" id="city" name="city" value="<?= $city ?>" placeholder="Enter your city here" style="background-color: rgba(255, 255, 255, 0.1)">
                </div>
                <button type="submit" class="btn btn-primary">Take a see</button>


                <?php
                //Chiede usando la funzione '?' se c'è un valore dentro alla variabile(se è si verrà stampato success altrimenti danger)
                $class = $weather ? '' : 'danger'
                
                ?>
                <div style="color: rgba(251, 251, 251, 0.702);" id='result' class="alert alert-<?= $class ?>">
                    <!-- Se c'è un valore dentro alla variabile wheather stampa weather altrimenti stampa il messagio di error  -->
                    <h3><?= $weather ? $weather : $error; ?> </h3>
                     <?php  
                     
                     switch($_SESSION['city']) {
                          
                        case 'clouds':?>  <img src="images/clouds.png" style="width: 60%; margin:auto;"><?php 
                            break;
                        case 'clear':?>  <img src="images/sun.png" style="width: 60%; margin:auto;"><?php   
                            break;
                        case 'fog':?>  <img src="images/foggy.png" style="width: 60%; margin:auto;"><?php 
                            break;
                        case 'snow':?>  <img src="images/snow.png" style="width: 60%; margin:auto;"><?php 
                             break;
                        case 'mist':?>  <img src="images/cloudy.png" style="width: 60%; margin:auto;"><?php 
                            break;
                        case 'rain':?>  <img src="images/rain.png" style="width: 60%; margin:auto;"><?php 
                        
                        
                        
                        
                        ?>
                        <?php
                          } ?>
                   
                </div>
            </form>
            <h2><div class="container" style='padding-top:30%; width: auto;'>With API from OpenWeatherMap <br>Weather icons created by iconixar - Flaticon <br><a href="https://www.flaticon.com/free-icons/weather"></a></div></h2>

        </form>
    </div>
    <div id="map"></div>

    </div>
   
</body>

</html>