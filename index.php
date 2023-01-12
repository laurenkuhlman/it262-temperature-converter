<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Temperature Converter</title>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
  </head>

  <body>

  <form action="" method="POST">
    <h2>Temperature Converter</h2>
    <fieldset>
      <label>Temperature to Convert</label>
      <input type="number" name="temp_from" />

        <label>Convert From:</label>
        <ul>
          <li><input type="radio" name="scale_from" value="f" /> Fahrenheit</ul>
          <li><input type="radio" name="scale_from" value="c" /> Celsius</ul>
          <li><input type="radio" name="scale_from" value="k" /> Kelvin</ul>
        </ul>

        <label>Convert To:</label>
        <ul>
          <li><input type="radio" name="scale_to" value="f" /> Fahrenheit</ul>
          <li><input type="radio" name="scale_to" value="c" /> Celsius</ul>
          <li><input type="radio" name="scale_to" value="k" /> Kelvin</ul>
        </ul>
    </fieldset>

    <input type="submit" />
  </form>

    <?php
      //form.php
      echo '';
      if ( isset ( $_POST["temp_from"])){ // show data

        $temp_from = $_POST["temp_from"];
        $scale_from = $_POST["scale_from"];
        $scale_to = $_POST["scale_to"];
        $result = 0;
     
        if ($scale_from == "f" && $scale_to == "c") {
            $result = ($temp_from - 32) * (5/9);
        } elseif ($scale_from == "c" && $scale_to == "f") {
            $result = ($temp_from * (9/5)) + 32;
        } elseif ($scale_from == "c" && $scale_to == "k") {
            $result = $temp_from + 273.15;
        } elseif ($scale_from == "k" && $scale_to == "c") {
            $result = $temp_from - 273.15;
        } elseif ($scale_from == "f" && $scale_to == "k") {
            $result = ($temp_from + 459.67) * (5/9);
        } elseif ($scale_from == "k" && $scale_to == "f") {
            $result = ($temp_from * (9/5)) - 459.67;
        } else {
            echo "<p class='error'>Please complete entire form.</p>";
        }
     
        // Will not show result unless form is complete
        if(!empty($temp_from && $scale_from && $scale_to)) {
          echo '
          <div class="box">
            <p>'.$temp_from .'°'.strtoupper($scale_from).' = '.round($result, 2).'°'.strtoupper($scale_to).'</p>
          </div>
          ';
        }


        // if (is_numeric($result)) {
        //     echo $temp_from . '°'.strtoupper($scale_from).' = ' . round($result, 2) . '°'.strtoupper($scale_to);
        // } else {
        //     echo "<p class='error'>Please enter a valid number.</p>";
        // }
        // echo '<pre>';
        // var_dump ( $_POST );
        // echo '</pre>';
        

      }

    ?>


  </body>
</html>
