<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">All Places</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php //echo base_url('/index.php/admin/add_order') ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Place</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Place Name</th>
                                    <th>Email Id</th>
                                    <th>Number</th>
                                    <th>Place Status</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Place Name</th>
                                    <th>Email Id</th>
                                    <th>Number</th>
                                    <th>Place Status</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data['places'] as $data){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                <td> <img src="<?php echo base_url('/assest/images/place/').$data['img']?>" alt="" style="height: 60px;border-radius: 50px;"></td>
                                                <td><?php echo $data['name'] ?></td>
                                                <td><?php echo $data['email_addr'] ?></td>
                                                <td><?php echo $data['mobile_number'] ?></td>
                                                <td>
                                                    <div class="layer w-100">
                                                        <div class="peers ai-sb fxw-nw">
                                                            <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 <?php 
                                                                if($data['place_status'] > 0){ echo "bgc-green-100 c-green-700";}else{echo "bgc-red-100 c-red-600";}
                                                            ?>"><?php if($data['place_status'] > 0){ echo "Active";}else{echo "Disabled";}?></span></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo  $data['address'].", City ".$data['city'].", Zip: ".$data['zip_code'];?></td>
                                                
                                                <td><?php echo $data['date_time'] ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a style="cursor: pointer;" class="dropdown-item"  onclick="disablePlace(<?php echo $data['id'];?>, 'Reject')"> <i class="fa fa-trash mr-2"> </i> Disable Place</a>
                                                            <a style="cursor: pointer;" class="dropdown-item" onclick="approvePlace(<?php echo $data['id'];?>)"> <i class="fa fa-check mr-2"> </i> Approve Place</a>
                                                            <a style="cursor: pointer;" class="dropdown-item" href="<?php //echo base_url('index.php/admin/edit_place/'.$data['id'])?>"> <i class="fa fa-pencil mr-2"> </i>  Edit Place</a>
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

    .dataTables_wrapper {
        overflow: visible !important;
    }

</style>

<?php include('templete/footer.php') ?>

<script type="text/javascript">
    function disablePlace(id, data){
        if (confirm('Are you sure your You want to Disable this place')) {
            location.replace("<?php echo base_url('/index.php/admin/disablePlace/');?>"+id);
        }
    }

    function approvePlace(id){
        if (confirm('Are you sure you Want to Active this Place.')) {
            location.replace("<?php echo base_url('/index.php/admin/approvePlace/');?>"+id);
        }
    }
</script>