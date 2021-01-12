 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
      <div class="panel-body">
        <!-- <a href="?page=ustad" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Ustad</a> -->
        <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-user"></i><b> List Ustad</b></h2> <br>
          <div class="box-body">
            <div class="form-group">
              <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                        <th class='text-center' style="width: 5%">No</th>
                        <th class='text-center' style="width: 20%">Name</th>
                        <th class='text-center' style="width: 50%">Address</th>
                        <th class='text-center' style="width: 10%">Contact</th>
                        <th class='text-center' style="width: 15%">Action</th>
                  </tr>
                    </thead>
                      <tbody>

                        <?php

                        $sql = mysqli_query($conn,"SELECT * FROM ustad");
                        while($data =  mysqli_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['name'];
                        $alamat = $data['address'];
                        $no_hp = $data['cp'];
                        ?>
                        <tr>
                        <td class='text-center'><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td><?php echo "$no_hp"; ?></td>
                        <td class='text-center'><div class="btn-group">
                        <a href="?page=updateustad&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Update' style="color: white;"><i class="fa fa-edit"></i> Update</a></div>
						            <a href="act/delust.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
  <a href="?page=ustad" title="Add Ustad" style="color: white; background-color: #26a69a;" class="act-btn">
    +
  </a>
