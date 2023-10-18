<?php

// Verbindung zur DB herstellen
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

// Verbindung überprüfen
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post_date = date("Y-m-d H:i:s");
    $image = $_FILES['image'];

    $errors = [];
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    //Check ob die Datei ein Bild ist
    if($image['error'] == 0){
        $file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        if(!in_array($file_ext, $extensions)){
            $errors[] = 'Invalid file type. Please upload an image.';
        }
    }
    //Nur Upload wenn keine Fehler
    if(count($errors) == 0){
        $image_url = $_SERVER['DOCUMENT_ROOT'] . '/inc/uploads/' . time() . '.' . $file_ext;
        move_uploaded_file($image['tmp_name'], $image_url);
        $image_url = "inc/uploads/" . time() . '.' . $file_ext;
        //Post in die DB einfügen
        $query = "INSERT INTO blog_posts (title, content, post_date, image_url) VALUES ('$title', '$content', '$post_date', '$image_url')";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location:http://localhost/index.php?site=news");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo implode("<br>", $errors);
    }
}
mysqli_close($conn);
?>