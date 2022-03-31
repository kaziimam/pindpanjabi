<?php include('header.php'); ?>
<?php include('side_panel.php'); ?>

<?php //print_r($data);exit(); ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <!-- <h4 class="c-grey-900 mT-10 mB-30 text-center">All Customers</h4> -->
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">Customers</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php echo base_url('/index.php/admin/bill') ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Bill</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Name</th>
                                    <th>Shop Name</th>
                                    <th>Mobile</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Total Ammount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Name</th>
                                    <th>Shop Name</th>
                                    <th>Mobile</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Total Ammount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php //print_r($data); ?>
                               
                                    <?php 
                                    $sr = 1;
                                        foreach($data as $customers){ ?>
                                            <tr>
                                                <td><?php echo $sr ;?></td>
                                                <td><a href=""></a><?php echo $customers['shop_name']; ?></td>
                                                <td><?php echo $customers['shop_name'] ;?></td>
                                                <td><?php echo $customers['number'] ;?></td>
                                                <td><?php echo $customers['product_id']; ?></td>
                                                <td><?php echo $customers['price']; ?></td>
                                                <td><?php echo $customers['qty'];; ?></td>
                                                <td><?php echo $customers['total_ammount'] ;?></td>
                                                <td><?php echo $customers['date_time'] ;?></td>
                                                <td>
                                                    <a href=""><i class="fa fa-arrow-circle-left"></i></a>
                                                    <a href=""><i class="fa fa-arrow-circle-left"></i></a>
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



<?php include('footer.php'); ?>