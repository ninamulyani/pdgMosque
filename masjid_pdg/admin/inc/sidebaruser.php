 
 <?php
require 'act/viewdatamas.php';
  ?>
<ul class="sidebar-menu" id="nav-accordion">
              
    <p class="centered"><a href="profile.html"><img src="../assets/img/logo_sidebar.jpeg" style="border-radius:50%"class="img-circle" width="80"></a></p>
        <h5 class="centered"><p>Hello, <?php echo $_SESSION['username']; ?> !</p></h5>
                    
				<li class="mt">
                      <a href="../")">
                          <i class="fa fa-reply"></i>
                          <span>User Access</span>
                      </a>
                  </li> 
                  <li class="sub-menu">
                      <a href="?page=content">
                          <i class="fa fa-book"></i>
                          <span>Information</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="?page=updatemesjid&id=<?php echo $id ?>">
                          <i class="fa fa-pencil"></i>
                          <span>Edit Information</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a href="?page=formfasupd&id=<?php echo $id ?>">
                          <i class="fa fa-caret-square-o-down"></i>
                          <span>Edit Facility</span>
                      </a>
                  </li>
				   <li class="sub-menu">
                      <a href="?page=listevent">
                          <i class="fa fa-calendar"></i>
                          <span>List Event</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="?page=ubahpw">
                          <i class="fa fa-key"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
             </ul>