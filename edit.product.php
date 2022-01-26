<?php
    include_once 'includes/dbhandler.php';
?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST') {
    
    $ref = $_POST['ref'];
    $name = $_POST['name'];
     $category = $_POST['category'];
     $material = $_POST['material'];
     $size = $_POST['size'];
     $price = $_POST['price'];
     $stock = $_POST['stock'];
     $file = $_FILES["file"]["name"];

     move_uploaded_file($_FILES["file"]["tmp_name"], 'products.images/'.$file);

    $rowEdit = "UPDATE shopnowdb SET Name ='$name' , Category='$category' , Material= '$material' , Size='$size' , Price='$price' , Stock='$stock' , img='$file' WHERE Ref = '$ref' ;";
    mysqli_query($conn, $rowEdit);

    // $conn->query("UPDATE shopnowdb SET Name ='$name' , Category='$category' , Material= '$material' , Size='$size' , Price='$price' , Stock='$stock' , img='$file' WHERE Ref = '$ref' ;");
    header('Location:index.php');
}

?>
