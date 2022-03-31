<?php include('templete/header.php');?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">All Category</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a data-toggle="modal" data-target="#addCategory" class="btn btn-primary mB-20 text-white" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Category</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                    <th> Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data['all_category'] as $all_category){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                
                                                <td><?php echo $all_category['category_name']; ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a onclick="deleteCategory(<?php echo $all_category['id']?>)" style="cursor: pointer;" class="dropdown-item"> <i class="fa fa-trash mr-2"> </i> Delete Category</a>
                                                            <a style="cursor: pointer;" class="dropdown-item" href="<?php echo base_url('index.php/admin/edit_category/'.$all_category['id'])?>"> <i class="fa fa-pencil mr-2"> </i>  Edit Category</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                       <?php $sr++;  }
                                     ?>
                            </tbody>
                        </table>
                        <div class="text-right pagination_btn">
						    <?= $this->pagination->create_links(); ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Add category model -->
<div class="modal" id="addCategory" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="col-md-12 mb-5 pt-4">
            <?php echo form_open_multipart('index.php/admin/add_category');?>
            <label for="inputState">Add Category </label>
            <?php echo form_input(['name'=>'category_name','class' => 'form-control mb-4', 'value' => set_value('category_name'), 'required' =>'required'])?>
            <button type="submit" class="btn btn-success col-md-12"> Add Category </button>
            <?php echo form_close();?>
        </div>
    </div>
  </div>
</div>



<style type="text/css">
	.dataTables_info#dataTable_info,
	.dataTables_paginate#dataTable_paginate{
		display: none !important;
	}

	span.btn-info a,
	button.btn-info a{
		color: #fff !important;
	}

</style>

<script type="text/javascript">
    function deleteCategory(id){
        if (confirm('Are you sure You want to delete this Category.')) {
            location.replace("<?php echo base_url('/index.php/admin/deleteCategory/');?>"+id);
        }
    }
</script>
<?php include('templete/footer.php');?>