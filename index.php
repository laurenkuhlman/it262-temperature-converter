<!DOCTYPE HTML>  
<html>
  <head>
    <style>
      * {
        background-color: beige
      }
    </style>
  </head>
  <body>
  <form action="" method="POST">
    <fieldset>
      <p>
          Temperature to Convert from <input type="number" name="temp_from" />
      </p>
    </fieldset>
    <fieldset>
      <p>
        <input type="radio" name="scale_from" value="f" />Fahrenheit
      </p>
      <p>
        <input type="radio" name="scale_from" value="c" />Celsius
      </p>
      <p>
        <input type="radio" name="scale_from" value="k" />Kelvin
      </p>
    </fieldset>
    <fieldset>
      <p>
        <input type="radio" name="scale_to" value="f" />Fahrenheit
      </p>
      <p>
        <input type="radio" name="scale_to" value="c" />Celsius
      </p>
      <p>
        <input type="radio" name="scale_to" value="k" />Kelvin
      </p>
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
            echo "Please select a valid conversion type.";
        }
     
        if (is_numeric($result)) {
            echo $temp_from . '°'.strtoupper($scale_from).' = ' . round($result, 2) . '°'.strtoupper($scale_to);
        } else {
            echo "Please enter a valid number.";
        }
        // echo '<pre>';
        // var_dump ( $_POST );
        // echo '</pre>';
        

      }

    ?>


  </body>
</html>
