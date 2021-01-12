<div class="col-sm-12"> 
  <section class="panel">
    <div class="panel-body">
      <h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-image"></i><b> Recommendation</b></h2>
      <br>
      <!-- <div class="form-group">
        <label for="type_worship">Select Type: </label> <br>
        <select name="type_worship" id="type_worship" class="form-control" onchange="getType()" style="width: 25%; ">
          <?php      
                     
            $sql = mysqli_query($conn, "SELECT * FROM worship_place_type");
          ?>
          <option value="x">- All -</option>";
          <?php     
            while($row_type = mysqli_fetch_assoc($sql))
            {
              $id_t = $row_type['id_type'];
              $name_t = $row_type['name'];
          ?>
                <option value="<?php echo $id_t ?>"><?php echo $name_t ?></option>";
          <?php
            }
          ?>                  
        </select>
      </div>  -->

      <div class="box-body">
        <div class="form-group">
          <table id="example2" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 10%">ID</th>
                <th style="width: 55%">Name</th>
                <th style="width: 20%">Type</th>
                <th style="width: 15%; text-align: center;">Action (ON | OFF)</th>
              </tr>
            </thead>
            <tbody id="table_type">
              <?php                    
                $sql = mysqli_query($conn, "select worship_place.id, worship_place.name as worship, worship_place_type.name as type, detail_worship_type.status from worship_place join detail_worship_type 
                on worship_place.id=detail_worship_type.id join worship_place_type 
                on detail_worship_type.id_type=worship_place_type.id_type
                order by worship_place.id ASC");
                while($data =  mysqli_fetch_array($sql))
                {
                  $id   = $data['id'];
                  $name = $data['worship'];
                  $type = $data['type'];
                  $status = $data['status'];
                  ?>
            
                  <tr>
                    <td><?php echo "$id"; ?></td>
                    <td><?php echo "$name"; ?></td>
                    <td><?php echo "$type"; ?></td>
                    <td>
                      <div class="text-center">
                        <label class="switch">
                          <input type="checkbox" id="<?=$data['id']?>"  onclick="updatestatus('<?=$data['id']?>','<?=$data['status']?>')" name="onoffswitch" value="<?=$data['status']?>" <?=$data['status'] == '1' ? 'checked' : '' ;?>>

                          <div class="slider round">
                          </div>
                        </label>
                        <!-- <input type="text" class="form-control" name="toggle" id="toggle_btn" value=""> -->
                      </div>  
                    </td>
                  </tr>
                <?php 
                } 
              ?>
            </tbody>    
          </table>
        </div>                   
      </div>
    </div>
  </section>
</div>

<!-- script js ambil data type -->
<script>
        function getType() 
        {
          var id = document.getElementById("type_worship").value;
          // document.getElementById("table_rec").innerHTML = id;

          var pages = "http://localhost/masjid_pdg/admin/pages/";
          $.ajax({url: pages+'type_worship_recom.php?id_type='+id, data: "", dataType: 'json', success: function(rows)
          {
              $('#table_type').empty();
              for (var i in rows)
              { 
                var row = rows[i];
                var id_t = row.id;
                var worship = row.worship;
                var type = row.type;
                var address = row.address;
              
                console.log(worship);
                $('#table_type').show();

                $('#table_type').append(
                  "<tr><td>"+id_t+"</td><td>"+worship+"</td><td>"+address+"</td><td>"+type+"</td></tr>");
              }//end for  
            } //end function     
          });//end ajax 
        }
</script>

<!-- script js button on saat di klik -->
<script type="text/javascript">
  function updatestatus(id,status){
      // var link="http://localhost/masjid_pdg/admin/pages/updatestatus.php?id="+id+"&status=" + status;
      // console.log(link);
        $.ajax({
        type:'GET',
        url:'http://localhost/masjid_pdg/admin/pages/updatestatus.php?id='+id+'&status=' + status
        });
   
  }
</script>


<!-- TOMBOL ADD DI ADMIN (FLOATING BUTTON) -->
<a href="?page=recommendation_add" title="Add Tourism" style="color: white; background-color: #26a69a;" class="act-btn">
    +
</a>