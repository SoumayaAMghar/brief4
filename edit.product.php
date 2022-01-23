<?php
include("connectdb.php");

if (isset($_POST['name']) && isset($_POST['category']) &&isset($_POST['material']) && isset($_POST['size'])
&& isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['ref']))
{
    if(!empty($_POST['name']) && !empty($_POST['category']) &&!empty($_POST['material']) && !empty($_POST['size'])
    && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['ref']))
    {
        $name =  htmlspecialchars($_POST['name']);
        $category = htmlspecialchars($_POST['category']);
        $material = htmlspecialchars($_POST['material']);
        $size = htmlspecialchars($_POST['size']);
        $price = htmlspecialchars($_POST['price']);
        $stock = htmlspecialchars($_POST['stock']);
        $ref=htmlspecialchars($_POST['ref']);

        if(filter_var($ref,FILTER_VALIDATE_INT))
        {
            $edit = $con->prepare('UPDATE product SET name = :name,  category = :category, material = :material, size = :size,  price = :price, stok = :stock
            WHERE ref= :ref');

            $edit->execute(array("name"=> $name, "category" => $category, "material" => $material,
             "size" => $size,  "price" => $price, "stok" => $stock));

            echo'produt edited successfuly!';
        }else{
            echo 'ref does not exist';
        }
    }else{
        echo'required fields ';
    }              
}     
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="style.css">
    <link href="fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <!--load all styles -->

</head>

<body>

        <main class="main">
            <div class="main-cards">
                <div class="card">
                    <!-- add product form -->

    <form method="POST" action="edit.php" >
        <div class="new-item">
            <p class="menu-title">Update Item</p>


            <div class="product-img-empty">
            <input type="image" name="image" src="./icons/cloud-arrow-up-solid.svg" alt="Submit" height="77">
            </div>


            <div class="row">
                <label class="refdiv" for="ref" class="itemsinfo">
                Ref :
                <input type="text" id="Ref" name="ref" placeholder="Enter product ref" required VAlue="<?php echo $row ['ref'] ?>">
                </label>
                
                <br><br>
            
                <label class="namediv" for="name" class="itemsinfo">
                    Name :
                    <input type="text" name="name" id="name" placeholder="Enter product name" required value="<?php echo $row ['name'] ?>">
                </label>
                <br><br> 
            </div>

            <div class="secondrow">
                <label class="categorydiv" for="category" class="itemsinfo">
                Category :
                <input type="text" id="category" name="category" placeholder="Enter product Category" required value="<?php echo $row ['category'] ?>">
                </label>
                <?php //echo $category; ?>
                <br><br>
                <label class="materialdiv" for="material" class="itemsinfo">
                Material :
                <input type="text" name="material" id="material" placeholder="Enter product material" required value="<?php echo $row ['material'] ?>">
                </label>
                <br><br>
            </div>

            <div class="thirdrow">
                <label class="sizediv" for="size" class="itemsinfo">
                Size :
                <input type="text" id="size" name="size"  placeholder="Enter product size" required value="<?php echo $row ['size'] ?>">
                </label>
                <br><br>
                <label class="pricediv" for="price" class="itemsinfo">
                Price :
                <input type="text" name="price" id="price"  placeholder="Enter product price" required value="<?php echo $row ['price'] ?>">
                </label>
                <br><br>
            </div>


            <div class="lastrow">
                <label class="stockdiv" for="stock" class="itemsinfo">
                Stock :
                <input type="text" id="stock" name="stock"  placeholder="Enter product stock" required value="<?php echo $row ['stock'] ?>">
                </label>
                <br><br>
                <input type="submit" value="Add">
            </div>

        </div>
        </div>
                <input type="hidden" name="ref" value="<?php echo $row ['ref']; ?>">
                <div class="button">
                    <input class="submit" type="submit" name="submit" value="Update product"> 
                    <input type="file" name="product_image" id="upload" value="<?php echo $row ['Image'] ?>" hidden/>
                    <label class="upload" for="upload">Choose file</label>
                </div>

	</form>

     <?php
    $reponse->closeCursor();
     ?>


                    <!-- end of add product form -->
                </div>
            </div>
        </main>
<!-- 
    <script src="main.js"></script>
    <script src="REGEX.JS"></script> -->
</body>

</html>