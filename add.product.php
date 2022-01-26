<?php
    include_once 'includes/dbhandler.php';
?>

<?php
 
 if($_SERVER['REQUEST_METHOD']=='POST'){

     $name = $_POST['name'];
     $category = $_POST['category'];
     $material = $_POST['material'];
     $size = $_POST['size'];
     $price = $_POST['price'];
     $stock = $_POST['stock'];
     $file = $_FILES["file"]["name"];

     move_uploaded_file($_FILES["file"]["tmp_name"], 'products.images/'.$file);


    $add_product = "INSERT INTO shopnowdb (Name, Category, Material, Size, Price,Stock,img) VALUES ('$name','$category','$material','$size','$price','$stock','$file');";
    mysqli_query($conn, $add_product);

    header('Location:index.php');

 }

?>
