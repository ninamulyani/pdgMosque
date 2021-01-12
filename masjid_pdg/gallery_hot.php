<!DOCTYPE html>
<html lang="en">

  <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-M27NPG2');
      </script>
      <!-- End Google Tag Manager -->
      <!-- Google Analytics -->
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-179163808-4', 'auto');
        ga('send', 'pageview');
      </script>
      <!-- End Google Analytics -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <div>
          <?php
            require 'connect.php';

            $id=$_GET["idgallery"];

            $sqlname=mysqli_query($conn,"SELECT name FROM hotel where id='$id'");
            while ($row = mysqli_fetch_array($sqlname))
            {
              $nama=$row['name'];
            ?>
          <title><?php echo "$nama"?> Padang Hotel</title>
          <?php }?>
        </div>
      <!-- <title>Masjid Finder</title> -->

      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
      <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
      <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/icomoon/styles.css" rel="stylesheet">
      <link href="assets/js/mystyle.css" rel="stylesheet">
      <link href="assets/css/style-responsive.css" rel="stylesheet">
      <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANIx4N48kL_YEfp-fVeWmJ_3MSItIP8eI&sensor=true"></script> -->
      <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>
      <script src="script.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179163808-4"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-179163808-4');
      </script>

  </head>
  <body onload="init();detailhotel('<?php echo $_GET["idgallery"] ?>');" > 
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M27NPG2"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <section id="container" >
      <header class="header black-bg">
        <a class="logo" style="font-family: Arial"><i class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></i>&nbsp&nbsp<b>WEB</b><b>GIS •</b> Detail Hotel</a>
        <a href="admin/login.php" class="btn btn-default" title="Login" style="margin-top: 10px; background-color: #26a69a; font-size: 14px; color:white; font-family: arial; float: right;"><i class='icon-enter6'></i>&nbsp<b>LOGIN</b></a>
      </header>
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">
              <li class="sub-menu">
                <a href="index.php">
                    <i class="fa fa-chevron-circle-left"></i>
                    <span>Back To Home</span>
                </a>
              </li>
  				</ul>
        </div>
      </aside>
      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row">
            <div class="col-lg-12 main-chart"> 
                <div class="col-sm-6"> 
                  <section class="panel"> <!-- information -->
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b> &nbsp Hotel Information</b></h2>
                    </header>    
                    <div class="text-center">
                      <?php
                        //MENGITUNG RATA-RATA RATING MASJID
                        require 'connect.php';
                        $id = $_GET["idgallery"];

                        $querysearch ="SELECT id_hotel AS id, count(*) as review, AVG(rating) AS rating FROM review where id_hotel='$id'";
                                 
                        $result=mysqli_query($conn, $querysearch);
                        while($row = mysqli_fetch_array($result))
                        {
                          $id_hotel=$row['id'];
                          $rating=$row['rating'];
                          $review=$row['review'];

                          $dataarray[]=array('id'=>$id_hotel, 'rating'=>$rating,'review'=>$review);
                        }
                        // echo json_encode ($dataarray);
                        // echo $rating;
                        ?>
                        <div id='star-containerz' style="font-size: 16px"> 
                          <?php 
                            if ($rating == 5 || $rating == 4 || $rating == 3 || $rating == 2 || $rating == 1) {
                              echo $rating.'.0 &nbsp';
                            }else{
                              echo substr($rating, 0,3).'&nbsp';
                            }

                           ?>
                          <i class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                          <i class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                          <i class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                          <i class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                          <i class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i>
                        </div>    
                    </div>               
                   
                      <?php
                        require 'connect.php';

                        $id=$_GET["idgallery"];
                        $sql = "SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel.id_type, hotel.username, hotel_type.name as type
                        FROM hotel LEFT JOIN hotel_type ON hotel.id_type = hotel_type.id
                        WHERE hotel.id = '$id' ";
                        
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_assoc($result);
                        
                      ?>
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="form-group">
                            <table class="table">
                              <tbody id="bodi" style='vertical-align:top;'>
                                <tr><td><b>Name</b></td><td>:</td><td><?=$rows['name']?></td></tr>
                                <tr><td><b>Address</b></td><td>:</td><td><?= $rows['address']?></td></tr>
                                <tr><td><b>Contact</b></td><td>:</td><td><?= $rows['cp']?></td></tr>
                                <tr><td><b>Class</b></td><td>:</td><td><?= $rows['type']?></td></tr>
                                <tr><td><b>Mushalla</b></td><td>:</td><td>
                                    <?php
                                    $mushalla = $rows['name'];
                                        if($mushalla == 0){
                                        echo "-";
                                        }else{
                                        echo "Available";
                                        }
                                    ?>
                                </td></tr>
                                <tr><td><b>Requirement</b></td><td>:</td><td>
                                    <?php
                                    $marriage_book = $rows['marriage_book'];
                                        if($marriage_book == 0){
                                        echo "";
                                        }else{
                                        echo nl2br("Marriage Book \n");
                                        }
                                    ?>
                              
                                    <?php
                                    $ktp = $rows['ktp'];
                                        if($ktp == 0){
                                        echo " ";
                                        }else{
                                        echo "KTP";
                                        }
                                    ?>
                                </td></tr>
                              </tbody>
                            </table>   
                          </div>
                          <div class="form-group">
                            <?php
                                  require 'connect.php';
                                  $id=$_GET["idgallery"];
                                  $sqlcontact=mysqli_query($conn,"SELECT cp FROM hotel where id='$id'");
                                  while ($row = mysqli_fetch_array($sqlcontact))
                                  {
                                  $whatsapp=$row['cp'];
                            ?>
                                  <a href="https://api.whatsapp.com/send?phone=<?php echo "$whatsapp"?>" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png"></a> <br>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                  </section> <!-- information -->

                  <section class="panel"> <!-- Detail Fasilitas -->
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b>&nbsp Facility</b></h2>
                        <div>                        
                        </div>
                    </header>
                    
                    <?php
                      require 'connect.php';
                        $id=$_GET["idgallery"];

                        $sql1 = "SELECT facility_hotel.id, facility_hotel.name 
                        FROM facility_hotel 
                        left join detail_facility_hotel on detail_facility_hotel.id_facility = facility_hotel.id 
                        left join hotel on hotel.id = detail_facility_hotel.id_hotel where hotel.id = '".$id."'  ";     
                        $result_fac = mysqli_query($conn, $sql1);                    
                    ?>

                    <div class="panel-body">
                        <div class="box-body">
                          <div class="form-group">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Facility Name</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $no = 1;
                              foreach( $result_fac as $data_fac )
                                    {
                                              echo "<tr><td>".$no."</td>
                                                    <td>".$data_fac['name']."</td>
                                                    </tr>";
                                              $no++;
                                    }
                              ?>
                            </tbody>
                            </table>   
                          </div>
                        </div>
                    </div>

                  </section> <!-- Detail Fasilitas -->

                  <section class="panel">  
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b>&nbsp Hotel Room</b></h2>
                    </header>
                      <?php
                        require 'connect.php';
                            $id=$_GET["idgallery"];
                            $sql2 = "SELECT room.id_type, room.name, detail_room.price AS price FROM room 
                                     left join detail_room on detail_room.id_room = room.id_type 
                                     left join hotel on hotel.id = detail_room.id_hotel 
                                     where hotel.id = '".$id."' ";

                            $result_room = mysqli_query($conn, $sql2);
                            $rows_room = mysqli_fetch_assoc($result_room);
                      ?>
                        <div class="panel-body">
                          <div class="box-body">
                            <div class="form-group">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Room</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                  <tbody>
                                  <tr><td><?=$rows_room['name']?></td><td><?=$rows_room['price']?></td></tr>
                                  </tbody>               
                              </table>                             
                            </div>
                          </div>
                        </div>
                  </section>

                  <section class="panel"> <!-- Detail Review -->
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b>&nbsp Visitors Review</b></h2>
                    </header>
                      <?php
                        require 'connect.php';
                        $id = $_GET['idgallery']; 
                        $sqlreview = "SELECT * FROM review where id_hotel = '$id' ";
                        $result = mysqli_query($conn, $sqlreview);
                      ?>
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="form-group">
                            <table class="table">                                       
                              <?php  
                                while ($rows = mysqli_fetch_array($result)) 
                                {
                                  $rating = $rows['rating'];
                                  $tanggal = $rows['tanggal'];
                                  $nama = $rows['name'];
                                  $komen = $rows['comment'];
                                  ?>
                                  <tr>
                                    <td>
                                      <div id='star-containerz'> 
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i>
                                      </div> 
                                    </td>
                                  </tr>
                                  <table class="table">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Name</th>
                                  <th>Reviews</th>
                                </tr>
                              </thead>
                                <tbody>
                                  <tr><td><?=$tanggal?></td><td><?=$nama?></td><td><?=$komen?></td></tr>
                                </tbody>
                            </table> 
                                <?php
                                  }
                              ?>               
                            </table>                                  
                          </div>
                        </div>
                      </div>

                  </section> <!-- Detail Review -->

                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-12"> <!-- gallery hotel -->
                      <section class="panel">
                        <div class="panel-body">
                          <header>
                              <h2 class="box-title" style="text-transform:capitalize; text-align: center;"> <b>Gallery</b></h2>
                          </header>
                            <div class="content" style="text-align:center;">
                              <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="horizontal" data-width="470" data-height="250" data-resizemode="fit">  
                              
                                <?php
                                  require ('connect.php');

                                  $id = $_GET["idgallery"];                               
                                  if (strpos($id,"H") !== false) {  

                                    $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";       
                                    $hasil=mysqli_query($conn, $querysearch);
                                    while($baris = mysqli_fetch_array($hasil))
                                    {
                                      if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']==''))
                                      {
                                          echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                                      }
                                      else
                                      {
                                      echo "<a href='foto/hotel/".$baris['gallery_hotel']."'><img src='foto/hotel/".$baris['gallery_hotel']."'></a>";
                                      }
                                    }
                                  }
                                ?> <br>                                    
                              </div>
                            </div>
                        </div>
                      </section>
                    </div>

                    <div class="col-sm-12"> <!-- RATING & REVIEW -->
                      <section class="panel">
                        <div class="panel-body">
                          <header>
                              <h2 class="box-title" style="text-transform:capitalize; text-align: center;"> <b>Rating & Review</b></h2>
                          </header>
                            <form method="POST" action="insert_comment_hot.php">
                             <table id="detgal" class="table">
                              <tbody  style='vertical-align:top;'>
                                <input type="hidden" name="id" value="<?php echo $_GET['idgallery']?>" >
                                  <tr>
                                    <td>
                                      <input type="text" name='gidr' id='gidr' value='' hidden=''> 
                                        <div id='star-containerz'> Rating : &nbsp&nbsp
                                            <i class='fa fa-star star2' style="font-size:24px" id='star2-1'></i>
                                            <i class='fa fa-star star2' style="font-size:24px" id='star2-2'></i>
                                            <i class='fa fa-star star2' style="font-size:24px" id='star2-3'></i>
                                            <i class='fa fa-star star2' style="font-size:24px" id='star2-4'></i>
                                            <i class='fa fa-star star2' style="font-size:24px" id='star2-5'></i>
                                        </div>
                                      <input type='text' name='rateid' id='rateid' value='' hidden=''>
                                      <br> Name <br> <input class='form-control' cols='40' rows='1' name='nama' required="" >
                                      <br> Comment <br> <textarea class='form-control' cols='40' rows='5' name='comment' required></textarea><br>

                                      <input type='submit' name='submit' class='btn btn-default pull-right' style="background-color: #26a69a; color: white" value='Post Comment' >
                                    </td>
                                  </tr>
                              </tbody>          
                             </table>
                            </form>   
                        </div>
                      </section>
                    </div>
                    <div class="col-sm-12"> <!-- small mapping -->
                      <div class="white-panel pns">
                        <header class="panel-heading" style="float:left">
                          <label style="color: black; margin-top:10px; margin-right:20px">Google Map with Location List</label>     
                              <!-- ikon current position -->
                              <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Current Position"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                              <!-- ikon manual position -->
                              <a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title=" Manual Position"><i class="fa fa-map-marker" style="color:white;"></i></a>                                    
                          <label id="tombol">
                          </label>
                        </header>
                          <div class="row">
                            <div class="col-sm-6 col-xs-6"></div>
                          </div>                        
                          <div id="map" class="centered" style="height:260px"></div>
                      </div>   
                    </div>                 
                </div> <!-- gallery -->
            </div>
          </div>
        <!-- </div> -->
        </section>    
      </section>

      <?php
        require 'connect.php';

        $id = $_GET["idgallery"];
            
            if (strpos($id,"TM") !== false) {  //Tourism

                $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_tourism']."'><img style='width:100%' src='foto/".$baris['gallery_tourism']."'></a>";
                            }
                          }
            } elseif (strpos($id,"SO") !== false) {  //Souvenir

                $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']=='')){
                              echo "<a href='foto/souvenir/foto.jpg'><img src='foto/souvenir/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/souvenir/".$baris['gallery_souvenir']."'><img style='width:100%' src='foto/souvenir/".$baris['gallery_souvenir']."'></a>";
                            }
                          }
            } elseif (strpos($id,"RM") !== false) {  //Kuliner

                $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_culinary']."'><img style='width:100%' src='foto/".$baris['gallery_culinary']."'></a>";
                            }
                          }

            } elseif (strpos($id,"M") !== false) {  //Worship

                $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_worship_place']."'><img style='width:100%' src='foto/".$baris['gallery_worship_place']."'></a>";
                            }
                          }

            } elseif (strpos($id,"IK") !== false) {  //Industry

                $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_industry']=='-')||($baris['gallery_industry']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_industry']."'><img style='width:100%' src='foto/".$baris['gallery_industry']."'></a>";
                            }
                          }
            } elseif (strpos($id,"R") !== false) {  //Restoran

                $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_restaurant']."'><img style='width:100%' src='foto/".$baris['gallery_restaurant']."'></a>";
                            }
                          }
            } else {  //Angkot

                $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' ";  

                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_angkot']."'><img style='width:100%' src='foto/".$baris['gallery_angkot']."'></a>";
                            }
                          }
            }
      ?>

      <footer class="site-footer">
        <div class="text-center">
          Nina Mulyani (1611522008) &copy; 2020
              <a href="index.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
        </div>
      </footer>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/fancybox/jquery.fancybox.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <!-- <script src="assets/js/advanced-form-components.js"></script> -->

    <script type="text/javascript">
      var id_cek = 0;
      function r(){
        console.log('tes');
        $('.fa-info').click(function(){
          console.log('hy');
          $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
        });
      }
      $('.star').click(function(){

      //get the id of star
      var star_id = $(this).attr('id');
      var star_index = $(this).attr("id").split("-")[1];
      $("#ratecari").val(star_index);
      switch (star_id){
        case "star-1":
          $("#star-1").addClass('star-checked');
          $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked');
          break;
        case "star-2":
          $("#star-1,#star-2").addClass('star-checked');
          $("#star-3,#star-4,#star-5").removeClass('star-checked');
          break;
        case "star-3":
          $("#star-1,#star-2,#star-3").addClass('star-checked');
          $("#star-4,#star-5").removeClass('star-checked');
          break;
        case "star-4":
          $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked');
          $("#star-5").removeClass('star-checked');
          break;
        case "star-5":
          $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked');
          break;
        }
      });

      //memilih rating add review
      $('.star2').click(function(){

        //get the id of star
        var star_id = $(this).attr('id');
        var star_index = $(this).attr("id").split("-")[1];
        $("#rateid").val(star_index);
        switch (star_id){
          case "star2-1":
            $("#star2-1").addClass('star-checked');
            $("#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
            break;
          case "star2-2":
            $("#star2-1,#star2-2").addClass('star-checked');
            $("#star2-3,#star2-4,#star2-5").removeClass('star-checked');
            break;
          case "star2-3":
            $("#star2-1,#star2-2,#star2-3").addClass('star-checked');
            $("#star2-4,#star2-5").removeClass('star-checked');
            break;
          case "star2-4":
            $("#star2-1,#star2-2,#star2-3,#star2-4").addClass('star-checked');
            $("#star2-5").removeClass('star-checked');
            break;
          case "star2-5":
            $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").addClass('star-checked');
            break;
        }
      });
    </script>

	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
    </script>
  </body>
</html>
