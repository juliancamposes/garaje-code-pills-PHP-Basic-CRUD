<?php

    require_once('config.php');

    if(isset($_GET['id'])){
        $id_video = secure_data($_GET['id']);

        $stmt = $connectDB->prepare('DELETE FROM listado_videos WHERE id=:id');
        $stmt->bindValue(':id', $id_video);
        $stmt->execute();

        header('Location: index.php');
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