<div class="col-sm-12"> <!-- menampilkan form add user-->
	<section class="panel">
        <div class="panel-body">
           <a class="btn btn-compose">Add Recommentation</a>
            <div class="box-body"	>
                <div class="form-group">
                <?php
                    $query = mysqli_query($conn,"SELECT MAX(id) AS id FROM detail_worship_type");
                    $result = mysqli_fetch_array($query);
                    $idmax = $result['id'];
                      if ($idmax==null) {$idmax=1;}
                      else {$idmax++;}
                ?>
                <!-- form input data rekomendasi -->
                <form class="form-horizontal style-form" role="form" action="act/add_recom.php" method="post">
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="nama_masjid">Name</label>
                    <div class="col-sm-10">
                        <select name="nama" id="nama" class="form-control">
                            <option value=" "> --- Select Mosque Name --- 
                            <?php
                                $nama=mysqli_query($conn,"select * from worship_place ");
                                    while($rownama = mysqli_fetch_assoc($nama))
                                    {
                                    echo"<option value=".$rownama['id'].">".$rownama['name']."</option>";
                                    }
                            ?>
                        </select>
                    </div>
                    </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" for="type">Type</label>
                <div class="col-sm-10">
                    <select name="type" id="type" class="form-control">
                        <option value=" ">  --- Select Type --- 
                        <?php
                            $type=mysqli_query($conn,"select * from worship_place_type");
                                while($rowtype = mysqli_fetch_assoc($type))
                                {
                                echo"<option value=".$rowtype['id_type'].">".$rowtype['name']."</option>";
                                }
                        ?>
                    </select>
                </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="scale"><span style="color:red"></span>Grade</label>
                        <div class="col-sm-10">
                            <select  required name="status" id="status" <?php echo $rowtype['status'] ?> class="form-control">
                                <option value=" "> --- Select Grade --- 
                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                                <option value="5"> 5</option>
                            </select>
                        </div>
                </div>
        
                        <button type="submit" class="btn btn-primary pull-right" style="background-color: #26a69a; border: 1px solid #e7e7e7;">Save <i class="fa fa-floppy-o"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
