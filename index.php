<?php
include 'qrcode.php';

if (isset($_POST['qr'])) {
    $text = $_POST['qr'];
    $name = md5(time()) . ".png";

    $file = "files/{$name}";
    $options = array(
        'w' => 500,
        'h' => 500
    );
    $generator = new QRCode($text, $options);
    $image = $generator->render_image();
    imagepng($image, $file);
    imagedestroy($image);

    echo "<p>";
    echo "Imagem gerada com sucesso!<br>";
    echo "<a href='{$file}' target='_blank'>Clique aqui para visualizar</a>";
    echo "</p>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="qr" placeholder="Enter text">
        <button type="submit">Generate!</button>
    </form>
</body>

</html>