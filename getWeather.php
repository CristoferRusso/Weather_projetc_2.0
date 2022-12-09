<?php

// Funzione che viene eseguita se la variabile $city è vuota
$city = '';
$weather ='Sun and rain are equally necessary to ripen grapes and talent.
Friedrich Nietzsche';
$error ='';
$_SESSION['city'] = '';


if (!empty($_GET['city'])) {
 
   $urlContents = @file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".@urlencode($_GET['city'])."&appid=7b81e7537b8f794352d953e11e3e2a89");
   $weatherArray= json_decode($urlContents, true);
   //Si prendono i dati dall'array che ci restituisce json_decode e si assegnano a una variabile (per il calcolo celsius si sottrae 273 dal valore)
   //intval serve a trasformare il valore in un numero intero eliminando i valori decimali (senza risulterà es.12,45 ecc)
 if(!empty($weatherArray['cod'])) {
   if($weatherArray['cod'] == 200) {
   $tempCelsius =intval($weatherArray['main']['temp']-273);
   $tempMin =intval($weatherArray['main']['temp_min']-273);
   $tempMax =intval($weatherArray['main']['temp_max']-273);
   $umidity =$weatherArray['main']['humidity'];
   //Per recuperare il valore si va a inserire l'indice dell'array dove si trova la variabile [weather], ecc
   $weather = ucfirst($_GET['city']).'<br>'.$weatherArray['weather'][0]['main']."<br>".$tempCelsius."&deg;C <br> Minim of ".$tempMin."&deg;C  Maxim ".$tempMax."&deg;C<br> Humidity ". $umidity."%";
  
   if($weatherArray['weather'][0]['main']=='Clouds') {
    $_SESSION['city'] = 'clouds';
  } else if ($weatherArray['weather'][0]['main']=='Clear') {
  $_SESSION['city'] = 'clear';
  } else if ($weatherArray['weather'][0]['main']=='Fog') {
  $_SESSION['city'] = 'fog';
  } else if ($weatherArray['weather'][0]['main']=='Snow') {
    $_SESSION['city'] = 'snow';
  } else if ($weatherArray['weather'][0]['main']=='Mist') {
    $_SESSION['city'] = 'mist';
  } else if ($weatherArray['weather'][0]['main']=='Rain') {
    $_SESSION['city'] = 'rain';
  } 
}
} else {
    $weather ='';
    $error = 'No data found';
}





}