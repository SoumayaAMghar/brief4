<?php
    include_once 'includes/dbhandler.php';
?>

<?php
    $display_all_products = "SELECT * FROM shopnowdb;";
    $result = mysqli_query($conn, $display_all_products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body style="background-color: rgb(43, 43, 43);">
    
    <section class="navbar">
        <img class="logo" src="./icons/logo.svg" alt="">
        <div class="searching">
            <form action="">
                <input id="search-input" style="outline:none;"  placeholder="search by ref/name"></input>
                <label for="search-input">
                    <img id="magnifying-glass" src="icons/magnifying-glass-solid.svg" alt="">
                </label>
            </form>
            
            
            <img id="filter-icon" src="icons/filter-solid.svg" alt="">
        </div>
    </section>

<!-- -----------------FILTER--------------------------- -->

    <form class="form-filter">
        
        <div class="filter">

            <p class="filter-text">Filter by:</p>

            <div class="justify-filter">
                <label for="Category">Category</label>
                <select name="Category" id="Category" >
                    <option value="nothing">-----------</option>
                    <option value="rings">rings</option>
                    <option value="bracelets">bracelets</option>
                    <option value="necklaces">necklaces</option>
                </select>
            </div>
           
            <div class="justify-filter">
                <label for="Material">Material</label>
                <select name="Material" id="Material" >
                    <option value="nothing">------------</option>
                    <option value="silver">silver</option>
                    <option value="gold">gold</option>
                    <option value="platinum">platinum</option>
                    <option value="diamond">diamond</option>
                </select>
            </div>
           
            <div class="justify-filter">
                <label for="Size">Size</label>
                <select name="Size" id="Size" >
                    <option value="nothing">------------</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                </select>
            </div>

            <div class="justify-filter">
                <label for="Price">Price</label>
                <select name="Price" id="Price" >
                    <option value="nothing">------------</option>
                    <option value="range1">10$ and less</option>
                    <option value="range2">10$ to 100$</option>
                    <option value="range3">over 100$</option>
                </select>
            </div>

            <div class="justify-filter">
                <label for="Stock">Stock</label>
                <select name="Stock" id="Stock">
                    <option value="nothing">------------</option>
                    <option value="range1">10 pcs and less</option>
                    <option value="range2">10 pcs to 50 pcs</option>
                    <option value="range3">over 50 pcs</option>
                </select>
            </div>
            <button class="filter-button" type="submit">enter</button>
        </div>
    </form>

<!-- -----------------PRODUCTS--------------------------- -->

    <section style="display: flex; justify-content: center;margin-block: 110px;">
        <div class="products-container">

            <div class="products-infos">
                <p>Ref</p>
                <p>Name</p>
                <p class="removable">Category</p>
                <p class="removable">Material</p>
                <p class="removable">Size</p>
                <p class="removable">Price</p>
                <p class="removable">Stock</p>
                <p style="justify-self: center;">Edit</p>
                <p style="justify-self: center;">View</p>
                <img class="add" style="width: 19px; justify-self: end;" src="./icons/bouton-ajouter.png" alt="">
            </div>
            
            <?php while($product = mysqli_fetch_assoc($result)):?>
            <div class="products">
                <p>#<?= $product['Ref'] ?></p>
                <p class="p-name"><?= $product['Name'] ?></p>
                <p class="removable"><?= $product['Category'] ?></p>
                <p class="removable"><?= $product['Material'] ?></p>
                <p class="removable"><?= $product['Size'] ?></p>
                <p class="removable"><?= $product['Price'] ?>$</p>
                <p class="removable"><?= $product['Stock'] ?> pcs</p>
                <img class="edit" src="./icons/edit.svg" alt="">
                <img class="delete" src="./icons/delete.svg" alt="">
                <img class="view" src="./icons/view.svg"

            
                data-ref="<?= $product['Ref'] ?>"  
                data-name="<?= $product['Name'] ?>"
                data-category="<?= $product['Category'] ?>"
                data-material="<?= $product['Material'] ?>"
                data-size="<?= $product['Size'] ?>"
                data-price="<?= $product['Price'] ?>"
                data-stock="<?= $product['Stock'] ?>"
                
                alt="view item">
            </div>
            <?php endwhile;?>

        </div>
    </section>


<!-- -----------------DISPLAY PRODUCT--------------------------- -->

    <div style="display: flex; justify-content: center;">
    <section class="position-lightbox view-form" style="display: none;">
        
        

        <div class="display-product">

            <div class="close-button">
                <img style="height: 19px;width: 19px;" src="./icons/circle-xmark-regular.svg" alt="">
            </div>

                <div class="display-img">
                </div>

                <div class="display-infos">
                    
                    <div class="info-title catch-name"></div>
                    <div class="info-details">

                        <div class="info-detail">
                            <p class="fake-label">Ref</p>
                            <div class="info-container catch-ref">
                                
                            </div>
                        </div>
                        <div class="info-detail">
                            <p class="fake-label">Material</p>
                            <div class="info-container catch-material">
                                
                            </div>
                        </div>
                        <div class="info-detail">
                            <p class="fake-label">Category</p>
                            <div class="info-container catch-category">

                            </div>
                        </div>
                        <div class="info-detail">
                            <p class="fake-label">Price</p>
                            <div class="info-container catch-price">
                                
                            </div>
                        </div>
                        <div class="info-detail">
                            <p class="fake-label">Size</p>
                            <div class="info-container catch-size">
                                
                            </div>
                        </div>
                        <div class="info-detail">
                            <p class="fake-label">Stock</p>
                            <div class="info-container catch-stock">
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    </div>
    
<!-- -----------------ADD ITEM--------------------------- -->


    <form style="display: flex; justify-content: center;" action="add.product.php" method="post">
        <section class="position-lightbox add-form" style="display: none;">
        <div class="new-item">
            <div class="close-button">
                <img style="height: 19px;width: 19px;" src="./icons/circle-xmark-regular.svg" alt="">
            </div>
            <p class="menu-title">New Item</p>

            <input style="display:none;" name="file" type="file" id="file-add">
            <label for="file-add" class="product-img-empty">
                <img style="height : 77px" src="./icons/cloud-arrow-up-solid.svg" alt="">
            </label>
            
            <div class="row">
        
                <div class="namediv">
                    <div class="itemsinfo"><label for="name">Name :</label></div>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="secondrow">
                <div class="categorydiv">
                    <div class="itemsinfo"><label for="category">Category :</label></div>
                    <select  class="form-control" id="category" name="category">
                        <option value="nothing"></option>
                        <option value="rings">rings</option>
                        <option value="bracelets">bracelets</option>
                        <option value="necklaces">necklaces</option>
                    </select>
                </div>
                <div class="materialdiv">
                    <div class="itemsinfo"><label for="material">Material :</label></div>
                    <select class="form-control" id="material" name="material">
                        <option value="nothing"></option>
                        <option value="silver">silver</option>
                        <option value="gold">gold</option>
                        <option value="platinum">platinum</option>
                        <option value="diamond">diamond</option>
                    </select>
                </div>
            </div>

            <div class="thirdrow">
                <div class="sizediv">
                    <div class="itemsinfo"><label for="Size">Size :</label></div>
                    <select  class="form-control" id="size" name="size">
                        <option value="nothing"></option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="pricediv">
                    <div class="itemsinfo"><label for="price">Price :</label></div>
                    <input value=""  type="number" class="form-control" id="price" name="price">
                </div>
            </div>
            
            <div class="lastrow">
                <div class="stockdiv">
                    <div class="itemsinfo"><label for="stock">Stock :</label></div>
                        <input value="" type="number" class="form-control" id="stock" name="stock">
                </div>
            </div>

            <button type="submit" class="add-button">    
                Add
            </button>
              
        </div>
    </section>
</form>
    
<!-- -----------------EDIT ITEM--------------------------- -->


<form style="display: flex; justify-content: center;" action="edit.product.php">
    <section class="position-lightbox edit-form" style="display: none;">
        <div class="new-item">
            <div class="close-button">
                <img style="height: 19px;width: 19px;" src="./icons/circle-xmark-regular.svg" alt="">
            </div>
            <p class="menu-title">Edit Item</p>

            <input style="display:none;" type="file" id="file-add">
            <label for="file-add" class="product-img-empty">
                <img style="height : 77px" src="./icons/cloud-arrow-up-solid.svg" alt="">
            </label>


            <div class="row">
                <div class="refdiv">
                    <input type="hidden" class="form-control" id="Ref" name="ref"/>
                </div>
                <div class="namediv">
                    <div class="itemsinfo"><label for="name">Name :</label></div>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="secondrow">
                
                <div class="categorydiv">
                    <div class="itemsinfo"><label for="category">Category :</label></div>
                    <select  class="form-control" id="category" name="category">
                        <option value="nothing"></option>
                        <option value="rings">rings</option>
                        <option value="bracelets">bracelets</option>
                        <option value="necklaces">necklaces</option>
                    </select>
                </div>
                <div class="materialdiv">
                    <div class="itemsinfo"><label for="material">Material :</label></div>
                    <select class="form-control" id="material" name="material">
                        <option value="nothing"></option>
                        <option value="silver">silver</option>
                        <option value="gold">gold</option>
                        <option value="platinum">platinum</option>
                        <option value="diamond">diamond</option>
                    </select>
                </div>
            </div>

            <div class="thirdrow">
                <div class="sizediv">
                    <div class="itemsinfo"><label for="Size">Size :</label></div>
                    <select  class="form-control" id="size" name="size">
                        <option value="nothing"></option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="pricediv">
                    <div class="itemsinfo"><label for="price">Price :</label></div>
                    <input value=""  type="number" class="form-control" id="price" name="price">
                </div>
            </div>
            
            <div class="lastrow">
                <div class="stockdiv">
                    <div class="itemsinfo"><label for="stock">Stock :</label></div>
                        <input value="" type="number" class="form-control" id="stock" name="stock">
                </div>
            </div>

            <button type="submit" class="add-button">    
                Edit
            </button>
              
        </div>
    </section>
</form>
    

    <script src="lightbox-menus.js"></script>

</body>
</html>