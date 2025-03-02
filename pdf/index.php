<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Generisanje Punomoći</title>
</head>

<body>
    <h2>Unesite podatke za punomoć</h2>
    <form action="punomoc.php" method="post">
        <label>Ime:</label><br>
        <input type="text" name="ime"><br><br>

        <label>Prezime:</label><br>
        <input type="text" name="prezime"><br><br>

        <label>Broj lične karte:</label><br>
        <input type="text" name="licna_karta"><br><br>

        <label>Telefon:</label><br>
        <input type="text" name="telefon"><br><br>

        <button type="submit">Generiši PDF</button>
    </form>
</body>

</html>