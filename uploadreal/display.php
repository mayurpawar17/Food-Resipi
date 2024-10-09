<?php


include ('connect.php');
if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];
    echo $username;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    Print_r($image);
    echo "<br>";

    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";

    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";

    $filename_separate=explode('.',$imagefilename );
    print_r($filename_separate);
    echo "<br>";
    $file_extension=strtolower($filename_separate[1]);
    print_r($file_extension);
    echo "<br>";

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration` (name,mobile,image) values('$username','$mobile','$upload_image')";

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