<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nErr = "";
$n = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["n"])) {
    $nErr = "n is required";
  } else {
    $n = test_input($_POST["n"]);
    // check if name only number
    if (!is_numeric($n)) {
      $nErr = "Only numbers allowed";
    }
    elseif ($n < 10 | $n > 100) {
      $nErr = "Enter a number greater than 10 and less than 100";
    }
  }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Sorting</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  N: <input type="text" name="n" value="<?php echo $n;?>">
  <span class="error">* <?php echo $nErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

  echo "<h2>Your Input : ", $n, "</h2>";
  if(10 <= $n & $n <= 100) {
    for($i=0;$i<$n;$i++) {
      $dada[$i]=rand();
    }

    echo "정수 랜덤넘버(",$n,"개) : ";
    for($i=0;$i<$n;$i++) {
      echo $dada[$i]," ";
    }
    sort($dada);
    echo "<br>정렬된 넘버　(",$n,"개) : ";
    for($i=0;$i<$n;$i++) {
      echo $dada[$i]," ";
    }
  }
?>

</body>
</html>