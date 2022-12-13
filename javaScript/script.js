$(document).ready(function(){
});

function delete_pro(){
    
    var url = "index.php?controller=product&action=delete"; 

    $.ajax({
        type: "POST",
        url: url,
        dataType: "JSON",
        data: $("#all_product_form").serialize(), 
        success: function(data)
        {
            if(data.status){
                                   
                window.location.href = "http://localhost/scandiweb/index.php?controller=product&action=all";
            }
            
            
        }
    });
}