<?=include('header.php')?>

<section class="container mt-5 mb-5">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url('index.php/home/user_details')?>">My account</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
  </ol>
</nav>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Order Details</button>
  </div>

  <div id="Tokyo" class="tabcontent mb-5">
    <h4 class="text-center mb-3 mt-3">Order Details</h4>
    <div class="row">
      <?php
        // echo "<pre>";
        // print_r($data);
      ?>
      <?php foreach(json_decode($data['order_details'][0]['product_id'], true) as $order_count){?>
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center" style="height: 100px;">
                  <?php
                    $CI =& get_instance();
                    $CI->load->model('User_model');
                    $product_data = $CI->User_model->orderProductDetails($order_count);       
                  ?>
                  <img src="<?php echo base_url('/assest/images/product/').$product_data[0]['img']?>" style="max-height: 100%; max-width:100%" alt="Admin" class="rounded-circle" width="150">
                </div>
                <div class="d-flex flex-column align-items-center text-center">

                    <table class="table text-left m-3">
                      <tbody>
                        <tr>
                          <th>Product ID:</th>
                          <th class="text-muted"><?php echo '0PPD00'. $product_data[0]['id']; ?></th>
                        </tr>

                        <tr>
                          <th>Product Name:</th>
                          <th class="text-muted"><?php echo $product_data[0]['name']; ?></th>
                        </tr>

                        <tr>
                          <th>Listed Price:</th>
                          <th class="text-muted"><?php echo  $product_data[0]['mrp']; ?></th>
                        </tr>

                        <tr>
                          <th>Selling Price:</th>
                          <th class="text-muted"><?php echo '&#8377;' .$product_data[0]['selling_price']; ?></th>
                        </tr>

                        <tr>
                          <th>Product QTY:</th>
                          <th class="text-muted"><?php print_r(json_decode($data['order_details'][0]['product'], true)[$product_data[0]['id']]['qty']) ; ?></th>
                        </tr>

                        <tr>
                          <th>Total Price</th>
                          <th class="text-muted"><?php echo '&#8377;'; print_r(json_decode($data['order_details'][0]['product'], true)[$product_data[0]['id']]['price']) ; ?></th>
                        </tr>

                        <tr>
                          <th>Is Veg</th>
                          <th class="text-muted"><?php print_r(json_decode($data['order_details'][0]['product'], true)[$product_data[0]['id']]['is_veg']) ; ?></th>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12"><a href="javascript:void(0);" role="button" class="btn btn-outline-primary"> Review </a></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      <?php }?>
      <table class="table table-border text-left m-3">
        <tbody>
          <tr>
            <th>
              Shipping Fees
            </th>
            <td>
              <?php if(empty($data['order_details'][0]['shiiping_fees'])){echo "0";}else{echo $data['order_details'][0]['shiiping_fees'];
                }?>
            </td>
          </tr>

          <tr>
            <th>
              Total Price
            </th>
            <td>
               <?=$data['order_details'][0]['total_price']?>
            </td>
          </tr>

          <tr>
            <th>
              Payment Mode
            </th>
            <td>
               <?=$data['order_details'][0]['payment_mode']?>
            </td>
          </tr>

          <tr>
            <th>
              Order Status
            </th>
            <td>
              <?php if($data['order_details'][0]['order_status'] == "Approved"){echo '<b class="text-green">Accepted</b>';}else{echo '<b class="text-danger">'.$data['order_details'][0]['order_status'].'</b>';}?>
            </td>
          </tr>

        <tbody>
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
<?=include('footer.php')?>