<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

	<?php
        $CI =& get_instance();
        $CI->load->model('Admin_model');
        $product = $CI->Admin_model->select_product($limit = null, $offset = null);
    ?>
<?php if ($this->uri->segment(2) == "edit_order"): ?>
	<main class="main-content bgc-grey-100">
	    <div id="mainContent">
	        <div class="row gap-20 masonry pos-r">
	            <div class="masonry-sizer col-md-6"></div>
	            <div class="masonry-item col-md-12">
	                <div class="bgc-white p-20 bd">
	                    <h6 class="c-grey-900">Edit Order</h6>
	                    <?php if (form_error('name') || form_error('product') || form_error('qty')) { ?>
				            <div class="container">
				                <div class="row">
				                    <div class="col-lg-12 p-0">
				                        <div class="alert alert-danger">
				                            <?php echo form_error('name'); ?>
				                            <?php echo form_error('product'); ?>
				                            <?php echo form_error('qty'); ?>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        <?php } ?>
	                    <div class="mT-30">
	                        <?php echo form_open_multipart('index.php/admin/edit_order');?>
	                            <div class="form-row">
	                                <div class="form-group col-md-4 col-xs-12">
	                                	<label >Product Name</label>
	                                	<select name="product" class="form-control selectpicker" required>
	                                        <option disabled="disabled" selected="selected">Choose...</option>
												<?php
		                                        	foreach($product as $product){ ?>
														<option value="<?php echo $product['name'];?>"<?php if ($product['name'] == $data[0]['product']){echo "selected";} ?>> <?php echo $product['name'];?></option>
		                                        	<?php }
		                                        ?>
	                                    </select>
	                                	
	                                </div>

	                                <div class="form-group col-md-4 col-xs-12">
	                                	<label>Shop Name</label>
	                                	<?php echo form_input(['name' => 'name', 'required' => 'required', 'class' => 'form-control', 'value' =>  $data[0]['name'],]) ?>
	                                </div>

	                                <div class="form-group col-md-4">
	                                	<label for="inputState">Qty </label>
	                                	<?php echo form_input(['name' => 'qty', 'required' => 'required', 'class' => 'form-control', 'value' => $data[0]['qty'],]) ?>
	                                </div>
	                            </div>
	                            <?php echo form_input(['name' => 'id', 'type' => 'hidden', 'class' => 'form-control', 'value' => $data[0]['id'],]) ?>
	                            
	                            <div class="form-group col-md-12 w-100">
	                            	<button type="submit" class="btn btn-primary w-100">Get Order</button>
	                            </div>
	                        <?php echo form_close(); ?>
	                    </div>
	                </div>
	            </div>
	            
	        </div>
	    </div>
	</main>
<?php else: ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Take Order</h6>
                    <?php if (form_error('name') || form_error('product') || form_error('qty')) { ?>
			            <div class="container">
			                <div class="row">
			                    <div class="col-lg-12 p-0">
			                        <div class="alert alert-danger">
			                            <?php echo form_error('name'); ?>
			                            <?php echo form_error('product'); ?>
			                            <?php echo form_error('qty'); ?>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        <?php } ?>
                    <div class="mT-30">
                        <?php echo form_open_multipart('index.php/admin/add_order');?>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-xs-12">
                                	<label >Product Name</label>
                                	<select name="product" class="form-control selectpicker" required>
                                        <option disabled="disabled" selected="selected">Choose...</option>
											<?php
	                                        	foreach($product as $data){ ?>
													<option value="<?php echo $data['name'];?>"><?php echo $data['name'];?></option>
	                                        	<?php }
	                                        ?>

                                    </select>
                                	
                                </div>

                                <div class="form-group col-md-4 col-xs-12">
                                	<label>Shop Name</label>
                                	<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => set_value('name')]) ?>
                                </div>

                                <div class="form-group col-md-4">
                                	<label for="inputState">Qty </label>
                                	<?php echo form_input(['name' => 'qty', 'class' => 'form-control', 'value' => set_value('qty')]) ?>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12 w-100">
                            	<button type="submit" class="btn btn-primary w-100">Get Order</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
<?php endif ?>
<?php include('templete/footer.php') ?>