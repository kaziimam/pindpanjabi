<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">All Products</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php echo base_url('/index.php/admin/add_product') ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Products</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                	<th>Image</th>
                                    <th>Name</th>
                                    <th>Outlet</th>
                                    <th>QTY</th>
                                    <th>Is Veg</th>
                                    <th>MRP</th>
                                    <th>Sell Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                	<th>Image</th>
                                    <th>Name</th>
                                    <th>Outlet</th>
                                    <th>QTY</th>
                                    <th>Is Veg</th>
                                    <th>Size</th>
                                    <th>Sell Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data as $products){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                <td  width="85"> <a href=""><img class="img-responsive" src="<?php echo base_url('/assest/images/product/').$products['product_img'] ;?>" height = '50px'></a></td>
                                                <td width="150"><a href=""></a><?php echo $products['product_name']; ?></td>
                                                <td>
                                                    <img class="img-responsive" src="<?php echo base_url('/assest/images/place/').$products['place_img'] ;?>" style="height: 50px; border-radius: 50px;">
                                                    <?php //echo $products['category_name'] ;?>
                                                </td>
                                                <td width="150">
                                                    <?php
                                                        if ($products['qty'] > 0) {?>
                                                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">Available (<?php echo $products['qty'] ; ?>)</span></div>
                                                        <?php }else{?>
                                                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">Unavailable (<?php echo $products['qty'] ; ?>)</span></div>
                                                        <?php }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if($products['is_veg'] > 0):?>
                                                        <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">Veg</span></div>
                                                    <?php else:?>
                                                        <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">Non Veg</span></div>
                                                    <?php endif;?>
                                                </td>
                                                <td><?php echo $products['mrp']; ?></td>
                                                <td><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-700"><?php echo number_format($products['selling_price'], 1, '.', '') ; ?></span></td>
                                                <td><?php echo date('Y-m-d', strtotime($products['date_time']));?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a style="cursor: pointer;" class="dropdown-item"  onclick="deleteproduct(<?php echo $products['product_id'];?>)"> <i class="fa fa-trash mr-2"> </i> Delete Product</a>
                                                            <a style="cursor: pointer;" class="dropdown-item" href="<?php echo base_url('/index.php/admin/edit_product/').$products['product_id']; ?>"> <i class="fa fa-pencil mr-2"> </i>  Edit Product</a>
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
    function deleteproduct(id){
        if (confirm('Are you sure You want to delete. After click ok Your product will be deleted from Database')) {
            location.replace("<?php echo base_url('/index.php/admin/delete_product/');?>"+id);
        }
    }
</script>

<?php include('templete/footer.php') ?>