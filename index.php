<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Directorios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Listado de Directorios</h1>
        <div class="directory-table">
            <?php
            $dir = __DIR__; // Cambia esta línea si deseas listar otro directorio
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $count = 0;
                    while (($file = readdir($dh)) !== false) {
                        if (is_dir($file) && $file != '.' && $file != '..') {
                            if ($count % 3 == 0) {
                                if ($count > 0) {
                                    echo '</div>';
                                }
                                echo '<div class="row">';
                            }
                            echo '<div class="column"><a href="' . htmlspecialchars($file) . '">' . htmlspecialchars($file) . '</a></div>';
                            $count++;
                        }
                    }
                    if ($count % 3 != 0) {
                        echo '</div>';
                    }
                    closedir($dh);
                }
            } else {
                echo "El directorio especificado no es válido.";
            }
            ?>
        </div>
    </div>
</body>
</html>
