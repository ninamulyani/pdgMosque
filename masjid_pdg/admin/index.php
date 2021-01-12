<!-- Admin utama -->
<?php 
  session_start();
  if(!isset($_SESSION['A'])){
    echo"<script language='JavaScript'>document.location='login.php'</script>";
      exit();
  }
  include("../connect.php");
  $city = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mosque Finder Admin</title>

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M27NPG2');
    </script> -->
    <!-- End Google Tag Manager -->
    <!-- Google Analytics -->
    <!-- <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-179163808-4', 'auto');
      ga('send', 'pageview');
    </script> -->
    <!-- End Google Analytics -->

    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/icomoon/styles.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <!-- <script src="mapedit.js" type="text/javascript"></script> -->
    <script src="inc/script.js" type="text/javascript"></script>
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDgpfxdQ0Ep_nieNjV64u4yXWeSFHAT4BE&libraries=drawing"></script>
    <script src="../assets/js/chart-master/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.html" />
    <link rel="stylesheet" type="text/css" href="../assets/css/skins/_all-skins.css" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179163808-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-179163808-4');
    </script> -->
  </head>

  <!-- TOMBOL ADD DI ADMIN (FLOATING BUTTON) -->
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
  
  <!-- RECOMMENDATION TOGGLE ON / OFF -->
  <style>
      .switch {
        position: relative;
        display: inline-block;
        width: 42px;
        height: 22px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ff1100;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 14px;
        width: 14px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2ab934;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2ab934;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
      }

            /*------ ADDED CSS ---------*/
      .on
      {
        display: none;
      }

      .on, .off
      {
        color: white;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        font-size: 8px;  
      }

      input:checked+ .slider .on
      {display: block;}

      input:checked + .slider .off
      {display: none;}

      /*--------- END --------*/

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
    </style>

  <body>

  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M27NPG2"
      height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript> -->
  <!-- End Google Tag Manager (noscript) -->

  <section id="container" >
      <header class="header black-bg">
            <?PHP include("inc/header.php"); ?>
      </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <?PHP include("inc/sidebar.php"); ?>
          </div>
      </aside>
      <section id="main-content">
        <section class="wrapper">
		      <div class="row mt">
            <?php
              $p = "";
              if(isset($_GET['page'])){
                $p=$_GET['page'];
              }
              $page="pages/".$p.".php";

              if(file_exists($page)){
                include($page);
              }elseif($p==""){
                include('pages/info.php');
              }else{
                include('pages/404.php');
              }
            ?>
            
            <!-- <iframe width="505" height="312" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQKAR2ZdewEzM8qyvsqvm73bHYwHfyEvkpOB6kthUoSIlNYJl_LadmHwhKg8iw1IhZWo05gBPoCKMNA/pubchart?oid=1908423027&amp;format=interactive"></iframe>
            <iframe width="505" height="312" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQKAR2ZdewEzM8qyvsqvm73bHYwHfyEvkpOB6kthUoSIlNYJl_LadmHwhKg8iw1IhZWo05gBPoCKMNA/pubchart?oid=1142043386&amp;format=interactive"></iframe> -->
			    </div>
          
        </section>
      </section>

  </section>

   <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.sparkline.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="../assets/js/advanced-form-components.js"></script>
     <script type="text/javascript">
      $(function () {
        $('#example1, #example2, #example3').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
		  "iDisplayLength": 10,
		  "oLanguage": {
			 "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
			 "sLengthMenu": "Show _MENU_ entries",
			 "sSearch": "Search:"
			}
        });
      });
    </script>
  </body>
</html>
