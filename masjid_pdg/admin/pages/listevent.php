 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
      <div class="panel-body">
        <!-- <a href="?page=addevent" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Event</a> -->
        <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-calendar"></i><b> List Event</b></h2>
          <br>
          <div class="box-body">
            <div class="form-group">
              <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Date</th>
						            <th>Ustad</th>
						            <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                  </tr>
                    </thead>
                      <tbody>
                        <?php

                        $sql = mysqli_query($conn,"SELECT event.name as event_name, detail_event.id_worship_place ,worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time, status FROM detail_event join event on detail_event.id_event=event.id join worship_place on detail_event.id_worship_place=worship_place.id join ustad on detail_event.id_ustad=ustad.id where detail_event.id_worship_place='$id'");
                        while($data =  mysqli_fetch_array($sql)){
                        $nama_keg = $data['event_name'];
                        $id = $data['id_worship_place'];
                        $jam = $data['time'];
                        $tgl_keg = $data['date'];
                        $nama_ustad = $data['ustad_name'];
                        $materi = $data['description'];
                        $scale = $data['status'];
                        ?>
                        <tr>
                        <td><?php echo "$nama_keg"; ?></td>
                        <td><?php echo "$jam"; ?></td>
                        <td><?php echo "$tgl_keg"; ?></td>
                        <td><?php echo "$nama_ustad"; ?></td>
                        <td><?php echo "$materi"; ?></td>
                        <?php if ($scale=='1'){
                          $status = "Recommendation";
                        } elseif ($scale=='0'){
                          $status = "Not Recommendation";
                        } 
                        ?>
                        <td><?php echo "$status"; ?></td>
                    
                        <td><div class="btn-group">
                        <a href="?page=updatekegiatanuser&id=<?php echo $id; ?>&jam=<?php echo $jam; ?>&date=<?php echo $tgl_keg; ?>" class="btn btn-sm btn-default" title='Update' style="color: white;"><i class="fa fa-edit"></i> Update</a>
                        </div>
                        <a href="act/delevent.php?id_worship_place=<?php echo $id; ?>&date=<?php echo $tgl_keg; ?>&time=<?php echo $jam; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
                        </div>
                        </td>
                        </tr>
                        <?php } ?>
                      </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
    <a href="?page=addevent" title="Add Event" style="color: white; background-color: #26a69a;" class="act-btn">
    +
    </a>