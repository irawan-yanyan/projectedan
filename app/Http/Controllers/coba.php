<?php 
   

$data = array(array("nim"=>"12","nama"=>"yan"),
              array("nim"=>"14","nama"=>"dedi"),
              array("nim"=>"15","nama"=>"yulo"));

//print_r($data);

$temp_json = json_encode($data);

//var_dump($temp_json);
//print_r($temp_json);

//print_r(json_decode($temp_json));


$obj = new stdClass;
$obj->name="Deepak";
$obj->age=21;
$obj->marks=75;
print_r($obj);


?>