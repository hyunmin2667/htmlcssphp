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
// T : Triangle, R : Rectangle, C : Circle
// RP : Rectangular parallelepiped, Cy : Cylinders, S : Sphere
// w : width, h : height, l : length

$TwErr = $ThErr = $RwErr = $RhErr = $C_radiusErr = $RPwErr = $RPlErr = $RPhErr = $Cy_radiusErr = $CyhErr = $S_radiusErr = "";
$Tw = $Th = $Rw = $Rh = $C_radius = $RPw = $RPl = $RPh = $Cy_radius = $Cyh = $S_radius = "";
$pi = pi();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //삼각형
  if (empty($_POST["Tw"])) {
    $TwErr = "width is required";          
  } else {
    $Tw = test_input($_POST["Tw"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Tw)) {
      $TwErr = "Only numbers allowed";
    }
    elseif (0 >= $Tw) {
      $TwErr = "Enter a number greater than 0";
    }
  }
  if (empty($_POST["Th"])) {
    $ThErr = "height is required";          
  } else {
    $Th = test_input($_POST["Th"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Th)) {
      $ThErr = "Only numbers allowed";
    }
    elseif (0 >= $Th) {
      $ThErr = "Enter a number greater than 0";
    }
  }


  //직사각형
  if (empty($_POST["Rw"])) {
    $RwErr = "width is required";          
  } else {
    $Rw = test_input($_POST["Rw"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Rw)) {
      $RwErr = "Only numbers allowed";
    }
    elseif (0 >= $Rw) {
      $RwErr = "Enter a number greater than 0";
    }
  }
  if (empty($_POST["Rh"])) {
    $RhErr = "height is required";          
  } else {
    $Rh = test_input($_POST["Rh"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Rh)) {
      $RhErr = "Only numbers allowed";
    }
    elseif (0 >= $Rh) {
      $RhErr = "Enter a number greater than 0";
    }
  }

  //원
  if (empty($_POST["C_radius"])) {
    $C_radiusErr = "radius is required";          
  } else {
    $C_radius = test_input($_POST["C_radius"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($C_radius)) {
      $C_radiusErr = "Only numbers allowed";
    }
    elseif (0 >= $C_radius) {
      $C_radiusErr = "Enter a number greater than 0";
    }
  }

  //직육면체
  if (empty($_POST["RPw"])) {
    $RPwErr = "width is required";          
  } else {
    $RPw = test_input($_POST["RPw"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($RPw)) {
      $RPwErr = "Only numbers allowed";
    }
    elseif (0 >= $RPw) {
      $RPwErr = "Enter a number greater than 0";
    }
  }
  if (empty($_POST["RPl"])) {
    $RPlErr = "length is required";          
  } else {
    $RPl = test_input($_POST["RPl"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($RPl)) {
      $RPlErr = "Only numbers allowed";
    }
    elseif (0 >= $RPl) {
      $RPlErr = "Enter a number greater than 0";
    }
  }
  if (empty($_POST["RPh"])) {
    $RPhErr = "height is required";          
  } else {
    $RPh = test_input($_POST["RPh"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($RPh)) {
      $RPhErr = "Only numbers allowed";
    }
    elseif (0 >= $RPh) {
      $RPhErr = "Enter a number greater than 0";
    }
  }

  //원기둥
  if (empty($_POST["Cy_radius"])) {
    $Cy_radiusErr = "radius is required";          
  } else {
    $Cy_radius = test_input($_POST["Cy_radius"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Cy_radius)) {
      $Cy_radiusErr = "Only numbers allowed";
    }
    elseif (0 >= $Cy_radius) {
      $Cy_radiusErr = "Enter a number greater than 0";
    }
  }
  if (empty($_POST["Cyh"])) {
    $CyhErr = "height is required";          
  } else {
    $Cyh = test_input($_POST["Cyh"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($Cyh)) {
      $CyhErr = "Only numbers allowed";
    }
    elseif (0 >= $Cyh) {
      $CyhErr = "Enter a number greater than 0";
    }
  }

  //구
  if (empty($_POST["S_radius"])) {
    $S_radiusErr = "radius is required";          
  } else {
    $S_radius = test_input($_POST["S_radius"]);
    // check if Tw only contains letters and whitespace
    if (!is_numeric($S_radius)) {
      $S_radiusErr = "Only numbers allowed";
    }
    elseif (0 >= $S_radius) {
      $S_radiusErr = "Enter a number greater than 0";
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

<h2>PHP Figure Calculation Formula Using Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h3>삼각형의 넓이(width*height/2)</h3>
  width : <input type="text" name="Tw" value="<?php echo $Tw;?>">
  <span class="error">* <?php echo $TwErr;?></span><br>
  height : <input type="text" name="Th" value="<?php echo $Th;?>">
  <span class="error">* <?php echo $ThErr;?></span><br>
  
  <h3>직사각형의 넓이(width*height)</h3>
  width : <input type="text" name="Rw" value="<?php echo $Rw;?>">
  <span class="error">* <?php echo $RwErr;?></span><br>
  height : <input type="text" name="Rh" value="<?php echo $Rh;?>">
  <span class="error">* <?php echo $RhErr;?></span><br>
  
  <h3>원의 넓이(pi*radius^2)</h3>
  radius : <input type="text" name="C_radius" value="<?php echo $C_radius;?>">
  <span class="error">* <?php echo $C_radiusErr;?></span><br>
  
  <h3>직육면체의 부피(width*length*height)</h3>
  width : <input type="text" name="RPw" value="<?php echo $RPw;?>">
  <span class="error">* <?php echo $RPwErr;?></span><br>
  length : <input type="text" name="RPl" value="<?php echo $RPl;?>">
  <span class="error">* <?php echo $RPlErr;?></span><br>
  height : <input type="text" name="RPh" value="<?php echo $RPh;?>">
  <span class="error">* <?php echo $RPhErr;?></span><br>

  <h3>원기둥의 부피(pi*radius^2*height)</h3>
  radius : <input type="text" name="Cy_radius" value="<?php echo $Cy_radius;?>">
  <span class="error">* <?php echo $Cy_radiusErr;?></span><br>
  height : <input type="text" name="Cyh" value="<?php echo $Cyh;?>">
  <span class="error">* <?php echo $CyhErr;?></span><br>
  
  <h3>구의 부피(4/3*pi*radius^3)</h3>
  radius : <input type="text" name="S_radius" value="<?php echo $S_radius;?>">
  <span class="error">* <?php echo $S_radiusErr;?></span><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Calculation:</h2>";

//삼각형
if(is_numeric($Tw) & 0<=$Tw & is_numeric($Th) & 0<=$Th) {
  $T_result = $Tw*$Th/2;
  echo "삼각형의 넓이 : {$Tw} X {$Th} X 1/2= <b>{$T_result}</b><br>";
  echo "<br>";
}

//직사각형
if(is_numeric($Rw) & 0<=$Rw & is_numeric($Rh) & 0<=$Rh) {
  $R_result = $Rw*$Rh;
  echo "직사각형의 넓이 : {$Rw} X {$Rh} = <b>{$R_result}</b><br>";
  echo "<br>";
}

//원의 넓이
if(is_numeric($C_radius) & 0<=$C_radius) {
  $C_result = $pi*$C_radius**2;
  echo "원의 넓이 : {$pi} X {$C_radius}^2 = <b>{$C_result}</b><br>";
  echo "<br>";
}

//직육면체의 부피
if(is_numeric($RPw) & 0<=$RPw & is_numeric($RPl) & 0<=$RPl & is_numeric($RPh) & 0<=$RPh) {
  $RP_result = $RPw*$RPl*$RPh;
  echo "직육면체의 부피 : {$RPw} X {$RPl} X {$RPh} = <b>{$RP_result}</b><br>";
  echo "<br>";
}

//원기둥의 부피
if(is_numeric($Cy_radius) & 0<=$Cy_radius & is_numeric($Cyh) & 0<=$Cyh) {
  $Cy_result = $pi*$Cy_radius**2*$Cyh;
  echo "원기둥의 부피 : {$pi} X {$Cy_radius}^2*{$Cyh} = <b>{$Cy_result}</b><br>";
  echo "<br>";
}

//구의 부피
if(is_numeric($C_radius) & 0<=$C_radius) {
  $S_result = 4/3*$pi*$S_radius**3;
  echo "구의 부피 : 4/3 X {$pi} X {$S_radius}^3 = <b>{$S_result}</b><br>";
  echo "<br>";
}
?>
</body>