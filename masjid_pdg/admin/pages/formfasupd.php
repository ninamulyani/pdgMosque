<?php if (isset($_GET['id'])){
    $id=$_GET['id'];
?>

	<div class="col-sm-6">
    <section class="panel">
      <div class="panel-body">
        <a class="btn btn-compose"> Facility</a>
          <div class="box-body" style="max-height:400px;overflow:auto;">
            <div class="form-group">
              <form role="form" action="act/fasupd.php" method="post">
                <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $id ?>">
                  <div class="form-group">
                    <?php
							        $sql2 = mysqli_query($conn,"select * from facility order by name");

                      while($dt2 = mysqli_fetch_array($sql2)){
                        $id_fasilitas=$dt2['id'];
                        $sql3 = mysqli_query ( $conn,"SELECT * FROM detail_facility where id_worship_place='$id' and id_facility='$id_fasilitas'");
                        
                        $data3 = mysqli_fetch_array($sql3);
                        if($dt2['id']==$data3['id_facility']){
                          echo"<table class='table table-hover table-bordered table-striped'>
                                <tbody><tr><td><div class='checkbox'><label><input name='fasilitas[]' value='$id_fasilitas' type='checkbox' checked>$dt2[name]</label></div></tr></tbody></table>";
                        }else{
                        echo "<table class='table table-hover table-bordered table-striped'>
                                <tbody><tr><td><div class='checkbox'><label><input name='fasilitas[]' value='$id_fasilitas' type='checkbox'>$dt2[name]</label></div></td></tr></tbody>
                                </table>";
                        }
							        }
						        ?>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" style="color: white; background-color: #26a69a;">Save <i class="fa fa-floppy-o"></i></button>
              </form>
            </div>
          </div>
      </div>
    </section>
  </div>
	<?php } ?>
