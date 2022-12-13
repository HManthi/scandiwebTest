<?php include "view/header.php"?>
<link rel="stylesheet" href="style/style.css">
<script src="/javaScript/script.js"></script>
<br>
<br>
<br>
<br>
<form id="all_product_form" method="POST">
        <?php
        foreach ($products as $product) {                    
                            $id = $product->id;
                            $name = $product->name;
                            $sku = $product->sku;
                            $price = $product->price;
                            $size = $product->size;
                            $height = $product->height;
                            $width = $product->width;
                            $length = $product->length;
                            $weight = $product->weight;
                            $type = $product->type;
    
                            $typeNameVal = $type($size,$weight,$height,$width,$length);
                        ?>
                                <div class="gallery" style="align:center">                                    
                                &nbsp;<input type="checkbox" name="checkId[]" value="<?php echo $id;?>">                                    
                                    <p style="text-align:center"><?php echo $sku;?><br>
                                    <?php echo $name;?><br>
                                    <?php echo $price;?><br>
                                    <?php echo $typeNameVal;?><p>
                                    </div>
                    <?php
                            }
                            
                    ?>

</form>

<?php
 function dvd($size,$weight,$height,$width,$length){
    $typeVal ="";
    $typeVal = "Size: ".(string)$size."MB";
    return $typeVal;
}

function book($size,$weight,$height,$width,$length){
    $typeVal ="";
    $typeVal = "Weight: ".(string)$weight."KG";
    return $typeVal;
}

function furniture($size,$weight,$height,$width,$length){
    $typeVal ="";
    $typeVal = "Dimension: ".(string)$height."x".(string)$width."x".(string)$length;
    return $typeVal;
}
?>
<br>
<br>
<br>
<?php include "view/footer.php"?>
