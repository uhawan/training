<html>


<h1>Applicants Record</h1>
<a href="add data.php">
    Add New Record</a>
<br><br>
<table border="1">

    <tr>
        <td>SR.No</td>
        <td>Name</td>
        <td>Father Name</td>
        <td>Incidence Title</td>
        <td>status</td>
        <td>Update|Delete</td>

    </tr>

    <?php

$data->map(function ($data) {
    $data = ( collect($data)
        ->all());

//print_r($data);
        echo "<tr>";
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['name']."</td>";
        echo "<td>".$data['father_name']."</td>";
        echo "<td>".$data['title']."</td>";
        echo "<td>".$data['status']."</td>";
        echo "<td><a href=\"update.php?id=$data[id]\">Update</a> | <a href=\"delete.php?id=$data[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
});
    ?>



</table>
<br><br>
<table>
    <tr>
        <td>Export</td>
    </tr>
    <tr>
        <td>
            <a href="exportcsv.php">CSV</a>
        </td>
        <td>
            <a href="exportpdf.php">PDF</a>
        </td>
    </tr>
</table>


<form action="importcsv.php" method="post" enctype="multipart/form-data" id="importFrm">
    <input type="file" name="file" />
    <input type="submit" name="importSubmit" value="IMPORT">
</form>

</body>
</html>

