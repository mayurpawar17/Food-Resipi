<?php


include ('connect.php');
if(isset($_POST['submit'])){

    $recipename=$_POST['recipename'];
    $description=$_POST['description'];
    $image=$_FILES['file'];
    echo $recipename;
    echo "<br>";
    echo $description;
    echo "<br>";
    //Print_r($image);
    echo "<br>";


    $imagefilename=$image['name'];
    //print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    //($imagefileerror);
    echo "<br>";

    $imagefiletemp=$image['tmp_name'];
    //print_r($imagefiletemp);
    echo "<br>";

    $filename_separate=explode('.',$imagefilename );
    //print_r($filename_separate);
    echo "<br>";
    $file_extension=strtolower($filename_separate[1]);
   // print_r($file_extension);
    echo "<br>";

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration` (name,description,image) values('$recipename','$description','$upload_image')";

        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div rolr="alert">
            <strong>Success</strong>Data Inserted Sucssfully"
            </div>';
        }
        else{
            die(mysqli_error($con));
        }
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciep</title>
</head>
<body>
    <h1>Thank yoy</h1>
    
</body>
</html>