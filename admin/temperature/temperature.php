<?php

  $geolocation = json_decode(file_get_contents('http://ip-api.com/json/'));
  $latitude = $geolocation->lat;
  $longitude = $geolocation->lon;
  $country = $geolocation->country;

  $apiKey = "30170f94e5d7d16ac41dc71f622070d1";
  $url = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apiKey";
  $data1 = json_decode(file_get_contents($url));

  if (isset($data1->name)) {
    $cityName = $data1->name;
  } else {
    echo "Não foi possível obter informações sobre sua cidade atual.";
  }

  $response = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$cityName}&appid={$apiKey}");
  $data2 = json_decode($response);
  $weather = $data2->weather[0]->main;
  $temp = intval($data2->main->temp - 273.15);

?>
