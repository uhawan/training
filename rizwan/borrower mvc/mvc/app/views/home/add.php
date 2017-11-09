<?php

?>

<form method="post"/*action="http://localhost/mvc/public/home/add"*/>
    <label>Name:</label>
    <input type="text" name="name">
    <br>
    <br>
    <label>Fathers_name:</label>
    <input type="text" name="fathers_name">
<br>
<br>
    <br>
<br>
<label>Cnic:</label>
<input type="text" name="cnic">
<br>
<br>
<label>Gender</label>
<select name="gender">
    <option value="m">Male</option>
    <option value="f">Feale</option>
    </option>
</select>

<br>
<br>
<label>Country</label>
<select name="country">
    <option value="Pakistan">Pakistan</option>
    <option value="India">India</option>
    <option value="Afghanistan">Afghanistan</option>
    </option>
</select>
<br>
<br>
<label>Province:</label>
<select name="province">
    <option value="Punjab">Punjab</option>
    <option value="Sindh">Sindh</option>
    <option value="Kpk">Kpk</option>
    </option>
</select>
<br>
<br>
<label>District</label>
<select name="district">
    <option value="Multan">Multan</option>
    <option value="Faisalbad">Faisalbad</option>
    <option value="lahore">lahore</option>
    </option>
</select><br>
<br>
<label>Adress:</label>
<input type="text" name="address">
<br>
<br>
<label>Description:</label>
<input type="text" name="description">
<br>
<br>
<label>Status:</label>
<input type="text" name="status">
<br>
<br>
<input type="submit" name="add">

</form>
<a href="add.php">Click Here For Sign In</a>
