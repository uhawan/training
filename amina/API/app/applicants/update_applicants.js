/**
 * Created by Akhuwat on 11/9/2017.
 */

function updaterecord(id) {
   // alert(id);
   //alert( $.getJSON("http://localhost/API/applicants/read_one.php?id=" + id));

    $.getJSON("http://localhost/API/applicants/read_one.php?id=" + id, function(data){
        // values will be used to fill out our form
        var name = data.name;
        var father_name = data.father_name;
        var cnic = data.cnic;
        var gender = data.gender;
        var country = data.country;
        var province = data.province;
        var districts = data.districts;
        var address = data.address;

       // alert(name);
        //alert(father_name);
        app_html="";
        app_html+="<form name='updatedataform' method='post' id='updatedataform'>";
        app_html+="<table>";
        app_html+="<tr>";
        app_html+="<td>Name</td>";
        app_html+="<td>";
        app_html+="<input type='text' name='name' value='"+name+"'>";
        app_html+="</td>";
        app_html+="</tr>";
        app_html+="<tr>";
        app_html+="<td>Father Name</td>";
        app_html+="<td>";
        app_html+="<input type='text' name='fname' value='"+father_name+"'>";
        app_html+=" </td>";
        app_html+="</tr>";
        app_html+="<tr>";
        app_html+="<td>CNIC No</td>";
        app_html+="<td>";
        app_html+="<input type='text' name='cnic' value='"+cnic+"'>";
        app_html+="</td>";
        app_html+="</tr>";
        app_html+="<tr>";
        app_html+="<td>Address</td>";
        app_html+="<td>";
        app_html+="<textarea type='address' name='address' value='"+address+"'>"+address+"</textarea>";
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
        app_html+="<input type='hidden' name='id' value='"+id+"'>";
        app_html+="<input type='submit' name='add' id='add' value='Update'>";
        app_html+="</td>";
        app_html+="</tr>";

        app_html+="</table>";

        app_html+="</form>";
        $("#updateData").html(app_html);
    });
    // will run if 'create product' form was submitted
    $(document).on('submit', '#updatedataform', function(){
        var form_data=JSON.stringify($(this).serializeObject());
        //var name=$('#name').val();
        alert(form_data);
        $.ajax({
            url: "http://localhost/API/applicants/update.php",
            type : "POST",
            dataType : 'json',
            data : form_data,
            success : function(result) {
                // product was created, go back to products list
                // showProducts();
                alert('data create');
            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }
        });

        return false;
    });
}
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