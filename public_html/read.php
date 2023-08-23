<?php
    require('config.php');

    $allData = '';
    $singleDataById = '';

    $stmt = $connectDB->prepare('SELECT * FROM listado_videos');
    $stmt->execute();

    $allData = $stmt->fetchAll();

    $id_video = 3;
    $stmt = $connectDB->prepare('SELECT * FROM listado_videos WHERE id=:id');
    $stmt->bindParam(':id',$id_video);

    $stmt->execute();
    $singleDataById = $stmt->fetch();


    ?>