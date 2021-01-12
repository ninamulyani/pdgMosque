<?php
    include ('../inc/connect.php');

    $id	= $_POST['id'];
    $type = $_POST['type'];
    $typebaru = $_POST['typebaru'];
    $status = $_POST['status'];

    $sql  = "update detail_worship_type set id_type='$typebaru', status='$status' where id='$id' and id_type='$type' ";
    $update = mysqli_query($conn, $sql);
    //echo "$sql";

    if ($update){
        echo "<script>
            alert (' Data Successfully Change');
            eval(\"parent.location='../?page=recommendation'\");
            </script>";
    }else{
        echo 'error';
    }
?>