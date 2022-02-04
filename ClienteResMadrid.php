<?php
    $url= "http://dataservice.accuweather.com/forecasts/v1/daily/5day/303121?apikey=H8GSfV1ptKGNbyXcdGKacJpPpADz4Tqx&language=es&details=true";

    $devuelve = file_get_contents($url);

    if($devuelve)
    {
        $json = json_decode($devuelve, true);
        //print_r($devuelve);
    }

    





?>



<table border="1">
    <thead>
        <th>Minimum</th>
        <th>Maximum</th>
    </thead>
    <tbody>
        <?php


            foreach ($json['DailyForecasts'] as $key => $value) {
                echo "<tr>";
                /*foreach ($value['Temperature'] as $key2 => $value2) {
                    if($key2==0)
                    {
                        echo "<td>".$value2['Value']."".$value2['Unit']."</td>";

                    }
                    if($key2==1)
                    {
                        echo "<td>".$value2['Value']."".$value2['Unit']."</td>";
                    }
                    
                }*/

                echo "</tr>";
                foreach ($value['Day'] as $key => $value3) {
                    //echo "<td>".$value3['ShortPhrase']."</td>"; 
                    print_r($value3);
                }
            }
            
        
        ?>
    </tbody>
</table>