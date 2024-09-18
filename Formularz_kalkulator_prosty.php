<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Podaj pierwsza liczbe: <input type="number" name="liczba1"><br>
    Wybierz dzialanie: 
    <select name="dzialanie" required>
        <option value="dodawanie">+</option>
        <option value="odejmowanie">-</option>
        <option value="mnozenie">*</option>
        <option value="dzielenie">/</option>
        <option value="modulo">%</option>
    </select><br>
  Podaj druga liczbe: <input type="number" name="liczba2"><br>
  <input type="submit" name="przeslij" value="Wykonaj Dzialanie"> <br>
</form>

<?php
$wynik = NULL;
if (isset($_POST['przeslij']) && isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['dzialanie'])) {
  $liczba1 = $_POST['liczba1'];
  $liczba2 = $_POST['liczba2'];
  $dzialanie = $_POST['dzialanie'];
  
  if ($dzialanie == 'dodawanie') {
    $wynik = $liczba1+$liczba2;
  } elseif ($dzialanie == 'odejmowanie') {
    $wynik = $liczba1-$liczba2;
  } elseif ($dzialanie == 'mnozenie') {
    $wynik = $liczba1*$liczba2;
  } elseif ($dzialanie == 'dzielenie') {
    $wynik = $liczba1/$liczba2;
  } elseif ($dzialanie == 'modulo') {
    $wynik = $liczba1%$liczba2;
  }
  echo "<h2>Twoj wynik dzialania to:</h2>";
  echo $wynik;
}
?>

</body>
</html>