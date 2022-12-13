<?php

class product_model{
    public $id;
    public $name;
    public $sku;
    public $price;
    public $size;
    public $height;
    public $width;
    public $length;
    public $weight;
    public $type;

    public function __construct($name,$sku,$id,$price,$size,$height,$width,$length,$weight,$type) {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->price = $price;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
        $this->type = $type;
    }

    public static function all(){
        $list = [];
        $db = Db::getInstance();
        $result = mysqli_query($db,'SELECT * FROM product');

        while($row = mysqli_fetch_assoc($result)){
            $list[] = new product_model($row['name'],$row['sku'],$row['id'],$row['price'],$row['size'],$row['height'],$row['width'],$row['length'],$row['weight'],$row['type']);
        }

        return $list;
    }


    public static function delete($id){
        $db = Db::getInstance();
        $result = mysqli_query($db,"delete from product where id='$id'");
        return true;
    }

    public static function add($name,$sku,$price,$type,$size,$height,$width,$length,$weight) {

        $db = Db::getInstance();
        $result = mysqli_query($db,"Insert into product (name,sku,price,type,size,height,width,length,weight) Values ('$name','$sku','$price','$type','$size','$height','$width','$length','$weight')");
        $id=mysqli_insert_id($db);
        return new product_model($name,$sku,$id,$price,$size,$height,$width,$length,$weight,$type);
    }

    public static function checkDupli($sku) {

        $db = Db::getInstance();
        $result = mysqli_query($db,"Select* from product where product.sku ='$sku' ");
        return $result;
    }
}
?>