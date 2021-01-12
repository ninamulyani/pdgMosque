<?php
    include ('../inc/connect.php');
    $id = $_GET['id'];
    $id_type = $_GET['id_type'];

        $sql   = "delete from detail_worship_type where id='$id' and id_type='$id_type' ";
        // die(var_dump($sql));

        $delete = mysqli_query($conn, $sql);
        if ($delete){
            echo "<script>
                      alert (' Data Successfully Delete');
                        eval(\"parent.location='../?page=recommendation'\");
                  </script>";
        }
        else{
            echo 'error';

        }
?>
