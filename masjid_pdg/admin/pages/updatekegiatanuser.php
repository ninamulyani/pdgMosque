 <div class="col-sm-12"> <!-- menampilkan form add event-->
	<section class="panel">
    <div class="panel-body">
      <a class="btn btn-compose">Update Event</a>
        <div class="box-body"	>
          <div class="form-group">
            <?php if (isset($_GET['id']) && (isset($_GET['jam'])) && (isset($_GET['date']))){
              $id=$_GET['id'];
              $jam=$_GET['jam'];
              $tgl_keg=$_GET['date'];
                $sql = mysqli_query($conn,"SELECT detail_event.id_event, detail_event.id_worship_place,event.name as event_name, detail_event.date, detail_event.id_ustad, ustad.name as ustad_name, detail_event.description, detail_event.time, detail_event.status FROM detail_event join event on detail_event.id_event=event.id join worship_place on detail_event.id_worship_place=worship_place.id join ustad on detail_event.id_ustad=ustad.id where detail_event.date='$tgl_keg' and detail_event.time='$jam' and detail_event.id_worship_place='$id'");
              $data = mysqli_fetch_array($sql);
            ?>

              <form class="form-horizontal style-form" role="form" action="act/updkeguser.php" method="post">
                <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $data['id_worship_place']?>">
                <input type="text" class="form-control hidden" id="time" name="time" value="<?php echo $data['time']?>">
                <input type="text" class="form-control hidden" id="date" name="date" value="<?php echo $data['date']?>">

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="id_keg"><span style="color:red"></span>Name</label>
                      <div class="col-sm-10">
                        <select  name="id_keg" id="id_keg" class="form-control">
                          <?php
                            $jenis=mysqli_query($conn,"select * from event ");
                              while($rowkeg = mysqli_fetch_assoc($jenis))
                              {
                                if ($data['id_event']==$rowkeg['id']){
                                    echo "<option value=\"$rowkeg[id]\" selected>$rowkeg[name]</option>";}
                                else{
                                    echo"<option value=\"$rowkeg[id]\">$rowkeg[name]</option>";}
                              }
                          ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="jam">Time</label>
                      <div class="col-sm-10">
                        <div class="input-group bootstrap-timepicker">
                          <input type="time" class="form-control" name="jam" value="<?php $date = date("H:i:s", strtotime($data['time'])); echo "$date"; ?>"/> 
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="tgl_keg"><span style="color:red"></span>Date</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control form-control-inline input-medium default-date-picker" size="16" name="tgl_keg" value="<?php $timestamp = strtotime($data['date']); echo date('m-d-Y', $timestamp); ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="id_ustad"><span style="color:red"></span>Ustad</label>
                      <div class="col-sm-10">
                        <select  name="id_ustad" id="id_ustad" class="form-control">
                          <?php
                            $ustad=mysqli_query($conn,"select * from ustad");
                            while($rowust = mysqli_fetch_assoc($ustad))
                            {
                              if ($data['id_ustad']==$rowust['id']){
                                echo"<option value=\"$rowust[id]\" selected>$rowust[name]</option>";
                              }
                                echo"<option value=\"$rowust[id]\">$rowust[name]</option>";
                            }
                          ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="materi">Description</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="materi" value="<?php echo $data['description'] ?>">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="scale"><span style="color:red"></span>Scale</label>
                      <div class="col-sm-10">
                        <select  required name="scale" <?php echo $data['status'] ?> class="form-control">
                          <option value="1"> Recommendation</option>
                          <option value="0"> Not Recommendation</option>
                        </select>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" onclick="show1()" style="background-color: #26a69a; border: 1px solid #e7e7e7;">Save <i class="fa fa-floppy-o"></i></button>
              </form>
					    <?php } ?>
          </div>
        </div>
    </div>
  </section>
</div>
