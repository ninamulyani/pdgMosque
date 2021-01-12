<?php 
    session_start();
    error_reporting (E_ALL ^ E_NOTICE);
    //$username = $_SESSION['username'];
    $id_c = $_SESSION['id'];
    $city = $_SESSION['name'];
 ?>

<!DOCTYPE html>
<html lang="en">
  
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Website untuk pengembangan tempat ibadah Kota Padang">
        <meta name="author" content="Nina">
        <meta name="keyword" content="Mosque, SI Unand, Unand">

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

        <title>About Mosque</title>

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style-responsive.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/js/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="assets/js/mystyle.css">
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css">
        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
        <link rel="stylesheet" type="text/css" href="icon/icomoon/styles.css">
        <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179163808-4"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-179163808-4');
        </script>
        <!-- TOMBOL PRINT (FLOATING BUTTON) -->
        <style type="text/css">
            .act-btn
            {
                background: #2ab934;
                display: block;
                width: 50px;
                height: 50px;
                line-height: 50px;
                text-align: center;
                color: white;
                font-size: 30px;
                font-weight: bold;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                text-decoration: none;
                transition: ease all 0.3s;
                position: fixed;
                right: 30px;
                bottom:30px;
            }
            .act-btn:hover{background: #ca2222}
        </style>

        <style>
            .responsive {
              width: 100%;
              height: auto;
            }
        </style>
    </head>
    <body>
    <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M27NPG2"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
    <!-- End Google Tag Manager (noscript) -->
        <section id="container" >
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="index.php" class="logo" style="font-family: arial; font-size: 19px"><b>WEBGIS</b> • About <?php echo $city;?> Mosque</a>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li>
                            <div id="loader" style="display:none"></div>
                        </li>
                        <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
                        <li class="nav pull-right top-menu"></li>
                    </ul>
                </div>
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
                    <div class="panel">
                      <div class="panel-body" id="panelPrint" style="margin: 20px">  
                        <h2 style="color: #26a69a; font-family: arial"><i class="fa fa-info-circle"></i><b> About Mosque</b></h2>
                        <br>
                          <div class="box-body">
                            <h4 style="color: #26a69a; font-family: arial; font-size: 20px"><b> <?php echo $city; ?> Mosque</b></h4>
                              <?php 
                                  if ($id_c == 'CT01') {
                              ?>
                                  <p style="text-align: justify;"> 
                                   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <b>Padang City</b> is the capital city of West Sumatra Province which is located on the west coast of Sumatra Island, which is located between 0 ° 44'00 "–1 ° 08'35" South Latitude and 100 ° 05'05 "–100 ° 34'09" East Longitude. The area of Padang City is 694.96 km2, or 1.65% of the area of West Sumatra Province (Diskominfo Padang City, 2017), which consists of 11 sub-districts, with a population of 833,562 people (Central Statistics Agency, 2010). 
                                    <br>
                                    <br>
                                   <p>
                                   In Padang City, there are currently 664 mosques and 677 prayer rooms spread across eleven sub-districts and registered in the Mosque Information System (SIMAS) issued by the Ministry of Religion of the Republic of Indonesia. Recommendations for mosques in Padang City are divided into tourist mosques, grand mosques, historical mosques, and recommended mosques located around tourist attractions in Padang City.</p>
                                   </p> 
                              <?php
                                   } elseif ($id_c == 'CT02') {
                              ?>
                                   <p style="text-align: justify;"> 
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    One of the tourist cities in West Sumatra is Bukittinggi. Bukittinggi was designated as a tourist city and at the same time a tourist destination city for the province of West Sumatra on March 11, 1984. Bukittinggi was declared a tourist city and major tourist destination in West Sumatra. Then in October 1987 it was designated as a West Sumatra Province Tourism Development area with Perda Number: 25 of 1987.
                                    <br>
                                    <br>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    In the city of Bukittinggi, currently there are 45 mosques and 141 prayer rooms registered in the Mosque Information System (SIMAS) issued by the Ministry of Religion of the Republic of Indonesia.Bukittinggi has many potential tourist attractions. Tourism objects consist of natural, cultural and artificial tourism objects. In supporting tourism, Bukittinggi provides adequate accommodation facilities such as places of worship, restaurants and culinary places, star hotels with complete capacities and facilities, transportation accommodation in the form of city transportation, and typical souvenirs of the City of Bukittinggi.
                                   </p> 
                               <?php
                                    }
                               ?>                                     
                               <br>
                               <?php 
                                   if ($id_c == 'CT01') {
                               ?>
                                    <img src="assets/img/masjid raya sumbar.jpeg" style="max-width: 350px; align: center;" class="responsive"><br>
                                      <caption >Mosque in Padang City</caption> <br>
                                        <?php
                                            } elseif ($id_c == 'CT02') {
                                        ?>
                                    <img src="assets/img/masjid-bukit.JPG" style="max-width: 350px; align: center;" class="responsive"> <br>
                                      <caption>Mosque in Bukittinggi City</caption> <br>
                                        <?php
                                            }
                                        ?>
                                    <br>

                           <!-- LIST RECOMMENDATION mosque -->
                           <div class="box-body">
                             <div class="form-group">
                                <h4 style="color: #26a69a; font-family: arial; font-size: 20px"><b>Mosque Recommendation in <?php echo $city;?> City</b></h4>
                                  <p style="text-align: justify;">
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    The following are places of worship that have been recommended by the local government as the manager of this place of worship application. The recommended places of worship are a direct assessment of the government through several appropriate stages and parameters, so that recommendations are obtained from places of worship.
                                    <br>
                                    <br>
                                    Here is a list of recommended places of worship:
                                  </p>

                                  <!-- select type rekomendasi masjid -->
                                    <div class="form-group">
                                    <label for="type_worship">Select Type: </label> <br>
                                        <select name="type_worship" id="type_worship" class="form-control" onchange="getType()" style="width: 25%; ">
                                        <?php  
                                            include("connect.php");
                                            $sql = mysqli_query($conn, "select worship_place.address, worship_place_type.id_type, worship_place_type.name as type, detail_worship_type.status from worship_place join detail_worship_type on worship_place.id=detail_worship_type.id join worship_place_type 
                                            on detail_worship_type.id_type=worship_place_type.id_type, city 
                                            WHERE city.id = '$id_c' AND ST_CONTAINS(city.geom, worship_place.geom) 
                                            group by worship_place_type.name order by worship_place.id ASC");
                                        ?>
                                            <option value="x">- All -</option>";
                                            <?php 
                                                include("connect.php");    
                                                while($row_type = mysqli_fetch_assoc($sql))
                                                {
                                                $id_t = $row_type['id_type'];
                                                $name_t = $row_type['type'];
                                                $address = $row_type['address'];
                                                $status = $row_type['status'];
                                            ?>
                                            <option value="<?php echo $id_t ?>"><?php echo $name_t ?></option>";
                                            <?php
                                                }
                                            ?>                  
                                        </select>
                                    </div>
                                    
                                    <!-- Tampil list masjid rekomendasi -->
                                    <div class="box-body">
                                      <div class="form-group">
                                        <table id="example2" class="table table-hover table-bordered table-striped">
                                         <thead>
                                            <tr>
                                            <th style="width: 7%; text-align: center;">No</th>
                                            <th style="width: 20%; text-align: center;">Name</th>
                                            <th style="width: 45%; text-align: center;">Address</th>
                                            <th style="width: 18%; text-align: center;">Type Mosque</th>
                                            <th style="width: 10%; text-align: center;">Recommendation</th>
                                            </tr>
                                         </thead>
                                          <tbody id="unix">
                                        <?php                    
                                            $sql = mysqli_query($conn, "select worship_place.id, worship_place.address, worship_place.name as worship, worship_place_type.name as type, detail_worship_type.status 
                                            from worship_place join detail_worship_type 
                                                        on worship_place.id=detail_worship_type.id join worship_place_type 
                                                        on detail_worship_type.id_type=worship_place_type.id_type, city 
                                                        WHERE city.id = '$id_c' AND ST_CONTAINS(city.geom, worship_place.geom) AND detail_worship_type.status != '0'
                                                        order by detail_worship_type.status ASC");
                                            
                                            $i = 1;
                                            while($data =  mysqli_fetch_array($sql))
                                            {
                                                $id   = $data['id'];
                                                $name = $data['worship'];
                                                $address = $data['address'];
                                                $type = $data['type'];
                                                $status = $data['status'];
                                                if ($status == 1) 
                                                {
                                                    $color = '#4284f5';
                                                }
                                                elseif ($status == 2) {
                                                    $color = 'green';
                                                }
                                                elseif ($status == 3) {
                                                    $color = 'Yellow';
                                                }
                                                elseif ($status == 4) {
                                                    $color = 'Orange';
                                                }
                                                elseif ($status == 5) {
                                                    $color = 'Red';
                                                }
                                        ?>
                                        
                                          <tr>
                                            <td style="text-align: center;"><?php echo "$i"; ?></td>
                                            <td><?php echo "$name"; ?></td>
                                            <td><?php echo "$address"; ?></td>
                                            <td><?php echo "$type"; ?></td>
                                            <td style="text-align: center; background-color: <?php echo $color;?>;"><?php echo "$status"; ?></td>
                                          </tr>
                                        <?php 
                                            $i++;
                                          } 
                                        ?>
                                         </tbody>    
                                        </table>
                                      </div>                   
                                    </div>
                                    
                                    <!-- js ambil data tipe rekomendasi masjid -->
                                    <script>
                                    function getType() 
                                    {
                                        $('#unix').empty();
                                        var id_rekom = document.getElementById("type_worship").value;
                                        var pages = "http://localhost/pdgMosque/masjid_pdg/";
                                        $.ajax({url: pages+'worship_typerec_about.php?id_type='+id_rekom, data: "", dataType: 'json', success: function(rows)
                                        {
                                            
                                            for (var i in rows)
                                            { 
                                            var row = rows[i];
                                            var id = row.id;
                                            var worship = row.worship;
                                            var type = row.type;
                                            var address = row.address;
                                            var status = row.status;
                                            var color = row.color;
                                            var no = row.no;                                           
                                            
                                            console.log(worship);
                                            // $('#unix').show();
                                            $('#unix').append(
                                                "<tr><td>"+no+"</td><td>"+worship+"</td><td>"+address+"</td><td>"+type+"</td><td style='text-align: center; background-color:"+color+";'>"+status+"</td></tr>");
                                            }//end for  
                                        } //end function     
                                        });//end ajax 
                                    }
                                    </script>
                               </div> <br> <br>
                               <div class="form-group">
                                <h4 style="color: #26a69a; font-family: arial; font-size: 20px"><b>Top Recommendation of <?php echo $city;?> Mosque</b></h4>
                                 <?php 
                                   if ($id_c == 'CT01') {
                                 ?>
                                 <p style="text-align: justify;">
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    One of the mosques that has become an icon for the city of Padang is the <b>Grand Mosque of West Sumatra</b>, which is the largest mosque in West Sumatra which is located on Jalan Khatib Sulaiman, North Padang District, Padang City. This mosque was completed on January 4, 2019 with a capacity of around 5,000–6,000 worshipers.
                                 </p> <br>
                                 <img src="assets/img/masjid raya sumbar.jpeg" style="max-width: 350px; align: center;" class="responsive"><br>
                                      <caption >Mosque in Padang City</caption> <br>
                                 <?php
                                     } elseif ($id_c == 'CT02') {
                                 ?>
                                 <p style="text-align: justify;">
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    ini penjelasan ttg masjid populer yah !
                                    
                                 </p> <br>
                                 <img src="assets/img/masjid-bukit.JPG" style="max-width: 350px; align: center;" class="responsive"> <br>
                                      <caption>Mosque in Bukittinggi City</caption> <br>
                                <?php
                                    }
                                ?>
                                    
                               </div>                
                           </div>              
                           </div>
                          <br>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </section>    
            </section>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <!-- <script type="text/javascript" src="html5gallery/html5gallery.js"></script> -->
        <script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js" class="include"></script>
        <script type="text/javascript" src="assets/js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="assets/js/jquery.sparkline.js"></script>
        <script type="text/javascript" src="assets/js/common-scripts.js"></script>
        <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

        <script type="text/javascript">
            $(function() {
                //fancybox
                jQuery(".fancybox").fancybox();
            });
        </script>

        <script type="text/javascript">
            function printDiv(divName) 
            {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

        <!-- TOMBOL PRINT (FLOATING BUTTON) -->
        <a onclick="printDiv('panelPrint')" title="Print" style="color: white; background-color: #26a69a;" class="act-btn"> 
            <i class="icon-printer" style="color: white;"></i>
        </a>    
    </body>
</html>