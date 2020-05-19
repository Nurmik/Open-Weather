<?php
    $url = 'http://api.openweathermap.org/data/2.5/forecast?q=Orissaare&units=metric&appid=06ed851bc3a9783e695fcbda895b0c50';
    $cacheFile = './cache.json';
    $cacheTime = 300;

    if (file_exists($cacheFile) && time() - filemtime($cacheFile) < $cacheTime ) {
        $content = file_get_contents($cacheFile);
    } else {
        $content = file_get_contents($url);

        $file = fopen($cacheFile, 'w');
        fwrite($file, $content);
        fclose($cacheFile);
    }

    $json = json_decode($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenWeatherMap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="city"><?php echo $json->city->name . ", " . $json->city->country?></div>
    <div class="main">
        <div class="day">
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[0]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[0]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[0]->main->temp;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[0]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[0]->dt_txt;?></div>
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[1]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[1]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[1]->main->temp;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[1]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[1]->dt_txt;?></div>
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[2]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[2]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[2]->main->temp;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[2]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[2]->dt_txt;?></div>    
        </div>
        <div class="day">    
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[3]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[3]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[3]->main->temp;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[3]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[3]->dt_txt;?></div>
        </div>
        <div class="day">
            <img src="https://openweathermap.org/img/wn/<?php echo $json->list[4]->weather[0]->icon;?>@2x.png">
            <div class="desc"><?php echo $json->list[4]->weather[0]->description;?></div>
            <div class="temp"><?php echo $json->list[4]->main->temp;?> °C</div>
            <div class="wind">Wind <?php echo $json->list[4]->wind->speed;?> km/h</div>
            <div class="dt"><?php echo $json->list[4]->dt_txt;?></div>    
        </div>
    </div>
</body>
</html>