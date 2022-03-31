<?php include('header.php');?>

<section class="container mt-5 mb-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?=base_url('index.php/home/user_details')?>">My account</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Address</li>
    </ol>
    </nav>
</section>
<div class="" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
      </div>
        <div class="modal-body">
          <?php echo form_open_multipart('index.php/home/edit_address');?>
            <div class="form-group">
                <label for="exampleInputPassword1">Zip code</label>
                <?php echo form_input(['name' => 'zip_code', 'class' => 'form-control', 'value' =>  $data['address'][0]['zip_code'], 'required' =>'required']) ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <?php echo form_input(['name' => 'city', 'class' => 'form-control', 'value' =>  $data['address'][0]['city'],'required' =>'required'])?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Landmark</label>
                <?php echo form_input(['name' => 'landmark', 'class' => 'form-control', 'value' =>   $data['address'][0]['landmark'],'required' =>'required'])?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <?php echo form_input(['name' => 'address', 'class' => 'form-control', 'value' =>  $data['address'][0]['address'],'required' =>'required'])?>
            </div>
            <div class="form-group">
                <?php echo form_input(['name' => 'id', 'value' =>  $data['address'][0]['id'],'type'=> 'hidden'])?>
            </div>
            
            <div class="modal-footer">
                <a href="<?php echo base_url('index.php/home/user_details')?>" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>


<?php include('footer.php');?>