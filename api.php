<?php
    include('config/constants.php');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn,DB_NAME);
    $sql = "SELECT * FROM data";
    $res = mysqli_query($conn,$sql);

    $response = array();
    if($res){
        header("Contect-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($res)){
            $response[$i]['id']=$row['id'];
            $response[$i]['name']=$row['name'];
            $response[$i]['age']=$row['age'];
            $response[$i]['email']=$row['email'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }else{
        echo "Dtatbase connection failed.";
    }