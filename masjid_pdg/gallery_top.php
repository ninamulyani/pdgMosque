<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
$city = $_SESSION['id'];
?>

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

            $sqlname=mysqli_query($conn,"SELECT name FROM worship_place where id='$id'");
            while ($row = mysqli_fetch_array($sqlname))
            {
              $nama=$row['name'];
            ?>
          <title><?php echo "$nama"?> Padang Mosque</title>
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
      <!-- <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script> -->
      <script src="https://maps.google.com/maps/api/js?key=AIzaSyDgclrR8QqACLDYcgLjsLd1RIZV9-V8Bpc"></script>
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
  <body onload="init();masjidGallery('<?php echo $_GET['idgallery'] ?>');" >
              <!-- MEMPERCEPAT LOAD PAGE -->
    <script type='text/javascript'>
        //<![CDATA[
        (function(a){a.fn.lazyload=function(b){var c={threshold:0,failurelimit:0,event:"scroll",effect:"show",container:window};if(b){a.extend(c,b)}var d=this;if("scroll"==c.event){a(c.container).bind("scroll",function(b){var e=0;d.each(function(){if(a.abovethetop(this,c)||a.leftofbegin(this,c)){}else if(!a.belowthefold(this,c)&&!a.rightoffold(this,c)){a(this).trigger("appear")}else{if(e++>c.failurelimit){return false}}});var f=a.grep(d,function(a){return!a.loaded});d=a(f)})}this.each(function(){var b=this;if(undefined==a(b).attr("original")){a(b).attr("original",a(b).attr("src"))}if("scroll"!=c.event||undefined==a(b).attr("src")||c.placeholder==a(b).attr("src")||a.abovethetop(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.rightoffold(b,c))

        {if(c.placeholder){a(b).attr("src",c.placeholder)}else{a(b).removeAttr("src")}b.loaded=false}else{b.loaded=true}a(b).one("appear",function(){if(!this.loaded){a("<img />").bind("load",function(){a(b).hide().attr("src",a(b).attr("original"))[c.effect](c.effectspeed);b.loaded=true}).attr("src",a(b).attr("original"))}});if("scroll"!=c.event){a(b).bind(c.event,function(c){if(!b.loaded){a(b).trigger("appear")}})}});a(c.container).trigger(c.event);return this};a.belowthefold=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).height()+a(window).scrollTop()}else{var d=a(c.container).offset().top+a(c.container).height()}return d<=a(b).offset().top-c.threshold};a.rightoffold=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).width()+a(window).scrollLeft()}else{var d=a(c.container).offset().left+a(c.container).width()}return d<=a(b).offset().left-c.threshold};a.abovethetop=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).scrollTop()}else{var d=a(c.container).offset().top}return d>=a(b).offset().top+c.threshold+a(b).height()};a.leftofbegin=function(b,c){if(c.container===undefined||c.container===window){var d=a(window).scrollLeft()}else{var d=a(c.container).offset().left}return d>=a(b).offset().left+c.threshold+a(b).width()};a.extend(a.expr[":"],{"below-the-fold":"$.belowthefold(a, {threshold : 0, container: window})","above-the-fold":"!$.belowthefold(a, {threshold : 0, container: window})","right-of-fold":"$.rightoffold(a, {threshold : 0, container: window})","left-of-fold":"!$.rightoffold(a, {threshold : 0, container: window})"})})(jQuery);$(function(){$("img").lazyload({placeholder:"https://unand.ac.id/",effect:"fadeIn",threshold:"-50"})});
        //]]>
    </script>
   <!-- END MEMPERCEPAT LOAD PAGE -->


              
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M27NPG2"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
  <!-- End Google Tag Manager (noscript) -->
    <input type="hidden" id="cityName" value="<?php echo $city; ?>">
    
    <section id="container" >
      <header class="header black-bg">
        <a class="logo" style="font-family: Arial"><i class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></i>&nbsp&nbsp<b>WEB</b><b>GIS •</b> Detail Mosque </a>
        <a href="admin/login.php" class="btn btn-default" title="Login" style="margin-top: 10px; background-color: #26a69a; font-size: 14px; color:white; font-family: arial; float: right;"><i class='icon-enter6'></i>&nbsp<b>LOGIN</b></a>
      </header>
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <ul class="sidebar-menu" id="nav-accordion">
            <!-- <p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p> -->
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
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"> <b> &nbsp Mosque Information</b></h2>
                    </header> 
                    <div class="text-center">
                      <?php
                        //MENGITUNG RATA-RATA RATING MASJID
                        require 'connect.php';
                        $id = $_GET["idgallery"];

                        // Query membulatkan rata" ke bawah (floor) / keatas (ceiling)
                        // $querysearch ="SELECT id_worship AS id, count(*) as review, floor(AVG(rating)) AS rating FROM review where id_worship='$id'";

                        $querysearch ="SELECT id_worship AS id, count(*) as review, AVG(rating) AS rating FROM review where id_worship='$id'";
                                 
                        $result=mysqli_query($conn, $querysearch);
                        while($row = mysqli_fetch_array($result))
                        {
                          $id_worship=$row['id'];
                          $rating=$row['rating'];
                          $review=$row['review'];

                          $dataarray[]=array('id'=>$id_worship, 'rating'=>$rating,'review'=>$review);
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
                        $sql = "select worship_place.id, worship_place.name, address, land_size, building_size,  
                        park_area_size, capacity, est, last_renovation, imam, jamaah, teenager, category_worship_place.name as name_category
                        from worship_place left join category_worship_place on category_worship_place.id=worship_place.id_category 
                        where worship_place.id='$id' ";
                        
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
                                <tr><td><b>Capacity</b></td><td>:</td><td><?= $rows['capacity'] ?></td></tr>
                                <tr><td><b>Land Size</b></td><td>:</td><td><?= $rows['land_size'] ?></td></tr>
                                <tr><td><b>Building Size</b></td><td>:</td><td><?= $rows['building_size'] ?></td></tr>
                                <tr><td><b>Park Area Size</b></td><td>:</td><td><?= $rows['park_area_size'] ?></td></tr>
                                <tr><td><b>Establish</b></td><td>:</td><td><?= $rows['est'] ?></td></tr>
                                <tr><td><b>Last Renovation</b></td><td>:</td><td><?= $rows['last_renovation'] ?></td></tr>
                                <tr><td><b>Imam</b></td><td>:</td><td><?= $rows['imam'] ?></td></tr>
                                <tr><td><b>Jamaah</b></td><td>:</td><td><?= $rows['jamaah'] ?></td></tr>
                                <tr><td><b>Teenager</b></td><td>:</td><td><?= $rows['teenager'] ?></td></tr>
                                <tr><td><b>Category</b></td><td>:</td><td><?= $rows['name_category'] ?></td></tr>
                              </tbody>
                            </table>   
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

                        $sql1 = "SELECT facility.id, facility.name FROM facility 
                                      left join detail_facility on detail_facility.id_facility = facility.id 
                                      left join worship_place on worship_place.id = detail_facility.id_worship_place 
                                      where worship_place.id = '".$id."'  ";     
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

                  <section class="panel"> <!-- Detail Event -->
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b>&nbsp Event</b></h2>
                        <div>                        
                        </div>
                    </header>
                    
                    <?php
                        require 'connect.php';
                        $id=$_GET["idgallery"];

                        $sql2 = "SELECT event.name as event_name, detail_event.id_worship_place,worship_place.name as worship_place_name, detail_event.date, ustad.name as ustad_name, detail_event.description, detail_event.time FROM detail_event 
                        left join event on detail_event.id_event=event.id
                        left join worship_place on detail_event.id_worship_place=worship_place.id 
                        left join ustad on detail_event.id_ustad=ustad.id  
                                  where detail_event.id_worship_place= '".$id."'  ";     
                        $result_keg = mysqli_query($conn, $sql2);                    
                    ?>

                    <div class="panel-body">
                        <div class="box-body">
                          <div class="form-group">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Event</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $nomor = 1;
                              foreach( $result_keg as $data_keg ) 
                                {
                                  echo "<tr><td>".$nomor."</td>
                                          <td>".$data_keg['event_name']."</td>
                                        </tr>";
                                  $nomor++;
                                }
                              ?>
                            </tbody>
                            </table>   
                          </div>
                        </div>
                    </div>

                  </section> <!-- Detail Event -->

                  <section class="panel"> <!-- Detail Review -->
                    <header class="panel-heading">
                      <h2 class="box-title" style="text-transform:capitalize; text-align:center;"><b>&nbsp Visitors Review</b></h2>
                    </header>
                      <?php
                        require 'connect.php';
                        $id = $_GET['idgallery']; 
                        $sqlreview = "SELECT * FROM review where id_worship = '$id'";
                        $result = mysqli_query($conn, $sqlreview);
                        while ($rows = mysqli_fetch_array($result)) 
                        {
                          $rating = $rows['rating'];
                          $tanggal = $rows['tanggal'];
                          $nama = $rows['name'];
                          $komen = $rows['comment'];
                          $id_review = $rows['id_review'];
                      ?>
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="form-group">
                            <table class="table">                                       
                               <tr>
                                    <td>
                                      <div id='star-containerz'> 
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                                        <i style="font-size:24px" class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i> &nbsp;
                                        <a href="" data-target="#review<?php echo  $id_review ?>" data-toggle="modal"  data-toggle="tooltip" title="Update review"><i class='fa fa-pencil'></i></a>
                                        
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
                            </table>                                  
                          </div>
                        </div>
                      </div>
                      
                      <!-- modal update review-->
                      <div class="modal fade" id="review<?php echo  $id_review?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <table>
                                      <thead>
                                        <tr>
                                          <td style="width: 550px;"><h5 class="modal-title" id="exampleModalLabel">Update Your Rating and Review</h5></td>
                                          <td><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></td>
                                        </tr>
                                      </thead>
                                    </table>
                                  </div>
                                  <div class="modal-body">
                                   <form role="form" name="formAdd" method="get" action="update_comment.php" >
                                   <?php
                                      require 'connect.php';
                                      $id = $_GET['idgallery']; 
                                      $resulteditrev = mysqli_query($conn, "SELECT * FROM review where  id_review= '$id_review'");
                                      while ($rowsja = mysqli_fetch_assoc($resulteditrev)){
                                    ?>   
                                   <div class="form-group mb-3">
                                        <input type="hidden" name="id_worship_place" value="<?php echo $id?>" >
                                        <input type="hidden" name="id_review" value="<?php echo $rowsja['id_review']?>" >
                                      </div>
                                      
                                      <div>
                                        <label> Rating </label>
                                          <input type="text name='gidr'" id='gidr' value='' hidden=''>
                                            <div id='star-containerz'>
                                              <i class='fa fa-star star2 <?php echo $rating >= 1 ? 'star-checked' : ''; ?>' id='star2-1'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 2 ? 'star-checked' : ''; ?>' id='star2-2'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 3 ? 'star-checked' : ''; ?>' id='star2-3'></i>
                                              <i class='fa fa-star star2 <?php echo $rating >= 4 ? 'star-checked' : ''; ?>' id='star2-4'></i>
                                              <i class='fa fa-star star2 <?php echo $rating == 5 ? 'star-checked' : ''; ?>' id='star2-5'></i>
                                            </div>
                                            <input type='text' name='rateids' id='rateids' value='<?= $rating?>' hidden=''>
                                            <br>
                                        </div>
                                      <div class="form-group mb-3">
                                        <label>Name</label>
                                          <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $rowsja['name'] ?>" readonly="">
                                      </div>

                                      <div class="form-group mb-3">
                                        <label>Review</label>
                                        <input type="textarea" cols='30' rows='5' name='comment' class="form-control" value="<?php echo $rowsja['comment'] ?>">
                                      </div>

                                      <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit" id="update"><i class="fa fa-pencil"></i> Post</button>
                                      </div>
                                      <?php
                                       }
                                      ?>

                                    </form>
                                  </div>
                                </div>
                            </div>
                      </div>
                    <?php
                        }
                      ?> 
                  </section> <!-- Detail Review -->
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-12"> <!-- gallery masjid -->
                      <section class="panel">
                        <div class="panel-body">
                          <header>
                            <h2 class="box-title" style="text-transform:capitalize; text-align: center;"> <b>Gallery</b></h2>
                          </header>
                            <div class="content" style="text-align:center;">
                              <div class="html5gallery" style="max-height:700px; overflow:auto;" data-skin="gallery" data-width="470" data-height="250" data-resizemode="fit">  
                              
                                <?php
                                  require ('connect.php');

                                  $id = $_GET["idgallery"];                               
                                  if (strpos($id,"M") !== false) {  

                                    $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                                    $hasil=mysqli_query($conn, $querysearch);
                                    while($baris = mysqli_fetch_array($hasil))
                                    {
                                      if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']==''))
                                      {
                                          echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                                      }
                                      else
                                      {
                                      echo "<a href='foto/".$baris['gallery_worship_place']."'><img src='foto/".$baris['gallery_worship_place']."'></a>";
                                      }
                                    }
                                  }
                                ?> <br>                                    
                              </div>
                            </div>
                            <br>
                            <!-- video masjid -->
                            <div class="text-center">
                              <a data-href="" title="Videos" data-toggle="modal" data-target="#play-videos" class="btn btn-compose" style=" color: white; height: 40px; width: 100%; max-width: 450px; padding: 2px" onclick="playVids()" ><i class="fa fa-play"></i>PLAY VIDEOS</a>
                                
                              <div class="modal fade" id="play-videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 800px;">
                                  <div class="modal-content">
                                    <div style="background-color: " class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" onclick="pauseVids()">&times;</button>
                                      <h4 style="color: white; text-align: left; font-size: 20px;">Videos of<b> <?php echo $id; ?></b></h4>
                                    </div>

                                    <div class="modal-body">
                                      <video id="vids" controls style="width: 640px">
                                        <?php
                                          $querysearch = "SELECT video_worship FROM worship_place_video where id = '$id'";

                                          $hasil = mysqli_query($conn, $querysearch);   
                                          $xx = 0;

                                          while($baris = mysqli_fetch_array($hasil))
                                          {
                                            $nilai = $baris['video_worship'];
                                            $xx++;
                                          ?>
                                          <source src="video/<?php echo $nilai; ?>" type="video/mp4">
                                          <?php
                                          }
                                          if($xx==0){
                                            
                                          ?>
                                            <source src="video/novideo.mp4" type="video/mp4" >
                                          <?php
                                          }
                                            echo "$nilai";
                                        ?>
                                      </video>
                                        <!-- <iframe width="640" height="480" 
                                        src="https://www.youtube.com/embed/7-BbAx4fgCY?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #26a69a; color: white;" onclick="pauseVids()"><b>Close</b></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> <!-- video masjid -->
                        </div>
                      </section>
                    </div>

                    <div class="col-sm-12"> <!-- RATING & REVIEW -->
                      <section class="panel">
                        <div class="panel-body">
                          <header>
                            <h2 class="box-title" style="text-transform:capitalize; text-align: center;"> <b>Rating & Review</b></h2>
                          </header>
                            <form method="POST" action="insert_comment.php">
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
                          <input type="hidden" id="cityName" value="<?php echo $city; ?>">                      
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
            if (strpos($id,"H") !== false) {  //Hotel
                $querysearch  ="SELECT a.id, b.gallery_hotel FROM hotel as a left join hotel_gallery as b on a.id=b.id where a.id='$id' ";       
                $hasil=mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_assoc($hasil)){
                            if(($baris['gallery_hotel']=='-')||($baris['gallery_hotel']=='')){
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_hotel']."'><img style='width:100%' src='foto/".$baris['gallery_hotel']."'></a>";
                            }
                          }
            } elseif (strpos($id,"TM") !== false) {  //Tourism

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
                              echo "<a href='foto/foto.jpg'><img src='foto/foto.jpg' ></a>";
                            }
                            else{
                              echo "<a href='foto/".$baris['gallery_souvenir']."'><img style='width:100%' src='foto/".$baris['gallery_souvenir']."'></a>";
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
 
                //echo "<script language='javascript'>alert('$querysearch');</script>";   
                
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
      $(':radio').change(function() {
        $('#nilai').val(this.value);
        $('#form_rating').submit();
      });

        $(function() {
          //    fancybox
            jQuery(".fancybox").fancybox();
        });
    </script>

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

      //memilih rating add review update
      $('.star2').click(function(){

        //get the id of star
        var star_id = $(this).attr('id');
        var star_index = $(this).attr("id").split("-")[1];
        $("#rateids").val(star_index);
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

    <script type="text/javascript"> // TOURISM VIDEO
      var vid = document.getElementById("vids"); 
      function playVids() { 
        vid.play(); 
      } 

      function pauseVids() { 
        vid.pause(); 
      } 
    </script>

	  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
    </script>
  </body>
</html>
