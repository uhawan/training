/**
 * Created by Akhuwat on 11/9/2017.
 */

$(document).ready(function(){
//alert('hello');
    app_html="";
    app_html+="<a href='addData'>Add New Record</a><br><br>";
    app_html+="<table border='1'>";
    app_html+="<tr>";
    app_html+="<td>SR.No</td>";
    app_html+="<td>Name</td>";
    app_html+="<td>Father Name</td>";
    app_html+="<td>Title</td>";
    app_html+="<td>Update|Delete</td>";
    app_html+="</tr>";

    showProducts();
});


function showProducts(){
    $.getJSON("http://localhost/api/applicants/read.php", function(data){
        $.each(data.records, function(key, val) {
            app_html+="<tr>";
            app_html+="<td>" + val.id + "</td>";
            app_html+="<td>" + val.name + "</td>";
            app_html+="<td>" + val.father_name + "</td>";
            app_html+="<td>" + val.title + "</td>";
            app_html+="<td>";
            app_html+="<a href=\'updateData?id=$data[id]\'>Update</a> | <a href=\'deleteData?id=$data[id]\' onClick=\'return confirm('Are you sure you want to delete?')\'>Delete</a></td>";
            $("#app").html(app_html);
        });
    });

}