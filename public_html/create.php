<?php
    require_once('config.php');

    if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['date'])){

        $title = secure_data($_POST['title']);
        $author = secure_data($_POST['author']);
        $date = secure_data($_POST['date']);

        $stmt = $connectDB->prepare('INSERT INTO listado_videos (title, author, date) VALUES(:title,:author,:date)');
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':author',$author);
        $stmt->bindParam(':date',$date);

        $stmt->execute();

        header('Location: index.php');
    }

    function secure_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

?>