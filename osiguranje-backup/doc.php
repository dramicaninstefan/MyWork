<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Fajlova</title>
</head>

<body>
    <h1>Upload Fajlova</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="file1">Izaberite fajl 1:</label>
            <input type="file" name="data_files[]" id="file1">
        </div>
        <div>
            <label for="file2">Izaberite fajl 2:</label>
            <input type="file" name="data_files[]" id="file2">
        </div>
        <div>
            <label for="file3">Izaberite fajl 3:</label>
            <input type="file" name="data_files[]" id="file3">
        </div>
        <button type="submit">Upload</button>
    </form>
</body>

</html>