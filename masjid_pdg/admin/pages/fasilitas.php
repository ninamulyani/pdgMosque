<div class="col-sm-12">  <!-- menampilkan fasilitas-->
    <section class="panel">
      <div class="panel-body">
        <!-- <a href="?page=addfas" class="btn btn-compose" title="Add Facility"><i class="fa fa-plus"></i>Facility</a> -->
        <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-caret-square-o-down"></i><b> Facility</b></h2>
          <br>
            <div class="box-body">
              <div class="form-group">
                <table id="example3" class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                        <th class='text-center' style="width: 7%">No</th>
                        <th class='text-center' style="width: 75%">Facility</th>
                        <th class='text-center' style="width: 23%">Action</th>
                    </tr>
                      </thead>
                        <tbody>

                        <?php

                        $sql = mysqli_query($conn,"SELECT * FROM facility");
                        while($data =  mysqli_fetch_array($sql)){
                        $id_fasilitas = $data['id'];
                        $nama_fasilitas = $data['name'];
                        ?>
                        <tr>
                        <td class='text-center'><?php echo "$id_fasilitas"; ?></td>
                        <td><?php echo "$nama_fasilitas"; ?></td>
                        <td class='text-center'>
                          <div class="btn-group">
                          <a href="?page=updatefas&id=<?php echo $id_fasilitas; ?>" class="btn btn-sm btn-default" title='Update' style="color: white;"><i class="fa fa-edit"></i>Update</a>
                          </div>
                          <a href="act/delfas.php?id_fasilitas=<?php echo $id_fasilitas; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
      <a href="?page=addfas" title="Add Facility" style="color: white; background-color: #26a69a;" class="act-btn"> + </a>
