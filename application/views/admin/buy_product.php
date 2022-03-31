<?php include('templete/header.php') ?>
<?php include('templete/side_panel.php') ?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-6 col-xs-6 hidden-xs">
            		<h4 class="c-grey-900 mB-20">Purchese Products</h4>
            	</div>
            	<div class="col-md-6 col-xs-12 text-right">
            		<a href="<?php echo base_url('/index.php/admin/add_buy_product') ?>" class="btn btn-primary mB-20" roll="button"> <span class="c-orange-500 ti-plush"></span> Add Products</a>
            	</div>
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <table id="dataTable" class="table table-striped table-responsive-xs table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Buy From</th>
                                    <th>Buy Price</th>
                                    <th>QTY</th>
                                    <th>Expence</th>
                                    <th>Total Bill</th>
                                    <th>Size</th>
                                    <th>End Rate</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><b>#</b></th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Buy From</th>
                                    <th>Buy Price</th>
                                    <th>QTY</th>
                                    <th>Expence</th>
                                    <th>Total Bill</th>
                                    <th>Size</th>
                                    <th>Sell Price</th>
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
                                            <td>
                                                <img class="img-responsive" height="50" src="<?php echo  base_url('/assest/images/product/').$data['image']?>">
                                            </td>
                                            <td><a href=""></a><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['buy_from'] ;?></td>
                                            <td><?php echo $data['buy_price'] ;?></td>
                                            <td><?php echo $data['qty'] ;?></td>
                                            <td><?php echo $data['expence']; ?></td>
                                            <td><?php echo $data['total_bill']+$data['expence'] ; ?></td>
                                            <td><?php echo $data['size']; ?></td>
                                            <td class="c-green-700"><b><?php //echo number_format(($data['total_bill']+$data['expence'])/$data['qty'], 1, '.', '') ;
                                                echo number_format($data['seling_price'], 1, '.', '') ;
                                                ?></b>
                                            </td>
                                            <td><?php echo date('Y-m-d', strtotime($data['date_time'])) ;?></td>
                                            <td width="110">
                                                <a onclick="delete_buy_product()"><i> <img src="<?php echo base_url('assest/images/icon/delete_round_border.svg') ?> " height="25px"></i></a>
                                                <a href="<?php echo base_url('/index.php/admin/edit_buy_product/').$data['id']; ?>" style="margin: 5px;border-radius: 50px;border: 1px solid;padding: 1px 5px 5px 5px;"><i> <img src="<?php echo base_url('assest/images/icon/edit_icon.svg') ?>" height="15"></i></a>
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

<?php include('templete/footer.php') ?>
<script type="text/javascript">
    function delete_buy_product(){
        if (confirm('Are you sure? You want to Delete it')) {
            location.replace("<?php echo base_url('/index.php/admin/delete_buy/').$data['id'];?>");
        }
    }
</script>