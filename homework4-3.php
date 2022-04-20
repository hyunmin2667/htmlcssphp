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
    elseif ($n > 100) {
      $nErr = "Enter a number not more than 100.";
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

<h2>PHP Fibonacci</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  N: <input type="text" name="n" value="<?php echo $n;?>">
  <span class="error">* <?php echo $nErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
  echo "<h2>Your Input : ", $n, "</h2>";
  if($n > 0 & $n <= 100) {
    $fib = array(0, 1);
    for($i=2;$i<$n;$i++) {
      $fib[$i] = $fib[$i-2] + $fib[$i-1];
    }
    echo "Fibonacci : ";
    for($i=0;$i<$n;$i++) {
      echo "{$fib[$i]} ";
    }
    echo "<br><br>";
    echo "fib(i+1), fib(i) -> 비례(fib(i+1)/fib(i))<br>";
    for($i=1;$i<$n-1;$i++) {
      $proportion = $fib[$i+1]/$fib[$i];
      echo "{$fib[$i+1]}, {$fib[$i]} -> {$proportion} <br>";
    }
  }
?>

</body>
</html>