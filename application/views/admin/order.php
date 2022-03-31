<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">All Order</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php  ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Take Order On Phone Call</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs  table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th style="min-width: 105px !important;">Shop Name</th>
                                    <th style="width: 276px !important;">Product Name</th>
                                    <th style="width: 105px !important;">User Name</th>
                                    <th>User Number</th>
                                    <th>Address</th>
                                    <th>Total Price</th>
                                    <th>Payment Mode</th>
                                    <th>Order Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th><b>#</b></th>
                                    <th>Shop Name</th>
                                    <th>Product Name</th>
                                    <th>User Name</th>
                                    <th>User Number</th>
                                    <th>Address</th>
                                    <th>Total Price</th>
                                    <th>Payment Mode</th>
                                    <th>Order Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data as $data){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                
                                                <td><?php echo $data['place_name'] ?></td>
                                                <td>
                                                    <?php 
                                                        foreach(json_decode($data['product'], true) as $all_product){?>
                                                        <table>
                                                            
                                                        <tr class="<?php if($all_product['is_veg'] == "veg"){echo "bg-success text-light";}else{echo "bg-danger text-light";}?>">
                                                            <td>
                                                                <span class="pr-3"><?php print_r($all_product['name'])?> </span> 
                                                            </td>
                                                            <td>
                                                                Qty <?php echo $all_product['qty'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $all_product['is_veg'];?>
                                                            </td>
                                                        </tr>
                                                        
                                                        </table>
                                                            
                                                        <?php }
                                                    ?>
                                                    <?php //echo "<pre>"; print_r(json_decode($data['product'], true))?>
                                                </td>
                                                <td><?php echo $data['user_name'] ?></td>
                                                <td><?php echo $data['user_number'] ?></td>
                                                <td><?php echo $data['order_city'].' '.$data['order_address'].', Zipcode: '. $data['order_zip'].', Nare: '.$data['order_landmark'] ?></td>
                                                <td><?php echo $data['total_price'] ?></td>
                                                <td><?php echo $data['payment_mode'] ?></td>
                                                <td>
                                                <div class="layer w-100">
                                                    <div class="peers ai-sb fxw-nw">
                                                        <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 
                                                        <?php 
                                                            if($data['order_status'] == "Pending"){echo "bgc-yellow-100 c-yellow-900";}elseif($data['order_status'] == "Rejected"){echo "bgc-red-100 c-red-500";}
                                                            elseif($data['order_status'] == "Approved"){echo "bgc-green-100 c-green-500";}
                                                        ?>"><?php echo $data['order_status'];?></span></div>
                                                    </div>
                                                </div>
                                                </td>
                                                <td><?php echo $data['date_time'] ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a style="cursor:pointer;" class="dropdown-item"  onclick="deleteorder(<?php echo $data['order_id'];?>, 'Reject')"> <i class="fa fa-trash mr-2"> </i> Reject Order</a>
                                                            <a style="cursor:pointer;" class="dropdown-item" onclick="approveOrder(<?php echo $data['order_id'];?>)"> <i class="fa fa-check mr-2"> </i> Approve Order</a>
                                                            <a style="cursor:pointer;" class="dropdown-item" href="#"> <i class="fa fa-pencil mr-2"> </i>  Edit Order</a>
                                                        </div>
                                                    </div>


                                                    <!-- <a onclick="deleteorder()"><i> <img src="<?php //echo base_url('assest/images/icon/delete_round_border.svg') ?> " height="19px" width="19px"></i></a>
                                                    <a href="<?php //echo base_url('/index.php/admin/edit_order/').$data['id']; ?>" style=""><i> <img src="<?php //echo base_url('assest/images/icon/edit_icon.svg') ?>" height="10"></i></a> -->
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

    .dataTables_wrapper {
        overflow: visible !important;
    }
</style>

<?php include('templete/footer.php') ?>

<script type="text/javascript">
    function deleteorder(id, data){
        if (confirm('Are you sure your Order is completed. After click ok Your order will be deleted from Database')) {
            location.replace("<?php echo base_url('/index.php/admin/reject_order/');?>"+id);
        }
    }

    function approveOrder(id){
        if (confirm('Are you sure you Want to Approve the Order.')) {
            location.replace("<?php echo base_url('/index.php/admin/approveOrder/');?>"+id);
        }
    }
</script>