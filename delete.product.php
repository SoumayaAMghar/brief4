<?php
    include_once 'includes/dbhandler.php';
?>

<?php

if($_SERVER['REQUEST_METHOD']=='POST') {
    
    $ref = $_POST['ref'];
    $rowDelete = "DELETE FROM shopnowdb WHERE Ref='$ref';";
    mysqli_query($conn, $rowDelete);

    header('Location:index.php');
}

?>