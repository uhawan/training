/**
 * Created by Akhuwat on 11/9/2017.
 */
$(document).ready(function(){

  /*  app_html="";
    app_html+="<form name='adddataform' method='post' id='adddataform'>";
    app_html+="<table>";
    app_html+="<tr>";
    app_html+="<td>Name</td>";
    app_html+="<td>";
    app_html+="<input type='text' name='name'>";
    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Father Name</td>";
    app_html+="<td>";
    app_html+="<input type='text' name='fname'>";
    app_html+=" </td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>CNIC No</td>";
    app_html+="<td>";
    app_html+="<input type='text' name='cnic'>";
    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Address</td>";
    app_html+="<td>";
    app_html+="<textarea type='address' name='address'></textarea>";
    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Country</td>";
    app_html+="<td>";
    app_html+="<select name='countries'>";
    app_html+="<option value='Pakistan' selected>Pakistan</option>";
    app_html+="<option value='Canada'>Canada</option>";
    app_html+="<option value='France'>France</option>";
    app_html+="</select>";

    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Province</td>";
    app_html+="<td>";
    app_html+="<select name='provinces'>";
    app_html+="<option value='Punjab' selected>Punjab</option>";
    app_html+="<option value='KPK'>Kpk</option>";
    app_html+="<option value='Ontario'>Ontario</option>";
    app_html+="</select>";

    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>District</td>";
    app_html+="<td>";
    app_html+="<select name='districts'>";
    app_html+="<option value='Gujranwala' selected>Gujranwala</option>";
    app_html+="<option value='Peshawar'>Peshawar</option>";
    app_html+="<option value='Toronto'>Toronto</option>";
    app_html+="</select>";

    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Incidence</td>";
    app_html+="<td>";

    app_html+="</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>Gender</td>";
    app_html+="<td>";
    app_html+="<input type='radio' name='gender' checked='checked' value='female'>Female";
    app_html+="<input type='radio' name='gender' value='male'>Male</td>";
    app_html+="</tr>";
    app_html+="<tr>";
    app_html+="<td>";
    app_html+="<input type='submit' name='add' id='add' value='Add'>";
    app_html+="</td>";
    app_html+="</tr>";

    app_html+="</table>";

    app_html+="</form>";
    $("#addData").html(app_html);*/
    $(document).on('submit', '#adddataform', function(){
        var form_data=JSON.stringify($(this).serializeObject());
        //var name=$('#name').val();
        //alert(name);
        $.ajax({
            url: "http://localhost/API/applicants/create.php",
            type : "POST",
            dataType : 'json',
            data : form_data,
            success : function(result) {
                // product was created, go back to products list
               // showProducts();
                //alert('data create');
            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });

        return false;
    });
});

// function to make form values to json format
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};