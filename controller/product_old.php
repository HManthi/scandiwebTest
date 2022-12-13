<?php

class product{

    function all(){
        $products=product_model::all();
        require_once("view/product/index.php");
    }

    function addItem(){
        require_once("view/product/addItem.php");
    }

    function typeSwitch(){
        $type = $_POST["productType"];
        $this->$type();
    }

    function add(){
        
        $name = $_POST["name"];
        $sku = $_POST["sku"];
        $price= $_POST["price"];
        $type = $_POST["productType"];
        $size = $_POST["size"];
        $height= $_POST["height"];
        $width = $_POST["width"];
        $length= $_POST["length"];
        $weight= $_POST["weight"];
        

        if(!$height){
            $height=0;            
        }

        if(!$size){
            $size=0;            
        }

        if(!$width){
            $width=0;            
        }

        if(!$length){
            $length=0;            
        }

        if(!$weight){
            $weight=0;            
        }


        if($product = product_model::add($name,$sku,$price,$type,$size,$height,$width,$length,$weight)){
            echo json_encode(array('status' => true));
        }

    }

    function dvd(){
        $dvdMod = "dvdModal";        
        echo json_encode(array('status' => true,'dvdMod' => $dvdMod));
        
    }

    function furniture(){
        $furnitureMod = "furnitureModal";        
        echo json_encode(array('status' => true,'furnitureMod' => $furnitureMod));
        
    }

    function book(){
        $bookModal = "bookModal";        
        echo json_encode(array('status' => true,'bookModal' => $bookModal));
        
    }

    function switcher(){
        $switcherModal = "switcherModal";        
        echo json_encode(array('status' => false,'switcherModal' => $switcherModal));
        
    }
    
    function delete(){

                
                foreach($_POST['checkId'] as $check) {
                    $id = $check;
                    $product=product_model::delete($id);
                }

                echo json_encode(array('status' => true));

    }

    
    function duplicateSkuCheck(){
        $sku = $_POST["sku"];

        $checkDup = product_model::checkDupli($sku);
        
        if($checkDup->num_rows > 0){
            echo json_encode(array('status' => true));
        }else{
            echo json_encode(array('status' => false));
        }
    }


}



?>