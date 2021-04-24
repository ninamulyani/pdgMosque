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
                <th class='text-center' style="width: 10%">ID</th>
                <th class='text-center' style="width: 40%">Name</th>
                <th class='text-center' style="width: 25%">Type</th>
                <th class='text-center' style="width: 10%;">Status</th>
                <th class='text-center' style="width: 15%;">Action</th>
              </tr>
            </thead>
            <tbody id="table_type">
              <?php                    
                $sql = mysqli_query($conn, "select worship_place.id, worship_place.name as worship, worship_place_type.name as type, detail_worship_type.id_type, detail_worship_type.status from worship_place join detail_worship_type on worship_place.id=detail_worship_type.id join worship_place_type on detail_worship_type.id_type=worship_place_type.id_type, city
                where city.id='$city' AND st_contains(city.geom, worship_place.geom) 
                order by worship_place.id ASC");
                while($data =  mysqli_fetch_array($sql))
                {
                  $id   = $data['id'];
                  $name = $data['worship'];
                  $type = $data['type'];
                  $id_type = $data['id_type'];
                  $status = $data['status'];
                  ?>
            
                  <tr>
                    <td><?php echo "$id"; ?></td>
                    <td><?php echo "$name"; ?></td>
                    <td><?php echo "$type"; ?></td>
                    <?php if($status==1) {
                        $newstatus = "1";
                      }else if($status==2){
                        $newstatus = "2";
                      }
                      else if($status==3){
                        $newstatus = "3";
                      }
                      else if($status==4){
                        $newstatus = "4";
                      }
                      else {
                        $newstatus = "5";
                      }  
                        ?>
                    <td class='text-center'><?php echo "$newstatus"; ?>
                    </td>
                    <td class="text-center">
                      <div class="btn-group text-center">
                          <a href="?page=recommendation_upd&id=<?php echo $id; ?>&id_type=<?php echo $id_type; ?>&status=<?php echo $status; ?>" class="btn btn-sm btn-default" title='Update' style="color: white;"><i class="fa fa-edit"></i></a>
                      </div>
                          <a href="act/del_recom.php?id=<?php echo $id; ?>&id_type=<?php echo $id_type; ?>" class="btn btn-sm btn-default" title='Delete' style="color: white;"><i class="fa fa-trash-o"></i></a>
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
                var status = row.status;
                if (status == 1) 
                // {
                //   reco = "checked";
                // }else{
                //   reco = "";
                // }

                // "+reco+"
                
                console.log(worship);
                $('#table_type').show();

                $('#table_type').append(
                  "<tr><td>"+id_t+"</td><td>"+worship+"</td><td>"+type+"</td><td><div class='text-center'><label class='switch'><input type='checkbox' id='"+id+"'  onclick='updatestatus('"+id+"','"+status+"')' name='onoffswitch' value='"+status+"' +status+ == '1' ? 'checked' : '' ;?>><span class='slider round'></span></label></div></td></tr>");
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