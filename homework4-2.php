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
$sum = 0;
$prod = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if (empty($_POST["n"])) {
    $nErr = "n is required";
  } else {
    $n = test_input($_POST["n"]);
    // check if name only contains letters and whitespace
    if (is_int($n)) {
      $nErr = "Only numbers allowed";
    }
  }
  
}
?>

<h2>PHP Sum&factorial of your input number</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  N: <input type="text" name="n" value="<?php echo $n;?>">
  <span class="error">* <?php echo $nErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
  for($i=1;$i<=$n;$i++) {
    $sum += $i;
    $prod *= $i;
  }
  echo "1부터 ",$n,"까지의 합과 곱<br>";
  echo "합 : ", $sum,"<br>";
  echo "곱 : ", $prod;
?>

</body>
</html>











































