$(document).ready(function(){
    $('#dvdModal').hide();
    $('#furnitureModal').hide();
    $('#bookModal').hide();

    $("#product_form").submit(function(e) {

        var url = "index.php?controller=product&action=add"; 

        $.ajax({
            type: "POST",
            url: url,
            data: $("#productForm").serialize(), 
            success: function(data)
            {
                
            }
        });
        e.preventDefault(); 
        showProducts();
    });


});

function typeChange(){
    var url = "index.php?controller=product&action=typeSwitch"; 

        $.ajax({
            type: "POST",
            url: url,
            dataType: "JSON",
            data: $("#product_form").serialize(), 
            success: function(data)
            {
                
                if(data.dvdMod == "dvdModal"){
                    $('#dvdModal').show();
                    $('#furnitureModal').hide();
                    $('#bookModal').hide(); 
                }
                if(data.furnitureMod == "furnitureModal"){
                    $('#dvdModal').hide();
                    $('#furnitureModal').show();
                    $('#bookModal').hide(); 
                }
                if(data.bookModal == "bookModal"){
                    $('#dvdModal').hide();
                    $('#furnitureModal').hide();
                    $('#bookModal').show(); 
                }

                if(data.switcherModal == "switcherModal"){
                    $('#dvdModal').hide();
                    $('#furnitureModal').hide();
                    $('#bookModal').hide(); 
                    alert("Please select correct Item type!!!");
                }
                
               
            }
        });
}

function save(){

    var url = "index.php?controller=product&action=add"; 

    var name = $("#name").val();
    var sku = $("#sku").val();
    var price = $("#price").val();
    var type = $("#productType").val();

    if(sku =='' || name == '' | price== '' | type==''){
        alert("Please, submit required data");
        die();
    }else{
    $.ajax({
        type: "POST",
        url: url,
        dataType: "JSON",
        data: $("#product_form").serialize(), 
        success: function(data)
        {
            if(data.status){
                $("#name").val("");
                $("#sku").val("");
                $("#price").val("");
                $("#typeSwitcher").val("switcher");
                $("#size").val("");
                $("#height").val("");
                $("#width").val("");
                $("#length").val("");
                $("#weight").val("");
                $('#dvdModal').hide();
                $('#furnitureModal').hide();
                $('#bookModal').hide();
                
                window.location.href = "http://localhost/scandiweb/index.php?controller=product&action=all";
            }
            
            
        }
    });
}
    
}

function numericCheck(val){
    var vall = val.value;
    var id = val.getAttribute('id');      
    
    if($.isNumeric(vall)){

    }else{
        alert("Please, provide the data of indicated type");
        document.getElementById(id).value = "";
        die();
    }
}

function checkDuplicate(val){
    var sduName = $("#sku").val();
    
    var url = "index.php?controller=product&action=duplicateSkuCheck"; 

        $.ajax({
            type: "POST",
            url: url,
            dataType: "JSON",
            data: $("#product_form").serialize(), 
            success: function(data)
            {
             if(data.status){
                alert("Duplicate SDU #");
                die();
             }else{

             }
            }
        });
}