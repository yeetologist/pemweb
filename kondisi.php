<?php
$t = 29;

if ($t > "79") {
  echo "Nilai Angka : ", $t, "<br>";
  echo "Nilai Huruf : A";
} elseif ($t > "69") {
  echo "Nilai Angka : ", $t, "<br>";
  echo "Nilai Huruf : B";
} elseif ($t > "59") {
  echo "Nilai Angka : ", $t, "<br>";
  echo "Nilai Huruf : C";
} elseif ($t > "49") {
  echo "Nilai Angka : ", $t, "<br>";
  echo "Nilai Huruf : D";
} else {
  echo "Nilai Angka : ", $t, "<br>";
  echo "Nilai Huruf : E";
}
echo "<br>";
switch ($t) {
  case ($t > "79"):
    echo "Anda Lulus Passing Grade";
    break;

  case ($t > "69"):
    echo "Anda Lulus Passing Grade";
    break;

  case ($t > "59"):
    echo "Anda Lulus Passing Grade";
    break;

  case ($t > "49"):
    echo "Anda Lulus Passing Grade";
    break;

  default:
    echo "Anda Tidak Lulus Passing Grade";
    break;
}
echo "<br>";
echo "<br>";
$x = 1;
while ($x <= 10) {
  echo "The number is: $x <br>";
  $x += 2;
}
echo "<br>";
for ($x = 10; $x >= 1; $x -= 2) {
  echo "The number is: $x <br>";
}
