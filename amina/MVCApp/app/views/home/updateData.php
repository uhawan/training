<?php
$data->map(function ($data) {
    $data = (collect($data)
        ->all());

    // $id = $_GET['id'];


    /* $name = $data['name'];
     $father_name = $data['father_name'];
     $cnic = $data['cnic'];
     $gender = $data['gender'];
     $country = $data['country'];
     $province = $data['province'];
     $districts = $data['districts'];
     $address = $data['address'];
     $incidence_id = $data['incidence_id'];
     $gender = $data['gender'];
 });*/
    print_r($data);
});
?>
