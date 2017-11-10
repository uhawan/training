<?php
require_once "read.php";
echo json_decode($products_arr);
print_r($products_arr);
echo "<table>";
echo  "<tr>";
echo   "<th>Id</th>";
echo   "<th>Name</th>";
echo   "<th>Description</th>";
echo "<th>Price</th>";
echo  "<th>Category Id</th>";
echo "<th>Category Name</th>";
echo "</tr>";

foreach ($products_arr as $row)

{
    foreach ($row as $r){
        //print_r($r);
        //die();
        echo "<tr>";
        echo "<td>" . $r['id'] . "</td>";
        echo "<td> " . $r['name'] . "</td>";
        echo "<td>" . $r['description'] . "</td>";
        echo "<td>" . $r['price'] . "</td>";
        echo "<td>" . $r['category_id'] . "</td>";
        echo "<td>" . $r['category_name'] . "</td>";

        echo'<tr>';
    }

}

echo "</table>";

?>