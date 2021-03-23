<?php
  session_start();
  error_reporting (E_ALL ^ E_NOTICE);
?>

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

    <title>Halal Tourism • <?php echo $_SESSION['name'];?></title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	  <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/js/mystyle.css" rel="stylesheet">
    <link href="assets/icomoon/styles.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/datertimepicker.html" />
    <link rel="stylesheet" href="assets/css/bootstrap-slider.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">

    <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyB8B04MTIk7abJDVESr6SUF6f3Hgt1DPAY"></script>  
    
    <!-- <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG7QtGzBlDm1-XtBXWLUtS7h4uoHUBxeg"></script> -->
    <script src="assets/js/chart-master/Chart.js"></script>
	  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179163808-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-179163808-4');
    </script>

    <!-- TOMBOL ADD (FLOATING BUTTON) -->
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

    <!-- CSS Rating -->
	  <style type="text/css">
    
    .rating {
      display: inline-block;
      position: relative;
      height: 40px;
      line-height: 40px;
      font-size: 40px;
    }

    .rating label {
      position: absolute;
      top: 0;
      left: 0;
      height: 70%;
      cursor: pointer;
    }

    .rating label:last-child {
      position: static;
    }

    .rating label:nth-child(1) {
      z-index: 5;
    }

    .rating label:nth-child(2) {
      z-index: 4;
    }

    .rating label:nth-child(3) {
      z-index: 3;
    }

    .rating label:nth-child(4) {
      z-index: 2;
    }

    .rating label:nth-child(5) {
      z-index: 1;
    }

    .rating label input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
    }

    .rating label .icon {
      float: left;
      color: transparent;
    }

    .rating label:last-child .icon {
      color: #000;
    }

    .rating:not(:hover) label input:checked ~ .icon,
    .rating:hover label:hover input ~ .icon {
      color: #ffa31a;
    }

    .rating label input:focus:not(:checked) ~ .icon:last-child {
      color: #000;
      text-shadow: 0 0 5px #ffa31a;
    }
    
    /* CSS legenda */
    #legend {
        background:white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
		    /* font-color: blue; */
        font-family: Arial, sans-serif;
		    opacity: 2.5;
	  }
		.color {
        border: 1px solid;
        height: 12px;
        width: 12px;
        margin-right: 3px;
        float: left;
		}
	  .a {
        background: #FF0000;
        opacity: 0.5;
      }
	  .b {
        background: #ffd777;
        opacity: 0.5;
      }
    .c {
        background: #00b300;
        opacity: 0.5;
      }
	  .d {
        background: #33CCFF;
        opacity: 0.5;
      }
	  .e {
        background: #337AFF;
        opacity: 0.5;
      }
	  .f {
        background: #FF9300;
        opacity: 0.5;
      }
	  .g {
        background: #66FF33;
        opacity: 0.5;
      }
	  .h {
        background: #996600;
        opacity: 0.5;
      }
	  .i {
        background: #FFFF00;
        opacity: 0.5;
      }
	  .j {
        background: #CC0099;
        opacity: 0.5;
      }
	  .k {
        background: #110094;
        opacity: 0.5;
      }
   </style>
  </head>

  <body onload="init();">
        
    <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M27NPG2"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
    <!-- End Google Tag Manager (noscript) -->
    
  <section id="container" >

  <!-- Modal -->
  <div class="modal fade" id="modal_gallery" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="mg_title">Modal Header</h4>
          </div>
          <div class="modal-body" id="mg_body">
            <!--GALERY ====================================================================================================-->
            <div id="view_galery" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 mb">
                <div class="row centered" style="padding:10px">
                  <div class="col-sm-1 col-xs-1"></div>
                    <div id="gal" class="col-sm-10 col-xs-10" style="height:300px;">
                      <div class="w3-content w3-display-container" style="max-height:300px;max-width:600px">
                        <div id="img_gambar"></div>
                          <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                            <div class="col-md-6 col-sm-6 mb">
                              <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                            </div>
                            <div class="col-md-6 col-sm-6 mb">
                              <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                            </div>
                            <div id="span_gambar"></div>
                          </div>
                        </div>
                      </div>
                    <div class="col-sm-1 col-xs-1"></div>
                  </div>
                </div><!-- /col-md-12 -->             
              </div><!-- /row -->   
            <div class="col-md-12 col-sm-12 mb" style="margin-top:10px">
              <p id="mg_text" ></p>
            </div><!-- /col-md-12 -->             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" style="color: white;" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modal_title">Modal Header</h4>
          </div>
          <div class="modal-body" id="modal_body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
      <header class="header black-bg">
            <!-- <a class="logo"><p><img src="assets/ico/111.png" style="font-family: Arial"><b>W</b>EBGIS<b> • Padang Mosque</b></p></a> -->
            <a class="logo" style="font-family: Arial"><i class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></i>&nbsp&nbsp<b>WEB</b><b>GIS •</b> <?php echo $_SESSION['name'];?> Mosque</a>
            <a href="admin/login.php" class="btn btn-default" title="Login" style="margin-top: 10px; background-color: #26a69a; font-size: 14px; color:white; font-family: arial; float: right;"><i class='icon-enter6'></i>&nbsp<b>LOGIN</b></a>

      </header>
        <aside>
          <div id="sidebar"  class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion"> 
              <!-- <p class="centered"><a href="#"><img src="assets/img/logo_wh.jpg" style="border-radius:50%" class="img-circle" width="85"></a></p> -->
              <p class="centered"><a href="#"><img src="assets/img/logo_sidebar.jpeg" style="border-radius:50%" class="img-circle" width="85"></a></p>
              <h5 class="centered">Hello, <?php 
              if ($_SESSION['A'] == true||$_SESSION['P'] == true) {
                echo $_SESSION['username']; 
              }else{
                echo "Visitor";
              }
              
              ?>

              </h5>
                   
                  <li class="sub-menu">
                        <a class="active" onclick="dashboard()" href="./">
                            <i class="fa fa-home"></i>
                            <span>Home</span>
                        </a>
                  </li>

                  <!-- Menu Deskripsi tempat ibadah 'About' -->
                  <li class="sub-menu">
                    <a href="about_mosque.php" onclick="tampil_about()">
                    <i class="fa fa-info-circle"></i>
                          <span>About</span>
                    </a>
                  </li>

                  <!-- Menu daftar tempat ibadah -->
                  <!-- <li class="sub-menu">
                    <a href="javascript:;" onclick="listAngkot(); resultt();">
                    <i class="fa fa-list"></i>
                          <span>List Angkot</span>
                    </a>
                  </li> -->

                  <!-- Menu daftar tempat ibadah -->
                  <li class="sub-menu">
                    <a href="javascript:;" onclick=" resultt(); tampilsemua();">
                    <i class="fa fa-list"></i>
                          <span>List Mosque</span>
                    </a>
                  </li>

                  <!-- Pencarian radius -->
                  <li class="sub-menu">
                    <a href="javascript:;" onclick="resultt(); reset()">
                        <i class="fa fa-compass"></i>
                          <span>Worship Around You</span>
                    </a>
                      <ul class="sub">
                        <div class="sub-menu" id="terdekat">
                            <div class="well">
                              <label><b>Radius&nbsp</b></label>
                              <label style="color:black" id="km"><b>0</b></label>&nbsp<label><b>m</b></label><br>
                                  <input  type="range" onclick="cek();aktifkanRadius()" id="inputradiusmes" name="inputradiusmes" data-highlight="true" min="1" max="30" value="1" >
                            </div>
                        </div>
                        
                      </ul>
                  </li>

                  <!-- Menu pencarian berdasar filter: -->
                  <li class="sub-menu">
                    <a href="javascript:;" onclick="reset(); resultt()">
                          <i class="fa fa-search"></i>
                          <span>Search Worship By</span>
                    </a>

                    <ul class="sub">
                        <!-- Search by name -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-sort-alpha-asc"></i>
                              <span>Name</span>
                          </a>                
                            <ul class="sub">
                                <div  class="panel-body" >
                                  <input type="text" class="form-control" id="carimasjid" name="carimasjid" placeholder="Search..." >
                                    <br>
                                  <button type="submit" class="btn btn-default" value="carimasjid" onclick="carinamamasjid()"> <i class="fa fa-search" style='color: white;'></i></button>
                                </div>
                            </ul>
                        </li>
                        
                        <!-- Search by categories -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-institution "></i>
                              <span>Categories</span>
                          </a>
                            <ul class="sub">
                              <div  class="panel-body" >
                                <select class="form-control" id="id_kategori" >
                                  <?php
                                    include("connect.php");
                                      $kategori=mysqli_query($conn,"select * from category_worship_place ");
                                      while($rowkategori = mysqli_fetch_array($kategori))
                                        {
                                        echo"<option value=".$rowkategori['id'].">".$rowkategori['name']."</option>";
                                        }
                                  ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='carikategori()'><i class="fa fa-search" style='color: white;'></i></button>
                              </div>
                            </ul>
                        </li>

                        <!-- Menu facility -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="resultt(); fasilitas()">
                              <i class="fa fa-tasks"></i>
                              <span>Facility</span>
                          </a>
                          <ul class="sub">
                            <div class="box-body" id="fasilitaslist">
                              <div class="kategori"><h7 style="color :#f3fff4">Choose Facility</h7></div>
                            </div>
                            <button type="submit" class="btn btn-default" id="carifasilitas"  value="fas" onclick='carifasilitas()'><i class="fa fa-search" style='color: white;'></i></button>
                          </ul>
                        </li>

                        <!-- Menu event -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="eventt()" >
                              <i class="fa fa-book"></i>
                              <span>Event</span>
                          </a>
                          <ul class="sub">
                              <li class="sub-menu">
                                <a href="javascript:;" onclick="reset()">
                                    <i class="fa fa-calendar"></i>
                                    <span>Date</span>
                                </a>
                                  <ul class="sub">
                                      <div  class="panel-body" >
                                        <div class="form-group">
                                          <input type="text" class="form-control form-control-inline input-medium default-date-picker" size="16" name="caritgl" id="caritgl" value="">
                                          <button type="submit" class="btn btn-default" value="caritgl" onclick="caritglkeg();resultt()"> <i class="fa fa-search" style='color: white;'></i></button>
                                        </div>
                                      </div>
                                  </ul>
                              </li>
                          </ul>
                        </li>

                        <!-- Search by preacher/ khatib -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-user"></i>
                              <span>Preacher</span>
                          </a>
                            <ul class="sub">
                              <div  class="panel-body" >
                                <select class="form-control" id="idkhatib" >
                                  <?php
                                      session_start();
                                      $city = $_SESSION['id'];
                                      include("connect.php");

                                      $khatib = mysqli_query($conn,"select distinct ustad.id as ustad_id, ustad.name as ustad_name from ustad join detail_event on ustad.id=detail_event.id_ustad
                                      join event on detail_event.id_event = event.id 
                                      join worship_place on detail_event.id_worship_place = worship_place.id, city where city.id ='$city' and st_contains(city.geom, worship_place.geom) and detail_event.id_event in (3, 8, 16) order by ustad.name ASC");
                                      while($rowkhatib = mysqli_fetch_array($khatib))
                                        {
                                        echo"<option value=".$rowkhatib['ustad_id'].">".$rowkhatib['ustad_name']."</option>";
                                        }
                                  ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="cari_khatib"  value="cari" onclick='cariustad()'><i class="fa fa-search" style='color: white;'></i></button>
                              </div>
                            </ul>
                        </li>
                      
                        <!-- Search by transportation -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-car"></i>
                              <span>Transportation access</span>
                          </a>
                            <ul class="sub">
                              <div  class="panel-body" >
                                <select class="form-control" style="width: 90%;" id="pilihkend" >
                                  <option value="bus">Bus</option>
                                  <option value="cars">Cars</option>
                                  <option value="motor">Motorcycle</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='pilihkendaraan()'><i class="fa fa-search" style='color: white;'></i></button>
                              </div>
                            </ul>
                        </li>

                        <!-- Search by public transportation -->
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-taxi"></i>
                              <span>Public Transportation</span>
                          </a>
                            <ul class="sub">
                              <li class="sub-menu">
                                  <a href="javascript:;" onclick="reset()">
                                    <span>Search by Majors</span>
                                  </a>
                                    <select class="form-control" style="width: 90%;" id="jurusan" >
                                      <?php
                                          session_start();
                                          $city = $_SESSION['id'];
                                          include("connect.php");

                                          $angkot=mysqli_query($conn,"select angkot.id as id_angkot, angkot.destination as destinasi from angkot, city where city.id='$city' AND st_contains(city.geom, angkot.geom)");
                                          while($rowangkot = mysqli_fetch_array($angkot))
                                            {
                                            echo"<option value=".$rowangkot['id_angkot'].">".$rowangkot['destinasi']."</option>";
                                            }
                                      ?>
                                    </select>
                                    <br>
                                    <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick="hapusMarkerTerdekat(); tampiljurusan();"><i class="fa fa-search" style='color: white;'></i></button>
                              </li>                 
                              <li class="sub-menu">
                                <a href="javascript:;" onclick="reset()">
                                  <span>Nearby</span>
                                </a>
                                  <label style="color:white" id="km2"><b>0</b></label>&nbsp<label style="color:white"><b>m</b></label><br>
                                    <input  type="range" onclick="cek2(); aktifkanRadiusAngkot();resultt();" id="inputradiusangkot" name="inputradiusangkot" data-highlight="true" min="1" max="30" value="1">
                              </li>
                            </ul>
                        </li>
                    </ul>
                  </li>
                
                <!-- Menu Pencarian rekomendasi -->
                <li class="sub-menu">
                  <a href="javascript:;" onclick="reset(); resultt()">
                        <i class="fa fa-sort-amount-asc"></i>
                        <span>Recommendation by </span>
                  </a>
                    <ul class="sub"> 
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="reset();resultt()">
                              <i class="fa fa-pencil"></i>
                              <span>Choose Object</span>
                          </a>
                            <ul class="sub">
                              <select class="form-control" style="width: 80%;" id="pilihrekom">
                                  <option value="culinary_place">Culinary Place</option>
                                  <option value="tourism">Tourism</option>
                                  <option value="souvenir">Souvenir</option>
                                  <option value="hotel">Hotel</option>
                              </select>
                              <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='pilihobjek()'><i class="fa fa-search" style='color: white;'></i></button>
                            </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="tipetour()">
                              <i class="fa fa-tags"></i>
                              <span>Tour by Type</span>
                          </a>
                            <ul class="sub">
                              <div class="box-body" id="pilihtour">
                                <div class="kategori" style="width: 80%;"><h7 style="color :#f3fff4;">Choose Type</h7></div>
                              </div>
                              <button type="submit" class="btn btn-default" id="caritipetour"  value="tour" onclick='caritourism()'><i class="fa fa-search" style='color: white;'></i></button>
                            </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="restomenu()">
                              <i class="fa fa-book"></i>
                              <span>Rest by Culinary</span>
                          </a>
                            <ul class="sub">
                              <div class="box-body" id="pilihmenu">
                                <div class="kategori" style="width: 80%;"><h7 style="color :#f3fff4">Choose Menu</h7></div>
                              </div>
                              <button type="submit" class="btn btn-default" id="carimenurest"  value="menu" onclick='carimenu()'><i class="fa fa-search" style='color: white;'></i></button>
                            </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="tipesuvenir()">
                              <i class="fa fa-cogs"></i>
                              <span>Souvenir by Type</span>
                          </a>
                            <ul class="sub">
                              <div class="box-body" id="pilihtipe">
                                <div class="kategori" style="width: 80%;"><h7 style="color :#f3fff4">Choose Type</h7></div>
                              </div>
                              <button type="submit" class="btn btn-default" id="caritipe"  value="tipe" onclick='carisuvenir()'><i class="fa fa-search" style='color: white;'></i></button>
                            </ul>
                        </li>
                        <li class="sub-menu">
                          <a href="javascript:;" onclick="tipehotel()">
                              <i class="fa fa-road"></i>
                              <span>Hotel by Class</span>
                          </a>
                            <ul class="sub">
                              <div class="box-body" id="pilihtype">
                                <div class="kategori" style="width: 80%;"><h7 style="color :#f3fff4">Choose Class</h7></div>
                              </div>
                              <button type="submit" class="btn btn-default" id="caritype"  value="type" onclick='carihotel()'><i class="fa fa-search" style='color: white;'></i></button>
                            </ul>
                        </li>
                        <li class="sub-menu"> <!-- order by rate -->
                          <a href="javascript:;" onclick="reset()">
                              <i class="fa fa-star "></i>
                              <span>Order by Rate</span>
                          </a>
                            <ul class="sub">
                              <li class="sub-menu">
                                <a href="javascript:;" onclick="reset()">
                                   <i class="fa fa-sort-alpha-asc"></i>
                                      <span>Sorting Rate</span>
                                </a>
                                  <ul class="sub">
                                    <select class="form-control" style="width: 80%;" id="cari_rate" >
                                      <option value="1">Highest</option>
                                      <option value="2">Lowest</option>
                                    </select>
                                    <br>
                                    <button type="submit" class="btn btn-default" id="carirate"  value="rate" onclick='carirate()'><i class="fa fa-search" style='color: white;'></i></button>
                                  </ul>
                              </li>
                              <li class="sub-menu">
                                <a href="javascript:;" onclick="reset()">
                                    <i class="fa fa-star-half-o"></i>
                                    <span>Choose Rate</span>
                                </a>
                                <ul class="sub">
                                    <div id="star-container" style="font-size: 11pt; color: white">&nbsp
                                      <i class="fa fa-star star" style="font-size:15px" id="star-1"></i>
                                      <i class="fa fa-star star" style="font-size:15px" id="star-2"></i>
                                      <i class="fa fa-star star" style="font-size:15px" id="star-3"></i>
                                      <i class="fa fa-star star" style="font-size:15px" id="star-4"></i>
                                      <i class="fa fa-star star" style="font-size:15px" id="star-5"></i>
                                    </div>
                                      <input type="text" class="form-control hidden" name="ratecari" id="ratecari" value="">
                                        <div class=" form-group">
                                          <button type="submit" class="btn btn-default" id="carikategori" onclick='choose_rate();' value="cari"><i class="fa fa-search" style='color: white;'></i></button>
                                        </div>
                                </ul>
                              </li>
                            </ul>
                        </li> <!-- order by rate -->
                    </ul>
                </li> <!-- li rekomendasi -->

                <!-- Menu rekomendasi event per bulan -->
                <li class="sub-menu">
                  <a href="javascript:;" onclick="reset(); resultt()">
                    <i class="fa fa-desktop"></i>
                        <span>Event in Period</span>
                  </a>
                    <ul class="sub"> 
                      <div  class="panel-body" ><h8 style="color :#f3fff4"> Choose Option of Event</h8> <br>
                          <select class="form-control" style="width: 85%;" id="pilihevent">
                              <option value="today">Today</option>
                              <option value="weekly">Weekly</option>
                              <option value="monthly">Monthly</option>
                              <option value="annually">Annually</option>
                          </select>
                          <button type="submit" class="btn btn-default" id="carikategori"  value="pilih_event" onclick='mountly_event(); detaileventbulan(id);'><i class="fa fa-search" style='color: white;'></i></button>
                      </div> 
                    </ul> 
                </li>

                <!-- Dashboard kembali pilih id kota-->
                <li class="sub-menu">
                  <a class="" href=".././">
                    <i class="fa fa-chevron-circle-left"></i>
                    <span>Dashboard</span>
                  </a>
                </li>

                <?php
                // skrip koneksi database
                include('connect.php');
                  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
                  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                  $waktu   = time(); //
                
                // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
                  $s = mysqli_query($conn,"SELECT * FROM statistika2 WHERE ip='$ip' AND tanggal='$tanggal'");

                // Kalau belum ada, simpan data user tersebut ke database
                  if(mysqli_num_rows($s) == 0){
                      mysqli_query($conn,"INSERT INTO statistika2 (ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
                  }
                // Jika sudah ada, update
                  else{
                      mysqli_query($conn,"UPDATE statistika2  SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                  }
                  // Hitung jumlah pengunjung
                    $pengunjung       = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM statistika2  WHERE tanggal='$tanggal' GROUP BY ip, hits, online, tanggal")); 
                  // hitung total pengunjung
                    $totalpengunjung  = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(hits) as tas FROM statistika2 ")); 
                  // hitung pengunjung online
                    $bataswaktu       = time() - 300;
                    $pengunjungonline = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM statistika2  WHERE online > '$bataswaktu'")); 
                ?>

            </ul>
          </div>
        </aside>
      
      <input type="hidden" id="cityName" value="<?php echo $city; ?>">
      <!-- Main konten/layar utama map -->
      <section id="main-content">
        <section class="wrapper site-min-height">
          <div class="row mt">
              <!-- Layout Map all -->
              <div class="col-sm-8" id="hide2">
                  <div class="panel">
                    <header class="panel-heading">
                      <label style=" color: black; margin-top:5px;" >Google Map with Location List</label> &nbsp&nbsp
                      <!-- ikon current position -->
                        <a class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Current Position">&nbsp<i class="fa fa-location-arrow" style="color:white;"></i>&nbsp</a>
                      <!-- ikon manual position -->
                        <a class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title=" Manual Position">&nbsp<i class="fa fa-map-marker" style="color:white;"></i>&nbsp</a>
                      <!-- ikon legenda -->
                      <label id="tombol">
                        <a class="btn btn-default" role="button" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend"><i class="fa fa-eye" style="color:white;"></i></a></label>
                        <label></label>
                    </header>
                    <!-- Layar khusus map -->
                    <div id="map" style="width:100%;height:480px; z-index:60"></div>
                  </div>
              </div>

              <!-- Populer masjid -->
              <div class="col-sm-4"  id="popularmosque" >
                <section class="panel" id="det_popular">
                <section class="panel">
                <div class="panel-body">
                  <h4 style="color: black; text-align:center; font-family:Arial;">Popular Mosque</h4><hr>
                    <!-- First Action -->
                    <?php
                    session_start();
                    include 'connect.php';

                    $city = $_SESSION['id'];  
                    $showoverview=mysqli_query($conn, 
                      "SELECT worship_place.id, worship_place.name, dwt.id_type, worship_place_type.name as worship_type, worship_place_gallery.gallery_worship_place 
                      from worship_place_type join (SELECT * FROM detail_worship_type group by id) as dwt on worship_place_type.id_type=dwt.id_type
                        join worship_place on dwt.id=worship_place.id
                        join worship_place_gallery on worship_place.id=worship_place_gallery.id, city
                      where city.id='$city' AND st_contains(city.geom, worship_place.geom)
                      group by dwt.id_type");
                    ?>
                    
                  <div class="carousel slide" id="gallery1" data-ride="carousel" >
                    <ol class="carousel-indicators" id="mosque_type" style="bottom: 15px; font-size: 5px">
                      <li data-target="#gallery1" data-slide-to="0" class="active"></li>
                      <li data-target="#gallery1" data-slide-to="1"></li>
                      <li data-target="#gallery1" data-slide-to="2"></li>
                      <li data-target="#gallery1" data-slide-to="3"></li>
                      <li data-target="#gallery1" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner" >
                      <div class="item active">
                        <img src="foto/we_mes.jpg">
                        <div class="carousel-caption">
                          <b> Mosque Destination</b><br>
                          <font style="font-size: 12px; text-align: center">Popular in <?php echo $_SESSION['name'];?> City</font>
                        </div>
                        <a class="left carousel-control" href="#gallery1" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#gallery1" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div> 
                    <?php 
                        while($rowshowoverview = mysqli_fetch_assoc($showoverview)):
                    ?>  
                    <div class="item" style="background-color: #efefef;">
                    <img onclick="detail_popularmosque('<?=$rowshowoverview['worship_type']?>')" src="foto/<?=$rowshowoverview['gallery_worship_place']?>">
                      <div class="carousel-caption" style="bottom: 10px" onclick="detail_popularmosque('<?=$rowshowoverview['worship_type']?>')">
                        <a style="color: white" ><b><?= $rowshowoverview['worship_type'] ?></b></a> <br>
                        <font style="font-size: 12px; text-align: center">Popular in <?php echo $_SESSION['name'];?> City</font>
                      </div>
                      <a class="left carousel-control" href="#gallery1" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#gallery1" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                  <?php
                    endwhile;
                    ?>  
                    </div>
                  </div> 
                  </div>
                  </section>
                </section>
              </div>

              <!-- Result pencarian  -->
              <div class="col-sm-4" style="display:none;" id="result">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Result</a>
                        <div class="box-body" style="max-height:400px;overflow:auto;">
                          <div class="form-group" id="hasilcari1" style="display:none;">
                            <table class="table table-bordered" id='hasilcari'>
                            </table>
                          </div>
                        </div>
                    </div>
                  </section>
              </div>
              
              <!-- Result pencarian  -->
              <div class="col-sm-4" style="display:none;" id="object_around">
                  <section class="panel">
                    <div class="panel-body" style="max-height:330px;">
                      <a class="btn btn-compose">Object Around</a>
                        <div class="box-body" style="max-height:255px;overflow:auto;width: 100%;" id="attraction_nearby" >
                              <!-- <div id="attraction_nearby" class='well' style='width: 100%'> -->
                                  <div class='checkbox'><label><input id='check_t' type='checkbox'>Tourism</label></div>
                                  <div class='checkbox'><label><input id='check_oo' type='checkbox' value=''>Souvenir</label></div>
                                  <div class='checkbox'><label><input id='check_h' type='checkbox' value='4'>Hotel</label></div>
                                  <div class='checkbox'><label><input id='check_w' type='checkbox'>Worship Place</label></div>
                                  <div class='checkbox'><label><input id='check_k' type='checkbox' value=''>Culinary Place</label></div>

                                  <label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label>
                              
                                  <input  type='range' onchange='cek1();aktifkanRadiusSekitar();resultt1();info1();' id='inputradius1' name='inputradius1' data-highlight='true' min='1' max='30' value='1' >
                              <!-- </div> -->
                        </div>
                    </div>
                  </section>
              </div>

              <!-- Layout list event -->
              <div class="col-sm-4" style="display:none;" id="resulteventbulan">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Event in Period</a>
                          <div class="box-body" style="max-height:400px;overflow:auto;">
                            <div class="form-group" id="hasilcari_eventrec">
                              <table class="table table-bordered" id='hasilcarievent'>
                              </table>
                            </div>
                          </div>
                    </div>
                  </section>
              </div>

              <!-- Layout list event -->
              <div class="col-sm-4" style="display:none;" id="eventt">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Event</a>
                          <div class="box-body" style="max-height:350px;overflow:auto;">
                            <div class="form-group" id="hasilcari1">
                            </div>
                          </div>
                    </div>
                  </section>
              </div>

              <!-- <div id="attraction_nearby" class="col-md-4 col-sm-4 mb" style="display:none">
                <div class="white-panel pns" style="padding-bottom:5px">
                  <div class="white-header" style="height:40px;margin-bottom:0px;background:white;color:black">
                    <a class="btn btn-compose">Object Around</a>
                  </div>
                      <div class="row">
                        <div class="col-sm-6 col-xs-6"></div>
                      </div>
                      <div style="text-align:left;margin:10px; color:black;">
                        <div class="checkbox">
                          <label><input id='check_t' type="checkbox"> Tourism </label>
                        </div>
                        <div class="checkbox">
                           <label><input id="check_oo" type="checkbox" value=""> Souvenir </label>
                        </div>
                        <div class="checkbox">
                          <label><input id='check_r' type="checkbox" value=""> Restaurant </label>
                        </div>
                        <div class="checkbox">
                          <label><input id="check_h" type="checkbox" value=""> Hotel </label>
                        </div> -->

                        <!--RADIUS-->
                        <!-- <label><b>Radius&nbsp</b></label><label style='color:black' id='km1'><b>0</b></label>&nbsp<label><b>m</b></label>
                        <br>
                        <input type="range" onchange="cek(); aktifkanRadius()" id="inputradius" name="inputradius" data-highlight="true" min="0" max="15" value="0"> -->
                        <!--BUTTON CARI SEKITAR-->
                        <!-- <div id="view_sekitar" class="centered"></div>
                      </div>
                </div>
              </div> -->
                        

              <!-- Layout informasi detail  -->
              <div class="col-sm-8" style="display:none;" id="infoo">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Information</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                          <div class="form-group" id="infoangkotmes">
                            <table class="table" id='infoob'>
                                <tbody  style='vertical-align:top;'>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </section>
              </div>

              <!-- Layout informasi event -->
              <div class="col-sm-8" style="display:none;" id="infoev">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Information of Event</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                          <div class="form-group">
                            <table class="table" id='infoevent'>
                              <tbody  style='vertical-align:top;'>
                              </tbody>
                            </table>
                            <div class="table" id='infoevent2'>
                              <tbody  style='vertical-align:top;'>
                              </tbody>
                            </div>
                          </div>
                        </div>
                    </div>
                  </section>
              </div>
              
              <!-- Layout rute jalur -->
              <div class="col-sm-8" style="display:none;" id="infoo1">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Route Public Transportation</a>
                        <div class="box-body" style="max-height:350px;overflow:auto;">
                          <div class="form-group">
                            <table class="table table-bordered" id='infoak'>
                            </table>
                          </div>
                        </div>
                    </div>
                  </section>
              </div>

              <!-- Layout pencarian  sekitar-->
              <div class="col-sm-4" style="display:none;" id="resultaround">
                  <section class="panel">
                    <div class="panel-body">
                      <a class="btn btn-compose">Attraction Around</a>
                          <div class="box-body" style="max-height:150px;overflow:auto;">
                            <div class="form-group" id="hasilcari2" style="display:none;">
                              <table class="table table-bordered" id='hasilcari_tourism'>
                              </table>
                            </div>
                            <div class="form-group" id="hasilcari3" style="display:none;">
                              <table class="table table-bordered" id='hasilcari_souvenir'>
                              </table>
                            </div>
                            <div class="form-group" id="hasilcari4" style="display:none;">
                              <table class="table table-bordered" id='hasilcari_hotel'>
                              </table>
                            </div>
                            <div class="form-group" id="hasilcari5" style="display:none;">
                              <table class="table table-bordered" id='hasilcari_worship'>
                              </table>
                            </div>
                            <div class="form-group" id="hasilcari6" style="display:none;">
                              <table class="table table-bordered" id='hasilcari_kuliner'>
                              </table>
                            </div>
                          </div>
                    </div>
                  </section>
              </div>

              <!-- Layout pencarian sekitar masjid/mushalla -->
				      <div class="col-sm-8" style="display:none;" id="att1">
                <section class="panel">
                    <div class="panel-body" >
                        <a class="btn btn-compose">Attraction Around Mosque</a>
                          <div class="box-body" style="max-height:350px;overflow:auto;">

                            <div class="form-group">
                              <table class="table table-bordered" id='info1'>
                              </table>
                            </div>
                          </div>
                    </div>
                </section>
					    </div>

              <!-- Layout rute objek sekitar -->
				      <!-- <div class="col-sm-8" style="display:none;" id="att3">
                <section class="panel">
                    <div class="panel-body" >
                        <a class="btn btn-compose">Route to Object</a>
                    </div>
                    <div id="rute" class='box-body' id='rute_object'></div>
                </section>
					    </div> -->

              <!-- Layout rute  masjid -->
              <div class="col-sm-4" style="display:none;" id="att2">
                <section class="panel">
                  <div class="panel-body">
                      <a class="btn btn-compose">Route</a>
                  </div>
                  <div id="rute" class='box-body'></div>
                </section>
              </div>
              
          </div>
      </section>
    </section>

    <!-- Footer bagian dari section main utama -->
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
      <script src="assets/js/jquery-1.8.3.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="assets/js/fancybox/jquery.fancybox.js"></script>
      <script src="assets/js/jquery.scrollTo.min.js"></script>
      <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="assets/js/jquery.sparkline.js"></script>
      <script src="script.js" type="text/javascript"></script> 
      <script src="assets/js/common-scripts.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>

      <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
      <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

      <script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
      <script src="assets/js/advanced-form-components.js"></script>

    <!--common script for all pages-->
    <script type="text/javascript">
      $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
              title: 'Visitor Statistics',
            // (string | mandatory) the text inside the notification
              text: ' <span>Today : <?php echo $pengunjung; ?> <br> Total : <?php echo $totalpengunjung['tas']; ?> <br> Online User : <?php echo $pengunjungonline; ?>	</span>',
            // (string | optional) the image to display on the left
              image: 'assets/img/1.ico',
            // (bool | optional) if you want it to fade out on its own or just sit there
              sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
              time: '',
            // (string | optional) the class name you want to apply to that specific message
              class_name: 'my-sticky-class'
        });
        return false;
      });
    </script>

	  <script type="text/javascript">
        $(':radio').change(function() {
            $('#nilai_rat').val(this.value);
            $('#form_rating').submit();
        });

        $(function() {
          //fancybox
          jQuery(".fancybox").fancybox();
        });
    </script>

    <script type="text/javascript">
      var id_cek = 0;

      function r()
      {
         $('.fa-info').click(function(){
          $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
        });
      }
      
      $('.star').click(function(){
      //get the id of star
      var star_id = $(this).attr('id');
      var star_index = $(this).attr("id").split("-")[1];
      $("#ratecari").val(star_index);

      switch (star_id)
      {
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
    $('.star2').click(function()
    {
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
        $('#inputradius').slider({
            formatter: function(value) {
              return value+' km';
              }
            });
        $('[data-toggle="tooltip"]').tooltip();
    </script>
    <script type="text/javascript" src="k3.js"></script>
  </body>
</html>
