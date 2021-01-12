<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-180150823-1', 'auto');
            ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Masjid Padang">
        <meta name="keyword" content="Masjid, Padang">

        <title>Padang Mosque</title>

        <!-- Bootstrap core CSS -->
        <link href="masjid_pdg/assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="masjid_pdg/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            
        <!-- Custom styles for this template -->
        <link href="masjid_pdg/assets/css/style.css" rel="stylesheet">
        <link href="masjid_pdg/assets/css/style-responsive.css" rel="stylesheet">
    </head>
    <body style="background-image: url(_foto/1.jpg)">

    <!-- *****************************************************************************************************************************
    MAIN CONTENT
    ****************************************************************************************************************************** -->
        <form class="form-login" action="root.php" method="post">
            <h2 class="form-login-heading" style="background:#26a69a;border-color:white">Halal Tourism</h2>
            <div class="login-wrap" style="opacity: 85%" >     
                <select class="form-control text-center" style="width:100%;margin-top:10px" id="city" name="city">
                    <option value=''>- Choose City -</option>
                    <?php 
                        include('connect.php');
                        $querysearch = "SELECT id, name FROM city"; 
                        $hasil = mysqli_query($conn, $querysearch);
                        while($baris = mysqli_fetch_array($hasil))
                        {
                           $id = $baris['id'];
                           $name = $baris['name'];
                           echo "<option value='$id'>$name</option>";
                        }
                    ?>
                </select>  

                <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="pilihan" name="pilihan">
                    <option style="color: #26a69a" value="" > - Choose Object -</option>
                    <option style="color: #26a69a" value="1"> Angkot</option>
                    <option style="color: #26a69a" value="2"> Hotel</option>
                    <option style="color: #26a69a" value="4"> Culinary</option>
                    <option style="color: #26a69a" value="5"> Worship Place</option>                                               
                    <option style="color: #26a69a" value="6"> Souvenir</option>                        
                    <option style="color: #26a69a" value="7"> Tourism Destination</option>
                </select>

                <br>
                <button type="submit" class="btn btn-default" style="width: 100%; background: #26a69a;color: white">Select</button> 
                <hr>
                <!-- <hr>
                <a href="tourism_pdg/admin/login.php" class="btn btn-default" style="width: 100%; background: #26a69a;color: white">Sign in</a>
                <br>
                <br>
                <b>Don't have an account yet?<b>
                <br>
                <a href="tourism_pdg/admin/pages/register.php" style="width: 100%; color: #26a69a">Create an account</a>   -->
            </div>
        </form>    
    </body>
</html>