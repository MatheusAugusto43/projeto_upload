<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de imagens</title>
</head>

<body>
    <h1>Galeria de Imagens</h1>
    <a href="upload.php">Enviar nova imagem</a>
    <hr>
    <h2>Imagens enviadas:</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
        <?php
        $pasta = "upload/";
        if (is_dir($pasta)) {

            $arquivos = scandir($pasta);
            $encontrouImagem = false;

            foreach ($arquivos as $arquivo) {

                if ($arquivo != "." && $arquivo != "..") {

                    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

                    if (in_array($extensao, ["jpg", "jpeg", "png", "gif", "webp"])) {

                        $encontrouImagem = true;

                        echo "
                        <div>
                            <img src='$pasta$arquivo' width='150'
                            style='border: 1px solid #ccc;'>
                        </div>
                        ";
                    }
                }
            }
            if (!$encontrouImagem) {
                echo "<p>Nenhuma imagem encontrada.</p>";
            }
        } else {
            echo "<p>A pasta de imagens não existe.</p>";
        }
        ?>
    </div>
</body>

</html>