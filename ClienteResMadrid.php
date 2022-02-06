<?php
   /* 

    
    /*foreach ($json['DailyForecasts'] as $key => $value) {
        
        foreach ($value['Day'] as $key2 => $value2) {
            
            if($key2 =='IconPhrase')
            {
               echo $value2;  
            }
        }
    }*/
    

    
    
    ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../web-root/css/resetCSS.css"/>
        <link rel="stylesheet" href="../web-root/css/style2.css"/>
        <title>Tarea 08</title>
        <style>
            
            </style>
</head>
<body>
    <header>
        <h1>Tarea Tiempo en Castilla y Leon</h1>
    </header>
    <main>
        
    <?php

        require_once("./validarApi.php");
    
        if(validarDesplegable()==true)
        {
            $codigo =$_REQUEST['ciudades'];
            $url= "http://dataservice.accuweather.com/forecasts/v1/daily/5day/".$codigo."?apikey=H8GSfV1ptKGNbyXcdGKacJpPpADz4Tqx&language=es&details=true";

            $devuelve = file_get_contents($url);

            if($devuelve)
            {
                $json = json_decode($devuelve, true);
            } 

           echo "<table border='1'>
                <thead>
                    <th>Minimum</th>
                    <th>Maximum</th>
                    <th>Estado</th>
                </thead>
                <tbody>";
            foreach ($json['DailyForecasts'] as $key => $value) {
                echo "<tr>";
                foreach ($value['Temperature'] as $key2 => $value2) {
                    if($key2==0)
                    {
                        echo "<td>".$value2['Value']."".$value2['Unit']."</td>";

                    }
                    if($key2==1)
                    {
                        echo "<td>".$value2['Value']."".$value2['Unit']."</td>";
                    }
                    
                }
                foreach ($value['Day'] as $key2 => $value2) {
            
                    if($key2 =='IconPhrase')
                    {
                       echo "<td>".$value2."</td>";  
                    }
                }

                echo "</tr>";

            }
    echo "        
    </tbody>
</table>";




        }else{
    
    
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
        <section>
            <label>Seleccionar opciones</label><br>
            <select name="ciudades" id="ciclo">  
                <option value="no" <?php recordarSelect("no")?>>Seleccione una opción</option>  
                <option value="303118" <?php recordarSelect("Ávila")?>>Ávila</option>
                <option value="307142" <?php recordarSelect("Burgos")?>>Burgos</option>
                <option value="307143" <?php recordarSelect("León")?>>León</option>
                <option value="303119" <?php recordarSelect("Palencia")?>>Palencia</option>
                <option value="307144" <?php recordarSelect("Salamanca")?>>Salamanca</option>
                <option value="303120" <?php recordarSelect("Segovia")?>>Segovia</option>
                <option value="303117" <?php recordarSelect("Soria")?>>Soria</option>
                <option value="307145" <?php recordarSelect("Valladolid")?>>Valladolid</option>
                <option value="303121" <?php recordarSelect("Zamora")?>>Zamora</option>

            </select>  
            <?php
                comprobarSelect();
            ?>
            <input type="submit" value="Enviar los Datos" name="enviado">
        </section>

        </form>
    <?php
        }

    ?>
    </main>
    
</body>
</html>


