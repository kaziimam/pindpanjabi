<?php include('header.php');?>
<div style="clear:both"></div>

<section class="container mt-5 mb-5">
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Personal Details</button>
    <button class="tablinks" onclick="openCity(event, 'Paris')">Address</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">My Orders</button>
  </div>

  <div id="London" class="tabcontent mb-5">
    <h4 class="text-center mb-3 mt-3">Personal Details</h4>
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            <?php echo $data['user_data'][0]['name'];?>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
          </div>
          <div class="col-sm-9 text-secondary">
          <?php echo $data['user_data'][0]['email_addr']?>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
          </div>
          <div class="col-sm-9 text-secondary">
          <?php echo $data['user_data'][0]['mobile_number']?>
          </div>
        </div>
      
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal" href="">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="Paris" class="tabcontent">
    <div class="row">
      <div class="col-md-6 col-xs-6 text-center"><h4 class=" mb-3 mt-3">Address</h4></div>
      <div class="col-md-6 col-xs-6 text-center"> <a class="btn btn-primary text-right mb-3 mt-3" href=""  data-toggle="modal" data-target="#addAddress"> Add</a></div>
    </div>
    
    <div class="row">
        <?php foreach($data['address'] as $address){ ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                      <div class="mt-3">
                          <p class="text-muted font-size-sm">
                              <?php echo $address['address']." , ". $address['city']." , ". $address['zip_code']. " , Nare: ". $address['landmark'] ?>
                          </p>
                      </div>
                      <div class="row">
                          <div class="col-md-3 mb-3">
                              <a href="<?php echo base_url('home/edit_user_address/').$address['id'];?>" ><i class="fa fa-edit"></i></a>
                          </div>
                          <div class="col-md-3 mb-3">
                              <a onclick="deleteaddress(<?php echo $address['id']?>)" style="color:#ed2828d9"><i class="fa fa-trash"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        <?php }?>
    </div>
  </div>

  <div id="Tokyo" class="tabcontent">
    <h4 class="text-center mb-3 mt-3">My Orders</h4>
    <div class="row">

    <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
      <thead>
          <tr>
              <th><b>#</b></th>
              <th>Order Id </th>
              <th>Order status </th>
              <th>Track order</th>
              <th>order date</th>
              <th>Order info</th>
          </tr>
      </thead>
      <tfoot>
          <tr>
              <th><b>#</b></th>
              <th>Order Id </th>
              <th>Order status </th>
              <th>Track order</th>
              <th>order date</th>
              <th>Order info</th>
          </tr>
      </tfoot>
      <tbody>
          
              <?php 
              $sr = 1;
                  foreach($data['orders'] as $orders){ ?>
                      <tr>
                          <td><?php echo $sr ;?></td>
                          <td><?php echo '0PPD00'.$orders['id'] ;?></td>
                          <td class="text-success"> <b><?php if($orders['order_status'] == 'Approved'){echo '<span class="text-success">Accepted</span>';}else{echo '<span class="text-danger">'.$orders['order_status'].'</span>'; }?></b> </td>
                          <td><a href="javascript:void(0);" role="button" class="btn btn-outline-success"> Track  Order</a></td>
                          <td><?php echo $orders['date_time'];?></td>
                          <td>
                            <a href="<?php echo base_url('index.php/home/order_details/').$orders['id'];?>" style="padding:10px"><i class="fa fa-eye"></i> </a>
                            <!-- <a style="padding:10px"><i class="fa fa-eye"></i> </a>
                            <a style="padding:10px"><i class="fa fa-eye"></i> </a> -->
                          </td>
                      </tr>
                  <?php $sr++;  }
                ?>
      </tbody>
  </table>
    </div>
  </div>

  <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
  </script>
</section>
<div class="clear" style="clear:both"></div>

<!-- Modal for Edite Personal Details -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Personal Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
              <?php echo form_open_multipart('index.php/home/edit_Personal_details');?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' =>  $data['user_data'][0]['name']]) ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <?php echo form_input(['name' => 'email_addr', 'class' => 'form-control', 'value' =>  $data['user_data'][0]['email_addr']])?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <?php echo form_input(['name' => 'mobile_number', 'class' => 'form-control', 'value' =>  $data['user_data'][0]['mobile_number']])?>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <?php //echo form_input(['name' => 'address', 'class' => 'form-control', 'value' => $data['address'][0]['address']])?>
                </div> -->
                <div class="form-group">
                    <?php echo form_input(['name' => 'id', 'value' => $data['user_data'][0]['id'],'type'=> 'hidden'])?>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>


<!-- Modal for Add address -->
<div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <?php echo form_open_multipart('index.php/home/add_new_address/'.$this->uri->segment(2));?>
            <div class="form-group">
                <label for="exampleInputPassword1">Zip code</label>
                <?php echo form_input(['name' => 'zip_code', 'class' => 'form-control', 'value' =>  set_value('zip_code'), 'required' =>'required']) ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <?php echo form_input(['name' => 'city', 'class' => 'form-control', 'value' =>  set_value('city'),'required' =>'required'])?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Landmark</label>
                <?php echo form_input(['name' => 'landmark', 'class' => 'form-control', 'value' =>  set_value('landmark'),'required' =>'required'])?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <?php echo form_input(['name' => 'address', 'class' => 'form-control', 'value' => set_value('address'),'required' =>'required'])?>
            </div>
            <div class="form-group">
                <?php echo form_input(['name' => 'id', 'value' => $data['user_data'][0]['id'],'type'=> 'hidden'])?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>

<script>
function show_order_details(id){
  alert(id)
}
</script>

<script type="text/javascript">
    function deleteaddress(id){
        if (confirm('Are you sure,  After click ok Your Address will be deleted from Database')) {
            location.replace("<?php echo base_url('/index.php/home/delete_address/');?>"+id);
        }
    }
</script>
<style>
  .tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 18%;
  }

  .tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
  }

  .tab button:hover {
    background-color: #ddd;
  }

  .tab button.active {
    background-color: #ccc;
  }

  .tabcontent {
    float: left;
    padding: 0px 12px;
    border-right: 1px solid #ccc;
    border-top: 1px solid #ccc;
    width: 82%;
    border-left: none;
  }

  @media only screen and (max-width: 600px) {
    .tabcontent {
      width: 75% !important;
    }
    .tab {
      width: 25% !important;
    }
  }
</style>
<div style="clear:both"></div>
<?php include('footer.php')?>