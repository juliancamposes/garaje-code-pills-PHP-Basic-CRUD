<?php
    require_once('read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/77a740d809.js" crossorigin="anonymous"></script>
    <title>PHP CRUD - Garage Code Pills</title>
</head>
<body>
    <header>
        <img src="./img/garaje-logo.jpg">
    </header>
    <main>
        <h2>Todos los registros de la tabla listado_videos</h2>
        <table cellspacing="10px">
            <tr>
                <td><strong>Id de vídeo</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Autor</strong></td>
                <td><strong>Fecha</strong></td>
                <td><strong>Acciones</strong></td>
            </tr>

            <?php

                foreach($allData as $video){
                    echo '<tr>';
                    echo '<td class="result">'; 
                        echo $video['id'];
                    echo '</td>';
                    echo '<td class="result">'; 
                        echo $video['title'];
                    echo '</td>';
                    echo '<td class="result">'; 
                        echo $video['author'];
                    echo '</td>';
                    echo '<td class="result">';  
                        echo $video['date'];
                    echo '</td>';
                    echo '<td>'; 
                        echo '<a href="update.php?id='.$video['id'].'">';
                        echo '<i class="fa-solid fa-pen-to-square"></i>';
                        echo '</a>';
                        echo '<a href="delete.php?id='.$video['id'].'">';
                        echo '<i class="fa-sharp fa-solid fa-trash"></i>';
                        echo '</a>';
                    echo '</td>';
                echo '</tr>';
                }

            ?>


        </table>

        <h2>Registro individual (recuperado por ID)</h2>

        <table cellspacing="10px">
            <tr>
            <td><strong>Id de vídeo</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Autor</strong></td>
                <td><strong>Fecha</strong></td>
                <td><strong>Acciones</strong></td>
            </tr>
            <tr>
                <td class="result"> 
                    <?php echo $singleDataById['id'];?>
                </td>
                <td class="result"> 
                    <?php echo $singleDataById['title'];?>
                </td>
                <td class="result"> 
                    <?php echo $singleDataById['author'];?>
                </td>
                <td class="result"> 
                    <?php echo $singleDataById['date'];?>
                </td>
                <td> 
                    <a href="update.php?id=<?php echo $singleDataById['id'];?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="delete.php?id=<?php echo $singleDataById['id'];?>">
                    <i class="fa-sharp fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        </table>

        <h2>Añadir nuevo registro</h2>

        <form id="create_form" action="create.php" method="POST">
            <label for="title">Nombre del vídeo</label>
            <input type="text" id="title" name="title" required/>
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" required/>
            <label for="date">Fecha de publicación</label>
            <input type="date" id="date" name="date" class="center" required/>
            <button type="submit" form="create_form" value="Submit">Enviar</button>
        </form>
    </main>
    
</body>
</html>