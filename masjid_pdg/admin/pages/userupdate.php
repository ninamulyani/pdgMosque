 <div class="col-sm-12"> <!-- menampilkan form add user-->
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update Pengurus</a>
                        <div class="box-body"	>

                      <div class="form-group">
                        <?php if (isset($_GET['id']) && (isset($_GET['stewardship_period']))){
					$id=$_GET['id'];
          $period=$_GET['stewardship_period'];
					$sql = mysqli_query($conn,"SELECT stewardship_period,id_worship_place, name, address, hp, role, username, password FROM administrators where id_worship_place='$id' and stewardship_period='$period'");
					$data = mysqli_fetch_array($sql)
						?>
        <form class="form-horizontal style-form" role="form" action="act/updateuser.php" method="post">
        <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id_worship_place']?>">
        <input type="text" class="form-control hidden" id="stewardship_period" name="stewardship_period" value="<?php echo $data['stewardship_period']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama_pengurus">Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama_pengurus" value="<?php echo $data['name']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="periode_pengurusan">Stewardship Period</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="periode_pengurusan" value="<?php echo $data['stewardship_period']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="alamat_pengurus">Address</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat_pengurus" value="<?php echo $data['address']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp">Contact</label>
		  <div class="col-sm-10">
          <input type="number" class="form-control" name="no_hp" value="<?php echo $data['hp']?>">
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="role">Role</label>
		  <div class="col-sm-10">
          <select required name="role" class="form-control">
            <option value="A">Admin</option>
            <option value="P">Worship Place's Admin</option>
          </select>
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_mesjid">Worship Place</label>
		  <div class="col-sm-10">
          <select  name="id_mesjid" id="id_mesjid" class="form-control">
		  <option value='0'>None</option>
             <?php

              $mesjid=mysqli_query($conn,"SELECT worship_place.id, worship_place.name FROM worship_place, city where city.id='$city' AND st_contains(city.geom, worship_place.geom)");

			  while($mes = mysqli_fetch_assoc($mesjid))
              {

			   if ($data[id_worship_place]==$mes[id]){
				echo "<option value=\"$mes[id]\" selected>$mes[name]</option>";}
				else{
				echo"<option value=".$mes['id'].">".$mes['name']."</option>";}
			}
              ?>
          </select>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>">
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="password">Password</label>
		  <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Dont forget to input password again">
		  </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right" style="background-color: #26a69a; border: 1px solid #e7e7e7;">Update <i class="fa fa-floppy-o"></i></button>
</form>
<?php } ?>
                      </div>
                  </div>
                    </div>
                </section>
                 </div>
