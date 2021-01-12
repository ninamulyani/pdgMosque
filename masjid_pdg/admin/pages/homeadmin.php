<div class="col-sm-12">  <!-- menampilkan list mosque-->
    <section class="panel">
      <div class="panel-body">
          <!-- <a href="?page=addmosque" title="Add Mosque" class="btn btn-compose"><i class="fa fa-plus"></i>List Mosque</a> -->
          <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-bars"></i><b> List Mosque</b></h2>
          <br>
            <div class="box-body">
              <div class="form-group">
                <table id="example2" class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                        <th class='text-center'>ID</th>
                        <th class='text-center'>Name</th>
                        <th class='text-center'>Address</th>
                        <th class='text-center'>Option</th>
                        </tr>
                  </thead>
                    <tbody>

                      <?php
                        $sql = mysqli_query($conn,"SELECT * FROM worship_place");
                        while($data =  mysqli_fetch_array($sql)){
                        $id = $data['id'];
                        $nama = $data['name'];
                        $alamat = $data['address'];
                      ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$alamat"; ?></td>
                        <td class='text-center'><div class="btn-group">
						              <a href="?page=detail&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Detail' style="color: white;"><i class="fa fa-list"></i> Detail</a> </div>
						              <a href="act/delworship.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
  
  <a href="?page=addmosque" title="Add Mosque" style="color: white; background-color: #26a69a;" class="act-btn">
    +
  </a>
