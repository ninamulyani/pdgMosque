 <div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
        <div class="panel-body">
            <!-- <a href="?page=user" title="Add Pengurus" class="btn btn-compose"><i class="fa fa-plus"></i>List Pengurus</a> -->
            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-bars"></i><b> List Mosque Admin</b></h2>
            <br>
                <div class="box-body">
                    <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class='text-center' style="width: 10%">Username</th>
                            <th class='text-center' style="width: 20%">Name</th>
                            <th class='text-center' style="width: 10%">Periode</th>
                            <th class='text-center' style="width: 45%">Mesjid</th>
                            <th class='text-center' style="width: 15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = mysqli_query($conn,"select a.id_worship_place,a.name as admin_name, a.stewardship_period, a.username, b.name as worship_place_name  from administrators as a, worship_place as b where a.id_worship_place=b.id");
                                while($data =  mysqli_fetch_array($sql)){
                                $id = $data['id_worship_place'];
                                $mesjid = $data['worship_place_name'];
                                $periode = $data['stewardship_period'];
                                $username = $data['username'];
                                $nama = $data['admin_name'];
                            ?>
                        <tr>
                            <td class='text-center'><?php echo "$username"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$periode"; ?></td>
                            <td><?php echo "$mesjid"; ?></td>
                            <td class='text-center'>
                              <div class="btn-group">
                                <a href="?page=userupdate&id=<?php echo $id; ?>&stewardship_period=<?php echo $periode; ?>" class="btn btn-sm btn-default" title='update' style="color: white;"><i class="fa fa-edit"></i> Update</a></div>
						        <a href="act/delpeng.php?id=<?php echo $id; ?>&periode=<?php echo $periode; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
<a href="?page=user" title="Add Admin" style="color: white; background-color: #26a69a;" class="act-btn">
    +
</a>