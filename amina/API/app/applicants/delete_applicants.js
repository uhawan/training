/**
 * Created by Akhuwat on 11/10/2017.
 */

function deleterecord(id)
{
var $id= id;
    alert($id);
    $.ajax({
        url: "http://localhost/API/applicants/delete.php",
        type : "POST",
        dataType : 'json',
        data : JSON.stringify({ id: $id }),
        success : function(result) {

            // re-load list of products
           //showProducts();
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
}
