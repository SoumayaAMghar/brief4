<?php
    include_once 'includes/dbhandler.php';
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
        <form action="" method="get">
        <input type="hidden" name="allProducts" value="">
        <button class="logo-button" type="submit">
        <img class="logo" src="./icons/logo.svg" alt="">
        </button>

        </form>
        
        <div class="searching">
            <form action="" method="get">
                <input id="search-input" style="outline:none;" name="search" value=""  placeholder="search by name"></input>
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
            
            <?php
            if(isset($_GET['search'])){

                $search_char = $_GET['search'];
                $query = "SELECT * FROM shopnowdb WHERE Name LIKE '%$search_char%';";
                $result = mysqli_query($conn,$query);

            }
            elseif(isset($_GET['allProducts'])){
                
                $display_all_products = "SELECT * FROM shopnowdb;";
                $result = mysqli_query($conn, $display_all_products); 
            }
            else{

                $display_all_products = "SELECT * FROM shopnowdb;";
                $result = mysqli_query($conn, $display_all_products);

            }

            while($product = mysqli_fetch_assoc($result)):?>
            <div class="products">
                <p>#<?= $product['Ref'] ?></p>
                <p class="p-name"><?= $product['Name'] ?></p>
                <p class="removable"><?= $product['Category'] ?></p>
                <p class="removable"><?= $product['Material'] ?></p>
                <p class="removable"><?= $product['Size'] ?></p>
                <p class="removable"><?= $product['Price'] ?>$</p>
                <p class="removable"><?= $product['Stock'] ?> pcs</p>
                <img class="edit" src="./icons/edit.svg" 
                
                data-ref="<?= $product['Ref'] ?>" 
                data-name="<?= $product['Name'] ?>"
                data-category="<?= $product['Category'] ?>"
                data-material="<?= $product['Material'] ?>"
                data-size="<?= $product['Size'] ?>"
                data-price="<?= $product['Price'] ?>"
                data-stock="<?= $product['Stock'] ?>"
                data-img="<?= $product['img'] ?>"
                
                alt="">

                <form  style="display: flex; justify-content: center;" action="delete.product.php" method="post">

                <input class="hidden-ref" type="hidden" name="ref" value="<?= $product['Ref'] ?>">

                    <button class="submit-delete" type="submit" >
                        <img class="delete" src="./icons/delete.svg" alt="">
                    </button>

                </form>
               
                <img class="view" src="./icons/view.svg"

            
                data-ref="<?= $product['Ref'] ?>"  
                data-name="<?= $product['Name'] ?>"
                data-category="<?= $product['Category'] ?>"
                data-material="<?= $product['Material'] ?>"
                data-size="<?= $product['Size'] ?>"
                data-price="<?= $product['Price'] ?>"
                data-stock="<?= $product['Stock'] ?>"
                data-img="<?= $product['img'] ?>"


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
                    <img style="width: 100%;height:100%;object-fit:contain" src="./img/B.png" alt="">
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


    <form style="display: flex; justify-content: center;" action="add.product.php" method="post"  enctype="multipart/form-data">
        <section class="position-lightbox add-form" style="display: none;">
        <div class="new-item">
            <div class="close-button">
                <img style="height: 19px;width: 19px;" src="./icons/circle-xmark-regular.svg" alt="">
            </div>
            <p class="menu-title">New Item</p>

            <input style="display:none;" name="file" type="file" id="file-add">
            <label for="file-add" class="product-img-empty clickable">
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

            <button type="submit" class="add-button clickable">    
                Add
            </button>
              
        </div>
    </section>
</form>
    
<!-- -----------------EDIT ITEM--------------------------- -->


<form style="display: flex; justify-content: center;" action="edit.product.php" method="post"  enctype="multipart/form-data">
    <section class="position-lightbox edit-form" style="display: none;">
        <div class="new-item">
            <div class="close-button">
                <img style="height: 19px;width: 19px;" src="./icons/circle-xmark-regular.svg" alt="">
            </div>
            <p class="menu-title">Edit Item</p>

            <input style="display:none;" name="file" type="file" id="file-edit">
            <label for="file-edit" class="product-img-empty clickable">
                <img style="height : 77px" src="./icons/cloud-arrow-up-solid.svg" alt="">
            </label>


            <div class="row">
                <div class="refdiv">
                    <input type="hidden" class="form-control ref-hidden" id="Ref" name="ref" value="" />
                </div>
                <div class="namediv">
                    <div class="itemsinfo"><label for="name">Name :</label></div>
                    <input type="text" class="form-control name-hidden" id="name" name="name" value=""/>
                </div>
            </div>

            <div class="secondrow">
                
                <div class="categorydiv">
                    <div class="itemsinfo"><label for="category">Category :</label></div>
                    <select  class="form-control category-hidden" id="category" name="category" value="">
                        <option value="nothing"></option>
                        <option value="rings">rings</option>
                        <option value="bracelets">bracelets</option>
                        <option value="necklaces">necklaces</option>
                    </select>
                </div>
                <div class="materialdiv">
                    <div class="itemsinfo"><label for="material">Material :</label></div>
                    <select class="form-control material-hidden" id="material" name="material" value="">
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
                    <select  class="form-control size-hidden" id="size" name="size" value="">
                        <option value="nothing"></option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="pricediv">
                    <div class="itemsinfo"><label for="price">Price :</label></div>
                    <input value=""  type="number" class="form-control price-hidden" id="price" name="price" value="">
                </div>
            </div>
            
            <div class="lastrow">
                <div class="stockdiv">
                    <div class="itemsinfo"><label for="stock">Stock :</label></div>
                        <input value="" type="number" class="form-control stock-hidden" id="stock" name="stock" value="">
                </div>
            </div>

            <button type="submit" class="add-button clickable">    
                Edit
            </button>
              
        </div>
    </section>
</form>
    

    <script src="lightbox-menus.js"></script>

</body>
</html>