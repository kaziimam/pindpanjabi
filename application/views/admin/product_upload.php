<?php include('templete/header.php');?>
<?php include('templete/side_panel.php');?>

<?php
    // $CI =& get_instance();
    // $CI->load->model('Admin_model');
    // $product_name = $CI->Admin_model->buy_product();
?>

<?php 

    if ($this->uri->segment(2) == "delete_product") {
        $page = "delete_product";
    }elseif($this->uri->segment(2) == "edit_product"){
        $page = "edit_product";
    }else{
        $page = "product_upload";
    }
 ?>
<?php if ($page == "product_upload"): ?>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
                <div class="masonry-sizer col-md-6"></div>
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">
                            Product Entry
                        </h6>

                        <?php if (form_error('product_name') || form_error('mrp') || form_error('qty') || form_error('size') || form_error('selling_price')) { ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 p-0">
                                        <div class="alert alert-danger" style="background-color: #ffffff;">
                                            <?php echo form_error('product_name'); ?>
                                            <?php echo form_error('mrp'); ?>
                                            <?php echo form_error('qty'); ?>
                                            <?php echo form_error('selling_price'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mT-30">
                            <?php echo form_open_multipart('/admin/add_product');?>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label >Name</label>
                                        <?php echo form_input(['name' => 'product_name', 'class' => 'form-control', 'value' => set_value('product_name')]) ?>
                                        <!-- <select name="product_name" class="form-control" required>
                                            
                                        </select> -->
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Product Category </label>
                                        <select name="product_type" class="form-control" required>
                                            <option discabled>Choose...</option>
                                            <?php
                                                foreach($data[0] as $category_name){ ?>
                                                    <option value="<?php echo $category_name['id'];?>"><?php echo $category_name['category_name'];?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Place</label>
                                        <select name="place" class="form-control" required>
                                            <option>Choose...</option>
                                            <?php
                                                foreach($data[1] as $places){ ?>
                                                    <option value="<?php echo $places['id'];?>"><?php echo $places['name'];?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label>MRP Price</label>
                                        <?php echo form_input(['name' => 'mrp', 'class' => 'form-control', 'value' => set_value('mrp')]) ?>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Selling Price</label>
                                        <?php echo form_input(['name' => 'selling_price', 'class' => 'form-control', 'value' => set_value('selling_price')]) ?>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">QTY</label>
                                        <?php echo form_input(['name' => 'qty', 'class' => 'form-control', 'value' => set_value('qty')]) ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Description</label>
                                        <textarea name="discription" class="form-control" height="150"></textarea>
                                       
                                    </div>

                                    <div class="form-group col-md-2">
                                        <div class="switch-wrapper">
                                            <!-- <label for="inputEmail4">Is Veg</label> -->
                                            <label>Is Veg
                                                <input class="switch" type="checkbox" name="is_veg" value="1">
                                                <div>
                                                <div></div>
                                                </div>
                                            </label>
                                        </div>
                                       
                                    </div>

                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="inputState">Image </label>
                                        <?php echo form_input(['name' => 'image', 'type' => 'file', 'class' => 'form-control']) ?>
                                    </div>
                                    
                                </div>

                                <div class="form-group col-md-12 w-100">
                                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
<?php endif ?>

<?php if ($this->uri->segment(2) == "edit_product"): ?>
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
                <div class="masonry-sizer col-md-6"></div>
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">
                            <?php
                                if ($page == "delete_product") {
                                    echo "Delete Product";
                                }elseif ($page == "edit_product") {
                                    echo "Edit Product";
                                }
                            ?>
                        </h6>

                        <?php if (form_error('product_name') || form_error('mrp') || form_error('qty') || form_error('selling_price')) { ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 p-0">
                                        <div class="alert alert-danger">
                                            <?php echo form_error('product_name'); ?>
                                            <?php echo form_error('mrp'); ?>
                                            <?php echo form_error('qty'); ?>
                                            <?php echo form_error('selling_price'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mT-30">
                            <?php echo form_open_multipart('/admin/do_edit');?>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label >Name</label>
                                        <?php echo form_input(['name' => 'product_name', 'class' => 'form-control', 'value' => $data['product'][0]['name']]) ?>
                                        <!-- <select name="product_name" class="form-control" required>
                                            
                                        </select> -->
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Product Category </label>
                                        <select name="product_type" class="form-control" required>
                                            <option discabled>Choose...</option>
                                            <?php
                                            // print_r('KAZI'.$data[0]);
                                                foreach($data['product_category'] as $category_name){ ?>
                                                
                                                    <option value="<?php echo $category_name['id'];?>" <?php if($category_name['id'] == $data['product'][0]['product_type']){echo "selected";}?>><?php echo $category_name['category_name'];?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputState">Place</label>
                                        <select name="place" class="form-control" required>
                                            <option>Choose...</option>
                                            <?php
                                                foreach($data['place'] as $places){ ?>
                                                    <option value="<?php echo $places['id'];?>" <?php if($places['id'] == $data['product'][0]['place_id']){echo "selected";}?>><?php echo $places['name'];?></option>
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>MRP Price</label>
                                        <?php echo form_input(['name' => 'mrp', 'class' => 'form-control', 'value' => $data['product'][0]['mrp']]) ?>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Selling Price</label>
                                        <?php echo form_input(['name' => 'selling_price', 'class' => 'form-control', 'value' => $data['product'][0]['selling_price']]) ?>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputPassword4">QTY</label>
                                        <?php echo form_input(['name' => 'qty', 'class' => 'form-control', 'value' => $data['product'][0]['qty']]) ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <div class="switch-wrapper">
                                            <!-- <label for="inputEmail4">Is Veg</label> -->
                                            <label>Is Veg
                                                <input class="switch" type="checkbox" name="is_veg" value="1">
                                                <div>
                                                <div></div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Description</label>
                                        <textarea name="discription" class="form-control" height="150">
                                            <?php echo $data['product'][0]['product_discription'];?>
                                        </textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="inputState">Image </label>
                                        <?php echo form_input(['name' => 'image', 'type' => 'file', 'class' => 'form-control']) ?>
                                    </div>
                                    
                                </div>
                                <?php echo form_input(['name' => 'id', 'value' => $data['product'][0]['id'], 'type' => 'hidden']) ?>

                                <div class="form-group col-md-12 w-100">
                                    <?php if ($page == "delete_product"): ?>
                                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                                    <?php else: ?>
                                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                                    <?php endif ?>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>
<?php endif ?>
<style>
    
/* css for the switcher */
html,
body {
  height: 100%;
  background-color: #D1D5DB;
}

.switch-wrapper {
  display: grid;
  place-content: center;
  min-height: 100%;
}

.switch {
  display: none;
}

.switch + div {
  width: 48px;
  height: 24px;
  border-radius: 12px;
  background-color: #ff1313;
  transition: background-color 200ms;
  cursor: pointer;
}

.switch:checked + div {
  background-color: #00a850;
}

.switch + div > div {
  width: 24px;
  height: 24px;
  border-radius: 23px;
  background-color: #fff;
  transition: transform 250ms;
  pointer-events: none;
}

.switch:checked + div > div {
  transform: translateX(28px);
}
</style>
<?php include('templete/footer.php');?>