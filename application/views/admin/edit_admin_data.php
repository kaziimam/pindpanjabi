<?php include('templete/header.php')?>
<?php include('templete/side_panel.php')?>

<!-- Update  category  -->
    <main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="row gap-20 masonry pos-r">
                <div class="masonry-sizer col-md-6"></div>
                <div class="masonry-item col-md-12">
                    <div class="bgc-white p-20 bd">
                        <h6 class="c-grey-900">
                            <?php
                                if ($this->uri->segment(2) == "edit_category") {
                                    echo "Edit Category";
                                }elseif ($this->uri->segment(2) == "edit_place") {
                                    echo "Edit Place";
                                }
                            ?>
                        </h6>
                        <?php if($this->uri->segment(2) == "edit_category"):?>
                            <?php if (form_error('category_name')) { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 p-0">
                                            <div class="alert alert-danger">
                                                <?php echo form_error('category_name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="mT-30">
                                <?php echo form_open_multipart('/admin/category_update');?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label >Name</label>
                                            <?php echo form_input(['name' => 'category_name', 'class' => 'form-control', 'value' => $data[0]['category_name']]) ?>
                                            <?php echo form_input(['name' => 'category_id', 'type'=>'hidden', 'class' => 'form-control', 'value' => $data[0]['id']]) ?>
                                        </div>
                                        <div class="form-group col-md-12 w-100">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                        </div>
                                <?php echo form_close(); ?>
                            </div>

                        <?php elseif($this->uri->segment(2) == "edit_place"):?>
                            <?php if (form_error('place_name')) { ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 p-0">
                                            <div class="alert alert-danger">
                                                <?php echo form_error('place_name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="mT-30">
                                <?php echo form_open_multipart('/admin/category_update');?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label >Name</label>
                                            <?php echo form_input(['name' => 'place_name', 'class' => 'form-control', 'value' => $data[0]['name']]) ?>
                                            <?php echo form_input(['name' => 'category_id', 'type'=>'hidden', 'class' => 'form-control', 'value' => $data[0]['id']]) ?>
                                        </div>
                                        <div class="form-group col-md-12 w-100">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                        </div>
                                <?php echo form_close(); ?>
                            </div>
                        <?php endif ;?>
                    </div>
                </div>
                
            </div>
        </div>
    </main>

<?php include('templete/footer.php');?>