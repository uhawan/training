/**
 * Created by Akhuwat on 11/9/2017.
 */
$(document).ready(function(){

    // show html form when 'update product' button was clicked
    $(document).on('click','.update-product-button', function(){
        alert('good');
        // product ID will be here
        // get product id
        var id = $(this).attr('data-id');
        // read one record based on given product id
        $.getJSON("http://localhost/api/product/read_one.php?id=" + id, function(data){

            // values will be used to fill out our form
            var name = data.name;
            var price = data.price;
            var description = data.description;
            var category_id = data.category_id;
            var category_name = data.category_name;

            // load list of categories will be here
        });
    });

    // 'update product form' submit handle will be here
});