<div class="col-sm-12"> <!-- menampilkan form add user-->
	<section class="panel">
        <div class="panel-body">
           <a class="btn btn-compose">Update Recommentation</a>
            <div class="box-body"	>
                <div class="form-group">
                <!-- form input update data rekomendasi -->
                <form class="form-horizontal style-form" role="form" action="act/update_recom.php" method="post">
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="nama_masjid">Name</label>
                    <div class="col-sm-10">
                        <?php
                            $id_worship = $_GET['id'];
                            $namamesjid=mysqli_query($conn,"select id,name from worship_place where id='$id_worship'");
                            $rowidmesjid = mysqli_fetch_assoc($namamesjid);
                            $namamesjid = $rowidmesjid['name'];
                            $idmesjid = $rowidmesjid['id'];
                        ?>
                       <input type="hidden" class="form-control" name="id" value="<?=$idmesjid?>" readonly >
                       <input type="text" class="form-control" name="" value="<?=$namamesjid?>" readonly >
                    </div>
                    </div>

                <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" for="type">Type</label>
                <div class="col-sm-10">
                    <select name="typebaru" id="type" class="form-control">
                        <?php 
                        $idtype = $_GET['id_type'];
                        $type=mysqli_query($conn,"select * from worship_place_type");
                        while($rowtype = mysqli_fetch_assoc($type))
                        {
                        ?>
                        <option <?= $idtype == $rowtype['id_type'] ? 'selected' : '' ?> value="<?= $rowtype['id_type'] ?>"><?= $rowtype['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                </div>

                <input type="hidden" class="form-control" name="type" value="<?=$_GET['id_type']?>" readonly >

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" for="scale"><span style="color:red"></span>Grade</label>
                        <?PHP $statusbaru = $_GET['status'];?>    
                        <div class="col-sm-10">
                            <select  required name="status" id="status" <?php echo $rowtype['status'] ?> class="form-control">
                                <option <?= $statusbaru == 1 ? 'selected' : '' ?> value="1"> 1</option>
                                <option <?= $statusbaru == 2 ? 'selected' : '' ?> value="2"> 2</option>
                                <option <?= $statusbaru == 3 ? 'selected' : '' ?> value="3"> 3</option>
                                <option <?= $statusbaru == 4 ? 'selected' : '' ?> value="4"> 4</option>
                                <option <?= $statusbaru == 5 ? 'selected' : '' ?> value="5"> 5</option>
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
