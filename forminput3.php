<!DOCTYPE html>
<html>
  <head>
    <title>Find volume of certain shapes</title>
    <link rel = "stylesheet" href = "fproj.css" />
  </head>


  <body>

    <h1>Select the shape you want throught the radio buttons</h1>
    <p>Demo of how to take form input and pass it to a program - all in a single page</p>
    <p>This example uses a form with radio buttons</p>
    
    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $arg3 = $output = $retc = "";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         $arg3 = test_input($_POST["arg3"]);
	 $arg4 = test_input($_POST["arg4"]);
	 $arg5 = test_input($_POST["arg5"]);
         exec("/usr/lib/cgi-bin/sp1b/findshapevolume " . $arg1 . " " . $arg2 . " " . $arg3 . " " . $arg4 . " " . $arg5, $output, $retc); 
       }
       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Shape: 
      <input type="radio" name="arg1" value="1">Cylinder
      <input type="radio" name="arg1" value="2">Cone
      <input type="radio" name="arg1" value="3">Hexagonal Pyramid
      <br><br>
      Radius/Base edge length: <input type="text" name="arg2"><br>
      Height: <input type="text" name="arg3"><br>
      Min Range: <input type="text" name="arg4"><br>
      Max Range: <input type="text" name="arg5"><br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
         echo "<h2>Your Input:</h2>";
         echo "Shape: " . $arg1;
         echo "<br>";
         echo "Arg2: " . $arg2;
         echo "<br>";
         echo "Arg3: " . $arg3;
         echo "<br>";
	 echo "Arg4: " . $arg4;
         echo "<br>";
	 echo "Arg5: " . $arg5;
         echo "<br>";
       
         echo "<h2>Program Output (an array):</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       
         echo "<h2>Program Return Code:</h2>";
         echo $retc;
       }
    ?>
    
  </body>
</html>
