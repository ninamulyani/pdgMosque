 <!-- menampilkan form add user-->
 <div class="col-sm-12"> 
				<section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Add User</a>
                        <div class="box-body"	>

                      <div class="form-group">
                        <?php if (!isset($_GET['user'])){ ?>
                        <form class="form-horizontal style-form" role="form" action="act/insertuser.php" method="post">

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Stewardship Period</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="periode_pengurusan" value="">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Address</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat_pengurus" value="">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Contact</label>
		  <div class="col-sm-10">
          <input type="number" class="form-control" name="no_hp" value="">
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Role</label>
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

              $mesjid=mysqli_query($conn,"SELECT worship_place.id as id_mesjid, worship_place.name as nama_mesjid FROM worship_place, city where city.id='$city' AND st_contains(city.geom, worship_place.geom)");
              while($mes = mysqli_fetch_assoc($mesjid))
              {
              echo"<option value=".$mes['id_mesjid'].">".$mes['nama_mesjid']."</option>";
              }
              ?>

          </select>
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="user">Username</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="username" value="">
		  </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="pass">Password</label>
		  <div class="col-sm-10">
          <input type="password" class="form-control" name="password" value="">
		  </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right" style="background-color: #26a69a; border: 1px solid #e7e7e7;">Save <i class="fa fa-floppy-o"></i></button>
</form>
<?php } ?>
                      </div>
                  </div>
                    </div>
                </section>
                 </div>
