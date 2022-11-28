<?php

// Funzione che viene eseguita se la variabile $city è vuota
$city = '';
$weather ='Sun and rain are equally necessary to ripen grapes and talent.
Friedrich Nietzsche';
$error ='';



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
   $weather = 'The weather in '.$_GET['city']." now is ".$weatherArray['weather'][0]['description'].", the temperature is ".$tempCelsius."&deg;C with a minim of ".$tempMin."&deg;C and a maxim of ".$tempMax."&deg;C. Humidity ". $umidity."%";
 } else {
    $weather ='';
    $error = 'No data found';
 }
  
} else {
    $weather ='';
    $error = 'No data found';
}
}
