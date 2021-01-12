  <?php
    require 'inc/connect.php';
    $id = $_GET["id"];

    $query = "SELECT worship_place.id, worship_place.name as worship_place_name, worship_place.address, worship_place.image, worship_place.land_size, worship_place.building_size, worship_place.park_area_size, worship_place.capacity, worship_place.est, worship_place.last_renovation, worship_place.imam, worship_place.jamaah, worship_place.teenager, category_worship_place.name as category_name, administrators.name as admin_name, ST_X(ST_Centroid(geom)) As lng, ST_Y(ST_Centroid(geom)) As lat FROM worship_place left join category_worship_place on category_worship_place.id=worship_place.id_category left join administrators on administrators.id_worship_place=worship_place.id where worship_place.id='$id'";
      $hasil=mysqli_query($conn,$query);
      while($row = mysqli_fetch_array($hasil)){
        $id=$row['id'];
        $worship_place_name=$row['worship_place_name'];
        $address=$row['address'];
        $land_size=$row['land_size'];
        $building_size=$row['building_size'];
        $park_area_size=$row['park_area_size'];
        $capacity=$row['capacity'];
        $est=$row['est'];
        $last_renovation=$row['last_renovation'];
        $imam=$row['imam'];
        $jamaah=$row['jamaah'];
        $teenager=$row['teenager'];
        $category_name=$row['category_name'];
        $admin_name=$row['admin_name'];
        $image=$row['image'];
        $lat=$row['lat'];
        $lng=$row['lng'];
        if ($lat=='' || $lng==''){
          $lat='<span style="color:red">Kosong</span>';
          $lng='<span style="color:red">Kosong</span>';
        }
        if ($image=='null' || $image=='' || $image==null){
        $image='foto.jpg';
        }
      }
  ?>

<div class="row">

  <!-- Layout Detail info -->
  <div class  ="col-sm-6">
    <section class="panel">
      <header class="panel-heading">
				<h3 class="box-title" style="text-transform:capitalize; font-family: Arial;"><b><?php echo $worship_place_name ?></b></h3>
      </header>
        <div class="panel-body">
					<table>
					  <tbody  style='vertical-align:top; line-height: 23px;'>
                <tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
                <tr><td><b>Land Size</b></td><td>:</td><td><?php echo $land_size ?> m<sup>2</sup></td></tr>
                <tr><td><b>Building Size</b></td> <td> :</td><td><?php echo $building_size ?> m<sup>2</sup></td></tr>
                <tr><td><b>Park Area Size<b> </td><td>: </td><td><?php echo $park_area_size ?> m<sup>2</sup></td></tr>
                <tr><td><b>Capacity<b> </td><td>: </td><td><?php echo $capacity ?></td></tr>
                <tr><td><b>Establish<b> </td><td>: </td><td><?php echo $est ?></td></tr>
                <tr><td><b>Last Renovation<b> </td><td>: </td><td><?php echo $last_renovation ?></td></tr>
                <tr><td><b>Imam<b> </td><td>: </td><td><?php echo $imam ?></td></tr>
                <tr><td><b>Jamaah<b> </td><td>: </td><td><?php echo $jamaah ?></td></tr>
                <tr><td><b>Teenager<b> </td><td>: </td><td><?php echo $teenager ?></td></tr>
                <tr><td><b>Category<b> </td><td>: </td><td><?php echo $category_name ?></td></tr>
                <tr><td><b>Administrator<b> </td><td>: </td><td><?php echo $admin_name ?></td></tr>
                <tr><td><b>Koordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
					  </tbody>
				  </table>
				  
          <div class="btn-group">
						  <a href="?page=updatemesjidadminlay&id=<?php echo $id ?>" class="btn btn-default" style="color: white"><i class="fa fa-edit"></i>&nbsp Edit Information</a> 
				  </div> <hr style="border: 1px solid #e7e7e7;">
        </div>
    </section>
	</div> <!-- Layout Detail info -->

  <!-- Layout upload foto masjid -->
	<div class="col-sm-6"> 
    <section class="panel">
      <header class="panel-heading">
          <h3 style="font-family: Arial;"> <b>Upload Picture of <?php echo $worship_place_name ?></b></h3>
      </header>
          <div class="panel-body">
            <form role="form" action="act/uploadfotomes.php" enctype="multipart/form-data" method="post">
              <input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="../foto/no.png" alt="" />
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                    <span class="btn btn-theme02 btn-file" style="background-color: #26a69a; border: 1px solid #e7e7e7;">
                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                          <input type="file" class="default" name="image"/>
                    </span>
                    <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash-o"></i> Remove</a>
                  </div>
                </div>
                <span style="color:red;">*Maximum image size 500kb</span>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="background-color: #26a69a; border: 2px solid #e7e7e7;" ><i class="fa fa-upload"></i> Upload</button>
                </div>
            </form>
          </div>
      <header class="panel-heading">
        <h3 style="font-family: Arial;"> <b>Picture of <?php echo $worship_place_name ?></b></h3>
      </header>
        <div class="panel-body">
            <?php $id=$_GET['id'] ?>
              <?php
                $querysearch="SELECT gallery_worship_place FROM worship_place_gallery where id='$id'";
                $hasil=mysqli_query($conn,$querysearch);
                  while($baris = mysqli_fetch_array($hasil))
                    {
                      //echo $baris['gallery_culinary'];
              ?>
              <image src="../foto/<?php echo $baris['gallery_worship_place']; ?>" style="width:10%;">
            <?php
                    }
            ?>
        </div>
    </section>
  </div>
  </div>

  <div class="row">
  <!-- upload video -->
  <div class="col-sm-6">      
    <section class="panel">
    	<header class="panel-heading">
    		<h3 style="font-family: Arial;"><b>Upload Video of <?php echo $worship_place_name ?></b></h3>
    	</header>
    			<div class="panel-body">
    				<form role="form" action="act/uploadvideo.php" enctype="multipart/form-data" method="post">
    				  <div class="box-body">
    						<input type="text" class="form-control hidden" name="id_videos" value="<?php echo $id ?>">
    							<div class="form-group">
    					 			<input type="file" class="" style="background:none;border:none;" name="file_video" required>
    							</div>
    							<span style="color:red; font-size: 13px;">*Maximum image size 50mb</span>
    				  </div><!-- /.box-body -->
    					<div class="box-footer">
    					    <button type="submit" class="btn btn-primary" style="background-color:#26a69a; border: 2px solid #e7e7e7;"><i class="fa fa-upload"></i> Upload</button> <hr style="border: 1px solid #e7e7e7;">
    					</div>
    				</form>
    			</div>
    </section>
  </div>

  <!-- Tampil video -->
  <!-- <div class="col-sm-6">
    <section class="panel">
      <header class="panel-heading">
				<h3> Videos of <b><?php echo $worship_place_name ?></b></h3>
			</header>
            <div class="panel-body">
              <div class="btn-group">
                <button class="btn btn-theme btn-block" style="background:#26a69a;border-color:white; width:385%;" data-toggle='collapse' href='#vid' onclick='' title='Play Video' aria-controls='Nearby'>
                  <i class="fa fa-play"> PLAY VIDEOS</i>
                </button>
              </div> <br><br>
              <div class='collapse' id='vid'>
                <div class="html5gallery" data-html5player="true" data-width="464" data-height="272" data-src="" data-webm="" data-title="Big Buck Bunny">
                  <?php
                  $querysearch  ="SELECT a.id, b.video_worship FROM worship_place as a left join worship_place_video as b on a.id=b.id where a.id='$id'";
                  $hasil=mysqli_query($conn, $querysearch);
                  while($baris = mysqli_fetch_assoc($hasil)){
                    if(($baris['video_worship']=='-')||($baris['video_worship']=='')){
                      echo "<a href='../../video/novideo.mp4'><img src='../../video/novideo.mp4' ></a>";
                    }
                    else{
                      echo "<a href='../../video/".$baris['video_worship']."'><img src='../../video/".$baris['video_worship']."'></a>";
                    }
                  }
                  ?>
                </div>
              </div>
          </section>
  </div> -->

  <!-- Tampil video -->
  <div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading">
				<h3> Videos of <b><?php echo $worship_place_name ?></b></h3>
			</header>
				  <div class="panel-body">
				    <div class="text-center">
	            <video id="vids" controls style="width: 300px; border-color:white; max-height: 250px;">
		            <?php
		              $querysearch = "SELECT id, video_worship FROM worship_place_video where id = '$id'";

		              $hasil = mysqli_query($conn, $querysearch);   
		              $xx = 0;

		              while($baris = mysqli_fetch_array($hasil))
		                {
		                  $nilai = $baris['video_worship'];
		                  $xx++;
		            ?>
		            
                <source src="../../masjid_pdg/video/<?php echo $nilai; ?>" type="video/mp4">
		              <?php
		                }
		                  if($xx==0){
		                                  
		                    ?>
		                      <source src="../../masjid_pdg/video/novideo.mp4" type="video/mp4" >
		                    <?php
		                  }
		                    ?>
	            </video>
            </div>
				  </div>				  					  
		</section>
	</div>
</div>

  