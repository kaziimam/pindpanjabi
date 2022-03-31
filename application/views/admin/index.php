
<?php include('templete/header.php')?>
<?php include('templete/side_panel.php') ?>

<?php
    // $CI =& get_instance();
    // $CI->load->model('Admin_model');
    // $totla_purches = $CI->Admin_model->total_purches_product();
    // $total_avaiable_product = $CI->Admin_model->total_avaiable_product();
    // $totla_pending_order_count = $CI->Admin_model->order_count();
    // $totla_pending_order = $CI->Admin_model->all_order();
    // $bill_report = $CI->Admin_model->customer_bill_report($date1 = '2021-10-01',$date2 = '2021-11-01');
    // $bill_ammount = $CI->Admin_model->total_sale_report($date1 = '2021-10-01',$date2 = '2021-11-01');
    //print_r($bill_ammount);
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>

            <!-- Top Report -->
            <div class="masonry-item w-100">
                <div class="row gap-20">
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Sell</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">8<?php //echo $totla_purches[0]['qty']?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Order</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">8<?php //echo $totla_pending_order_count[0]['qty']?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Users</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?php //echo $totla_purches[0]['qty'] - $total_avaiable_product[0]['qty']?>8</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Total Places</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                    <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">9<?php //echo $total_avaiable_product[0]['qty']?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Status -->
            <div class="masonry-item col-md-6">
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 pX-20 pT-20">
                            <h6 class="lh-1">Monthly Stats</h6>
                        </div>
                        <div class="layer w-100 p-20"><canvas id="line-chart" height="220"></canvas></div>
                        <!-- <div class="layer bdT p-20 w-100">
                            <div class="peers ai-c jc-c gapX-20">
                                <div class="peer"><span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">APPL</small></div>
                                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Average</small></div>
                                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">Sales</small></div>
                                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Profit</small></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- To do List -->
            <div class="masonry-item col-md-6">
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100">
                            <div class="bgc-red-400 c-white p-10">
                                <div class="peers ai-c jc-sb gap-10">
                                    <div class="peer peer-greed">
                                        <h5>All Pending Orders</h5>
                                    </div>
                                    <div class="peer">
                                        <h3 class="text-right"><?php //echo $totla_pending_order_count[0]['qty'];?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="bdwT-0">Shop Name</th>
                                            <th class="bdwT-0">Status</th>
                                            <th class="bdwT-0">Product Name</th>
                                            <th class="bdwT-0">Qty</th>
                                            <th class="bdwT-0">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            //foreach($totla_pending_order as $orders){ ?>
                                                <tr>
                                                    <td> <span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill"><?php //echo $orders['name'] ?></span></td>

                                                    <td><a onclick="deleteorder()"><span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Complete Order</span></a></td>

                                                    <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill"><?php //echo $orders['product'] ?></span></td>

                                                    <td><span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill"><?php //echo $orders['qty'] ?></span></td>

                                                    <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill"><?php //echo date('Y-m-d', strtotime($orders['date_time'])) ?></span></td>
                                                </tr>
                                            <?php //}
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ta-c bdT w-100 p-20"><a href="<?php echo base_url('index.php/admin/order')?>">Check all </a></div>
                </div>
            </div>
            <div class="clear"></div>
            <!-- Sales Report -->
            <div class="masonry-item col-md-6">
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 p-20">
                            <h6 class="lh-1">Sales Report</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="bgc-light-blue-500 c-white p-20">
                                <div class="peers ai-c jc-sb gap-40">
                                    <div class="peer peer-greed">
                                        <h5><?php //echo $date1. " To " .$date2; ?></h5>
                                    </div>
                                    <div class="peer">
                                        <h3 class="text-right"><?php //echo $bill_ammount[0]['total_ammount'] ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="bdwT-0">Shop Name</th>
                                            <th class="bdwT-0">Product</th>
                                            <th class="bdwT-0">Date</th>
                                            <th class="bdwT-0">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //foreach ($bill_report as $bill_report): ?>
                                            <tr>
                                                <td class="fw-600"> <span class="badge bgc-deep-purple-50 c-purple-700 p-10 lh-0 tt-c badge-pill"><?php //echo $bill_report['shop_name'] ?></span></td>
                                                <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill"><?php //echo $bill_report['qty'] ?></span></td>
                                                <td> <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill"><?php //echo $bill_report['date_time'] ?></span></td>
                                                <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill"><?php //echo $bill_report['total_ammount'] ?></span></td>
                                            </tr>
                                        <?php //endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ta-c bdT w-100 p-20"><a href="#">Check all the sales</a></div>
                </div>
            </div>

            <!-- Weather -->
            <!-- <div class="masonry-item col-md-6">
                <div class="bd bgc-white p-20">
                    <div class="layers">
                        <div class="layer w-100 mB-20">
                            <h6 class="lh-1">Weather</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-c jc-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <div class="layers">
                                        <div class="layer w-100">
                                            <div class="peers fxw-nw ai-c">
                                                <div class="peer mR-20">
                                                    <h3>32<sup>°F</sup></h3>
                                                </div>
                                                <div class="peer"><canvas class="sleet" width="44" height="44"></canvas></div>
                                            </div>
                                        </div>
                                        <div class="layer w-100"><span class="fw-600 c-grey-600">Partly Clouds</span></div>
                                    </div>
                                </div>
                                <div class="peer">
                                    <div class="layers ai-fe">
                                        <div class="layer">
                                            <h5 class="mB-5">Monday</h5>
                                        </div>
                                        <div class="layer"><span class="fw-600 c-grey-600">Nov, 01 2017</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layer w-100 mY-30">
                            <div class="layers bdB">
                                <div class="layer w-100 bdT pY-5">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>Wind</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">10km/h</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 bdT pY-5">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>Sunrise</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">05:00 AM</span></div>
                                    </div>
                                </div>
                                <div class="layer w-100 bdT pY-5">
                                    <div class="peers ai-c jc-sb fxw-nw">
                                        <div class="peer"><span>Pressure</span></div>
                                        <div class="peer ta-r"><span class="fw-600 c-grey-800">1B</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layer w-100">
                            <div class="peers peers-greed ai-fs ta-c">
                                <div class="peer">
                                    <h6 class="mB-10">MON</h6><canvas class="sleet" width="30" height="30"></canvas><span class="d-b fw-600">32<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">TUE</h6><canvas class="clear-day" width="30" height="30"></canvas><span class="d-b fw-600">30<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">WED</h6><canvas class="partly-cloudy-day" width="30" height="30"></canvas><span class="d-b fw-600">28<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">THR</h6><canvas class="cloudy" width="30" height="30"></canvas><span class="d-b fw-600">32<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">FRI</h6><canvas class="snow" width="30" height="30"></canvas><span class="d-b fw-600">24<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">SAT</h6><canvas class="wind" width="30" height="30"></canvas><span class="d-b fw-600">28<sup>°F</sup></span>
                                </div>
                                <div class="peer">
                                    <h6 class="mB-10">SUN</h6><canvas class="sleet" width="30" height="30"></canvas><span class="d-b fw-600">32<sup>°F</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Quick Chat -->
            <!-- <div class="masonry-item col-md-6">
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 p-20">
                            <h6 class="lh-1">Quick Chat</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="bgc-grey-200 p-20 gapY-15">
                                <div class="peers fxw-nw">
                                    <div class="peer mR-20"><img class="w-2r bdrs-50p" src="../../../randomuser.me/api/portraits/men/11.jpg" alt=""></div>
                                    <div class="peer peer-greed">
                                        <div class="layers ai-fs gapY-5">
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mR-10"><small>10:00 AM</small></div>
                                                    <div class="peer-greed"><span>Lorem Ipsum is simply dummy text of</span></div>
                                                </div>
                                            </div>
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mR-10"><small>10:00 AM</small></div>
                                                    <div class="peer-greed"><span>the printing and typesetting industry.</span></div>
                                                </div>
                                            </div>
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mR-10"><small>10:00 AM</small></div>
                                                    <div class="peer-greed"><span>Lorem Ipsum has been the industry's</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="peers fxw-nw ai-fe">
                                    <div class="peer ord-1 mL-20"><img class="w-2r bdrs-50p" src="../../../randomuser.me/api/portraits/men/12.jpg" alt=""></div>
                                    <div class="peer peer-greed ord-0">
                                        <div class="layers ai-fe gapY-10">
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mL-10 ord-1"><small>10:00 AM</small></div>
                                                    <div class="peer-greed ord-0"><span>Heloo</span></div>
                                                </div>
                                            </div>
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mL-10 ord-1"><small>10:00 AM</small></div>
                                                    <div class="peer-greed ord-0"><span>??</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-20 bdT bgc-white">
                                <div class="pos-r"><input type="text" class="form-control bdrs-10em m-0" placeholder="Say something..."> <button type="button" class="btn btn-primary bdrs-50p w-2r p-0 h-2r pos-a r-1 t-1"><i class="fa fa-paper-plane-o"></i></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</main>


<?php include('templete/footer.php')?>
<script type="text/javascript">
    function deleteorder(){
        if (confirm('Are you sure your Order is completed. After click ok Your order will be deleted from Database')) {
            location.replace("<?php echo base_url('/index.php/admin/delete_order/').$totla_pending_order[0]['id'];?>");
        }
    }
</script>