<?php
    include ('connect.php');
    

    // Function to get the client IP address
    function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip_user = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip_user = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip_user = $_SERVER['REMOTE_ADDR'];
        }
         return $ip_user;
    }   
    //echo 'User Real IP '.getUserIpAddr();
    $ip_user = getUserIpAddr();
	$id_worship_place = $_POST['id_worship_place'];
    $nilai_rat = $_POST['nilai_rating'];

    
    $querySearch = "SELECT * FROM rating_wp where ip_user='$ip_user' and id_worship_place='$id_worship_place'";
    $search = mysqli_query($conn, $querySearch);
        if(mysqli_num_rows($search) == 0){
            $sql = mysqli_query($conn, "insert into rating_wp (ip_user, id_worship_place , nilai_rating) values ('$ip_user', '$id_worship_place', '$nilai_rat')");
        } else {
            $sql = mysqli_query($conn, "update rating_wp set nilai_rating='$nilai_rat' where ip_user='$ip_user' and id_worship_place='$id_worship_place'");
        }

        if ($sql){
            echo "<script>
            alert (' Rating Successfully Set');
            eval(\"parent.location='index.php'\");
            </script>";
            
        }else{
            echo "<script>
            alert (' Error,$ip_user,$id_worship_place,$nilai_rat ');
            </script>";    
        }
?>