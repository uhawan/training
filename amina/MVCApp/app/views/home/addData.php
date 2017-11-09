<html>
<body>
<h1>Hello!</h1>
<form name="adddataform" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td>
                <input type="text" name="fname">
            </td>
        </tr>
        <tr>
            <td>CNIC No</td>
            <td>
                <input type="text" name="cnic">
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <textarea type="address" name="address"></textarea>
            </td>
        </tr>
        <tr>
            <td>Country</td>
            <td>
                <select name="countries">
                    <option value="Pakistan" selected>Pakistan</option>
                    <option value="Canada">Canada</option>
                    <option value="France">France</option>
                </select>

            </td>
        </tr>
        <tr>
            <td>Province</td>
            <td>
                <select name="provinces">
                    <option value="Punjab" selected>Punjab</option>
                    <option value="KPK">Kpk</option>
                    <option value="Ontario">Ontario</option>
                </select>

            </td>
        </tr>
        <tr>
            <td>District</td>
            <td>
                <select name="districts">
                    <option value="Gujranwala" selected>Gujranwala</option>
                    <option value="Peshawar">Peshawar</option>
                    <option value="Toronto">Toronto</option>
                </select>

            </td>
        </tr>
        <tr>
            <td>Incidence</td>
            <td>
                <select name="incide">
                    <?php
                    $data->map(function ($data) {
                        $data = (collect($data)
                            ->all());

                        echo "<option value=".$data['id']." >".$data['title']."</option>";
                    });
                    // $inc_id = $conn->query("SELECT * FROM incidence WHERE title==incide");
                    ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" checked="checked" value="female">Female
                <input type="radio" name="gender" value="male">Male</td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="add" value="Add">
            </td>
        </tr>

    </table>

</form>
</body>
</html>