<div class="col-sm-12">  <!-- menampilkan list event-->
    <section class="panel">
        <div class="panel-body">
            <!-- <a href="?page=addkeg" title="Add Event" class="btn btn-compose"><i class="fa fa-plus"></i>List Event</a> -->
            <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-calendar"></i><b> Event</b></h2> <br>
                <div class="box-body">
                    <div class="form-group">
                       <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                        <th class='text-center' style="width: 5%">No</th>
                        <th class='text-center' style="width: 20%">Name</th>
                        <th class='text-center' style="width: 5%">Jenis Kegiatan</th>
                        <th class='text-center' style="width: 55%">Description</th>
                        <th class='text-center' style="width: 15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sql = mysqli_query($conn,"SELECT event.id, event.name as event_name, type_event.name as type_event_name, description FROM event join type_event on type_event.id=event.id_type_event ");
                        while($data =  mysqli_fetch_array($sql)){
                        $id = $data['id'];
                        $nama_keg = $data['event_name'];
						$jenis = $data['type_event_name'];
                        $deskripsi = $data['description'];

                        ?>
                        <tr>
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nama_keg"; ?></td>
						<td><?php echo "$jenis"; ?></td>
                        <td><?php echo "$deskripsi"; ?></td>
                        <td class='text-center'><div class="btn-group">
                        <a href="?page=updatekeg&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Update' style="color: white;"><i class="fa fa-edit"></i> Update</a></div>
                        <a href="act/delkeg.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
<a href="?page=addkeg" title="Add Event" style="color: white; background-color: #26a69a;" class="act-btn">
    +
</a>
