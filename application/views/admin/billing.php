<?php include('templete/header.php'); ?>
<?php include('templete/side_panel.php'); ?>


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
			                            <?php echo form_error('shop_name'); ?>
			                            <?php echo form_error('shop_number'); ?>
			                            <?php for ($z=1; $z <=$data[0] ; $z++) { 
			                            	echo form_error('product_name_'.$z);
			                            	echo form_error('price_'.$z);
			                            	echo form_error('qty_'.$z);
			                            } ?>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        <?php } ?>
                    <div class="mT-30">
                        <?php echo form_open_multipart('index.php/admin/bill/'.$data[0]);?>

                            <div class="form-row">
                            	<div class="form-group col-md-4">
	                            	<label for="inputState">How many product</label>
	                            	<select name="ref" class="form-control add_customer_bill" required>
	                                    <option disabled="disabled" selected="selected">Choose...</option>
	                                    <?php
	                                    	for($i = 1; $i<=6; $i++){ ?>
												<option value="<?php echo $i;?>" <?php if ($i == $data[0]) { echo "selected";
												}?>>
												<?php echo $i;?>
											</option>
	                                    	<?php }
	                                    ?>
	                                </select>
	                            </div>

	                            <div class="form-group col-md-4">
                                	<label for="inputEmail4">Shop Name</label>
                                	<select name="shop_name" class="form-control" required>
	                                    <option disabled="disabled" selected="selected">Choose...</option>
	                                    <?php
	                                    	foreach($data[1] as $customer){ ?>
												<option value="<?php echo $customer['shop_name'];?>">
												<?php echo $customer['shop_name'];?>
											</option>
	                                    	<?php }
	                                    ?>
	                                </select>
                                </div>

                                <div class="form-group col-md-4">
                                	<label for="inputEmail4">Shop Number</label>
                                	<select name="shop_number" class="form-control" required>
	                                    <option disabled="disabled" selected="selected">Choose...</option>
	                                    <?php
	                                    	foreach($data[1] as $customer){ ?>
												<option value="<?php echo $customer['number'];?>">
												<?php echo $customer['shop_name']. "  =>  <b>" .  $customer['number'] ." </b> ";?>
											</option>
	                                    	<?php }
	                                    ?>
	                                </select>
                                </div>
                            </div>

                            	<div style="clear: both; margin-bottom: 20px; border-bottom: 2px solid #bbb; height:3px;"></div>

	                        	<?php for($j = 1; $j <= $data[0]; $j++){ ?>
		                        <div class="form-row">
	                                <div class="form-group col-md-4">
	                                	<label for="inputEmail4">Product Name</label>
	                                	<select name="product_name_<?php echo $j;?>" class="form-control" required>
		                                    <option disabled="disabled" selected="selected">Choose...</option>
		                                    <?php
		                                    	foreach($data[2] as $products){ ?>
	                                    			<option <?php if ($products['qty'] < 1){ echo 'disabled="disabled" style="color: #7e7d7d; background-color: #bbb;" ';}?> value="<?php echo $products['id'];?>">
														<?php echo $products['name'];?>
													</option>
		                                    	<?php }
		                                    ?>
		                                </select>
	                                </div>
	                                <div style="clear: both;"></div>
	                                <div class="form-group col-md-4">
	                                	<label for="inputEmail4">Product QTY</label>
		                                <?php echo form_input(['name' => "qty_$j", 'class' => 'form-control', 'value' => set_value("qty_$j")]) ?>
	                                </div>
	                                <div style="clear: both;"></div>

	                                <div class="form-group col-md-4">
	                                	<label for="inputEmail4">Product Price</label>
		                                <?php echo form_input(['name' => "price_$j", 'class' => 'form-control', 'value' => set_value("price_$j")]) ?>
	                                </div>
	                                <div style="clear: both;"></div>
                                </div>
                            	<?php }?>
                            	
                            <div class="form-group col-md-12 w-100">
                            	<button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
<?php include('templete/footer.php'); ?>

<script>
    $(document).ready(function(){
        $("select.add_customer_bill").change(function(){
            var selectedGratuity = $(this).children("option:selected").val();
            window.location.replace("<?php echo base_url('index.php/admin/bill/')?>"+selectedGratuity);
        });
    });
</script>
<style type="text/css">
	select[name = shop_number] option{
		border: 1px solid #bbb !important;
	}
</style>