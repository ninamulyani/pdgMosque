<?php
	include ('../inc/connect.php');
    $id = $_GET['id'];
    $status = $_GET['status'];
        if($status==0){
            $status=1;
        } else {
            $status=0;
        }
        $sqll   = "update detail_worship_type set status=$status where id='$id'";
        var_dump($sqll);
		$updatestatus = mysqli_query($conn,$sqll);
	
?>
