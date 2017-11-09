

<table border="2">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Father'sName</th>
        <th>Cnic</th>
        <th>gender</th>
        <th>Country</th>
        <th>Province</th>
        <th>District</th>
        <th>Adress</th>
        <th>Description</th>
        <th>Created on</th>
        <th>Updated on</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
<?php
/*print_r($data->name);
die();
$data->map(function ($data) {
    $data = (collect($data)
        //->only(['username', 'email'])
        ->all());*/
foreach ($data as $row) {

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td> " . $row['name'] . "</td>";
    echo "<td>" . $row['fathers_name'] . "</td>";
    echo "<td>" . $row['cnic'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
    echo "<td>" . $row['province'] . "</td>";
    echo "<td>" . $row['district'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['created_at'] . "</td>";
    echo "<td>" . $row['updated_at'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";

    ?>
    <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>

        <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
<?php
    echo'<tr>'}
?>
    //})
