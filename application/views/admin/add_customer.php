<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Customer Entry</h6>
                    <?php if (form_error('name') || form_error('number') || form_error('email') || form_error('shop_name') || form_error('ref') || form_error('image')) { ?>
			            <div class="container">
			                <div class="row">
			                    <div class="col-lg-12 p-0">
			                        <div class="alert alert-danger">
			                            <?php echo form_error('name'); ?>
			                            <?php echo form_error('number'); ?>
			                            <?php echo form_error('email'); ?>
			                            <?php echo form_error('shop_name'); ?>
			                            <?php echo form_error('ref'); ?>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        <?php } ?>
                    <div class="mT-30">
                        <?php echo form_open_multipart('index.php/admin/add_customer');?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                	<label >Name</label>
                                	<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => set_value('name')]) ?>
                                </div>

                                <div class="form-group col-md-6">
                                	<label>Mobile</label>
                                	<?php echo form_input(['name' => 'number', 'class' => 'form-control', 'value' => set_value('number')]) ?>
                                </div>
                            </div>

                            <div class="form-row">
                            	<div class="form-group col-md-4">
                                	<label for="inputPassword4">Email</label>
                                	<?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => set_value('email')]) ?>
                                </div>

                                <div class="form-group col-md-4">
                                	<label for="inputEmail4">Shop Name</label>
                                	<?php echo form_input(['name' => 'shop_name', 'class' => 'form-control', 'value' => set_value('shop_name')]) ?>
                                </div>
                                <div class="form-group col-md-4">
                                	<label for="inputState">Refarence By </label>
                                	<select name="ref" class="form-control" required>
                                        <option>Choose...</option>
                                        <?php
                                        	foreach($data[0] as $user_name){ ?>
												<option value="<?php echo $user_name['user_name'];?>"><?php echo $user_name['user_name'];?></option>
                                        	<?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                            	<label for="inputAddress">Address</label>
                            	<?php echo form_input(['name' => 'address', 'class' => 'form-control', 'value' => set_value('address')]) ?>
                            </div>

                            <div class="form-group">
                            	<label for="inputAddress2">Image</label>
                            	<?php echo form_input(['name' => 'image', 'value' => set_value('image'), 'type' => 'file', 'class' => 'form-control','required' => 'required']) ?>
                            </div>
                            <div class="form-group col-md-12 w-100">
                            	<button type="submit" class="btn btn-primary w-100">Add Customer</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>


<?php include('templete/footer.php') ?>