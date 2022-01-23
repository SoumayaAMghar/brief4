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
     $file = $_POST['file'];


     $add_product = "INSERT INTO shopnowdb (Name, Category, Material, Size, Price,Stock) VALUES ('$name','$category','$material','$size','$price','$stock');";

    mysqli_query($conn, $add_product);

    header('Location:index.php');

 }

?>