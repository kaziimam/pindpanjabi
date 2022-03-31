<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<?php if ($this->uri->segment(2) == "edit_buy_product"): ?>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
                <div class="masonry-sizer col-md-6"></div>
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">Edit Buy Product Details</h6>
                        <?php if (form_error('name') || form_error('buy_from') || form_error('buy_price') || form_error('qty') || form_error('size') || form_error('expence')) { ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 p-0">
                                        <div class="alert alert-danger">
                                            <?php echo form_error('name'); ?>
                                            <?php echo form_error('buy_from'); ?>
                                            <?php echo form_error('buyer_address'); ?>
                                            <?php echo form_error('buy_price'); ?>
                                            <?php echo form_error('qty'); ?>
                                            <?php echo form_error('size'); ?>
                                            <?php echo form_error('expence'); ?>
                                            <?php echo form_error('seling_price'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mT-30">
                            <?php echo form_open_multipart('index.php/admin/edit_buy_product/'.$this->uri->segment(3));?>
                                <div class="form-row">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label >Name</label>
                                        <?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => $data[0]['name']]) ?>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label>Buyer Mobile</label>
                                        <?php echo form_input(['name' => 'buyer_number', 'class' => 'form-control', 'value' => $data[0]['buyer_number']]) ?>
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="inputEmail4">Shop Name</label>
                                        <?php echo form_input(['name' => 'buy_from', 'class' => 'form-control', 'value' => $data[0]['buy_from']]) ?>
                                    </div>
                                    
                                </div>                            

                                <div class="form-row">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="inputAddress"> Buyer Address</label>
                                        <?php echo form_input(['name' => 'buyer_address', 'class' => 'form-control', 'value' => $data[0]['buyer_address']]) ?>
                                    </div>
                                    <div class="form-group col-md-2 col-xs-6">
                                        <label for="inputAddress"> Buying Price</label>
                                        <?php echo form_input(['name' => 'buy_price', 'class' => 'form-control', 'value' => $data[0]['buy_price']]) ?>
                                    </div>
                                    <div class="form-group col-md-2 col-xs-6">
                                        <label for="inputAddress"> QTY</label>
                                        <?php echo form_input(['name' => 'qty', 'class' => 'form-control', 'value' => $data[0]['qty']]) ?>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-6">
                                        <label for="inputAddress"> Product Category</label>
                                        <?php echo form_input(['name' => 'category', 'class' => 'form-control', 'value' => $data[0]['category']]) ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class=" from-group col-md-4  col-xs-12">
                                        <label for="inputAddress2">Size</label>
                                        <?php echo form_input(['name' => 'size', 'value' => $data[0]['size'],'class' => 'form-control']) ?>
                                    </div>
                                    <div class=" from-group col-md-4  col-xs-12">
                                        <label for="inputAddress2">Expence</label>
                                        <?php echo form_input(['name' => 'expence', 'value' => $data[0]['expence'],'class' => 'form-control']) ?>
                                    </div>
                                    <div class=" from-group col-md-4  col-xs-12">
                                     <!--    <label for="inputAddress2">Total Bill</label>
                                        <?php //echo form_input(['name' => 'total_bill', 'value' => $data[0]['total_bill'],'class' => 'form-control']) ?>
                                    </div>  -->                             
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="inputState">Sole </label>
                                        <?php echo form_input(['name' => 'sole', 'class' => 'form-control', 'value' => $data[0]['sole']]) ?>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="inputState">Heel </label>
                                        <?php echo form_input(['name' => 'heel', 'class' => 'form-control', 'value' => $data[0]['heel']]) ?>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <label for="inputState">Packing </label>
                                        <select name="packing" class="form-control" required>
                                            <option disabled="disabled" selected="selected">Choose...</option>
                                            <option value="Without Box" <?php if ($data[0]['packing'] == 'Without Box'){echo "selected";} ?>>Without Box</option>
                                            <option value="With Box" <?php if ($data[0]['packing'] == 'With branded Box'){echo "selected";} ?>>With branded Box</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="inputState">Seeling Price </label>
                                        <?php echo form_input(['name' => 'seling_price', 'class' => 'form-control', 'value' =>'']) ?>
                                    </div>

                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="inputState">Image </label>
                                        <?php echo form_input(['name' => 'image', 'type' => 'file', 'class' => 'form-control']) ?>
                                    </div>

                                </div>

                                <div class="clear"></div>
                                <div class="form-group col-md-12 w-100">
                                    <button type="submit" class="btn btn-primary w-100">Add Buy Detais</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
<?php endif ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900"> Buy Product Details</h6>
                    <?php if (form_error('name') || form_error('buy_from') || form_error('buy_price') || form_error('qty') || form_error('size') || form_error('expence')) { ?>
			            <div class="container">
			                <div class="row">
			                    <div class="col-lg-12 p-0">
			                        <div class="alert alert-danger">
			                            <?php echo form_error('name'); ?>
			                            <?php echo form_error('buy_from'); ?>
                                        <?php echo form_error('buyer_address'); ?>
			                            <?php echo form_error('buy_price'); ?>
			                            <?php echo form_error('qty'); ?>
			                            <?php echo form_error('size'); ?>
			                            <?php echo form_error('expence'); ?>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        <?php } ?>
                    <div class="mT-30">
                        <?php echo form_open_multipart('index.php/admin/add_buy_product');?>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-xs-12">
                                	<label >Name</label>
                                	<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => set_value('name')]) ?>
                                </div>

                                <div class="form-group col-md-4 col-xs-12">
                                	<label>Buyer Mobile</label>
                                	<?php echo form_input(['name' => 'buyer_number', 'class' => 'form-control', 'value' => set_value('buyer_number')]) ?>
                                </div>

                                <div class="form-group col-md-4 col-xs-12">
                                	<label for="inputEmail4">Shop Name</label>
                                	<?php echo form_input(['name' => 'buy_from', 'class' => 'form-control', 'value' => set_value('buy_from')]) ?>
                                </div>
                                
                            </div>                            

                            <div class="form-row">
                            	<div class="form-group col-md-4 col-xs-12">
	                            	<label for="inputAddress"> Buyer Address</label>
	                            	<?php echo form_input(['name' => 'buyer_address', 'class' => 'form-control', 'value' => set_value('buyer_address')]) ?>
                            	</div>
                            	<div class="form-group col-md-2 col-xs-6">
	                            	<label for="inputAddress"> Buying Price</label>
	                            	<?php echo form_input(['name' => 'buy_price', 'class' => 'form-control', 'value' => set_value('buy_price')]) ?>
                            	</div>
                            	<div class="form-group col-md-2 col-xs-6">
	                            	<label for="inputAddress"> QTY</label>
	                            	<?php echo form_input(['name' => 'qty', 'class' => 'form-control', 'value' => set_value('qty')]) ?>
                            	</div>
                            	<div class="form-group col-md-4 col-xs-6">
	                            	<label for="inputAddress"> Product Category</label>
	                            	<?php echo form_input(['name' => 'category', 'class' => 'form-control', 'value' => set_value('category')]) ?>
                            	</div>
                            </div>

                            <div class="form-row">
                            	<div class=" from-group col-md-4  col-xs-12">
                            		<label for="inputAddress2">Size</label>
                            		<?php echo form_input(['name' => 'size', 'value' => set_value('size'),'class' => 'form-control']) ?>
                            	</div>
                            	<div class=" from-group col-md-4  col-xs-12">
                            		<label for="inputAddress2">Expence</label>
                            		<?php echo form_input(['name' => 'expence', 'value' => set_value('expence'),'class' => 'form-control']) ?>
                            	</div>
                            	<div class=" from-group col-md-4  col-xs-12">
                            		<!-- <label for="inputAddress2">Total Bill</label> -->
                            		<?php //echo form_input(['name' => 'total_bill', 'value' => set_value('total_bill'),'class' => 'form-control']) ?>
                            	</div>                            	
                            </div>
                            <div class="form-row">
                            	<div class="form-group col-md-4 col-xs-12">
                            		<label for="inputState">Sole </label>
                                	<?php echo form_input(['name' => 'sole', 'class' => 'form-control', 'value' => set_value('sole')]) ?>
                            	</div>
                            	<div class="form-group col-md-4 col-xs-12">
                            		<label for="inputState">Heel </label>
                                	<?php echo form_input(['name' => 'heel', 'class' => 'form-control', 'value' => set_value('heel')]) ?>
                            	</div>
                            	<div class="form-group col-md-4 col-xs-12">
                            		<label for="inputState">Packing </label>
                                	<select name="packing" class="form-control" required>
                                        <option disabled="disabled" selected="selected">Choose...</option>
                                        <option value="Without Box">Without Box</option>
                                        <option value="With Box">With branded Box</option>
                                    </select>
                            	</div>

                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="inputState">Seeling Percentage ( % )</label>
                                    <?php echo form_input(['name' => 'seling_price', 'class' => 'form-control', 'value' => set_value('seling_price')]) ?>
                                </div>

                                <div class="form-group col-md-6 col-xs-12">
                                    <label for="inputState">Image </label>
                                    <?php echo form_input(['name' => 'image', 'type' => 'file', 'class' => 'form-control']) ?>
                                </div>

                            </div>

                            <div class="clear"></div>
                            <div class="form-group col-md-12 w-100">
                            	<button type="submit" class="btn btn-primary w-100">Add Buy Detais</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
<?php include('templete/footer.php') ?>