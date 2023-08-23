<?php
    require_once('config.php');

    if(isset($_GET['id'])){
        $id_video = secure_data($_GET['id']);

        $stmt = $connectDB->prepare('SELECT * FROM listado_videos WHERE id=:id');
        $stmt->bindParam(':id',$id_video);
    
        $stmt->execute();
        $singleDataById = $stmt->fetch();

        if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['date'])){
            $new_title = secure_data($_POST['title']);
            $new_author = secure_data($_POST['author']);
            $new_date = secure_data($_POST['date']);

            $stmt = $connectDB->prepare('UPDATE listado_videos SET title=:title, author=:author, date=:date WHERE id=:id');
            $stmt->bindParam(':title',$new_title);
            $stmt->bindParam(':author',$new_author);
            $stmt->bindParam(':date',$new_date);
            $stmt->bindParam(':id',$id_video);

            $stmt->execute();

            header('Location: index.php');
        }
    
    } else {
        header('Location: index.php');
    }


    function secure_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
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

        <h2>Editar registro individual
        </h2>

        <form id="update_form" method="POST">
            <label for="title">Nombre del vídeo</label>
            <input type="text" id="title" name="title" required value="<?php echo $singleDataById['title'];?>" />
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" required value="<?php echo $singleDataById['author'];?>"/>
            <label for="date">Fecha de publicación</label>
            <input type="date" id="date" name="date" class="center" required value="<?php echo $singleDataById['date'];?>"/>
            <button type="submit" form="update_form" value="Submit">Enviar</button>
            <button><a href="index.php">Cancelar</a></button>
        </form>
    </main>
    
</body>
</html>