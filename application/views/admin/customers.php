<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>


<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <!-- <h4 class="c-grey-900 mT-10 mB-30 text-center">All Customers</h4> -->
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">Customers</h4>
            	</div>
            	<!-- <div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php //echo base_url('/index.php/admin/add_customer') ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Customer</a>
            	</div> -->
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data['customer'] as $customers){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                <td> <a href=""><img src="<?php if(!empty($customers['img'])){echo base_url('/assest/images/user/').$customers['img'];}else{echo base_url('/assest/images/user/user.png');}?>" width = '50px'></a></td>
                                                <td><a href=""></a><?php echo $customers['name']; ?></td>
                                                <td><?php echo $customers['mobile_number'] ;?></td>
                                                <td><?php echo $customers['email_addr']; ?></td>
                                                <td><?php echo $customers['address']; ?></td>
                                                <td><?php echo $customers['date_time']; ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a onclick="deleteCategory(<?php echo $customers['id']?>)" style="cursor: pointer;" class="dropdown-item"> <i class="fa fa-trash mr-2"> </i> Delete User</a>
                                                            <a style="cursor: pointer;" class="dropdown-item" href="<?php //echo base_url('index.php/admin/edit_category/'.$customers['id'])?>"> <i class="fa fa-pencil mr-2"> </i>  Edit User</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                       <?php $sr++;  }
                                     ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include('templete/footer.php') ?>