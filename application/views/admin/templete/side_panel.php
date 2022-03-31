<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed"><a class="sidebar-link td-n" href="<?php echo base_url('/admin');?>" class="td-n">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                        <img class="img-responsive" src="<?php echo base_url('assest/images/logo.png')?>" alt="" style="padding-top: 10px;height: 55px;">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Pind Panjabi</h5>
                            </div>
                        </div>
                    </a></div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 active">
                    <a class="sidebar-link" href="<?php echo base_url('/admin')?>" default><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a>
                </li>

                <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title"> Products</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="sidebar-link" href="<?php echo base_url('/index.php/admin/all_product')?>"> <i class="c-orange-500 ti-layout-list-thumb"> </i> All Product</a></li>

                        <li><a class="sidebar-link" href="<?php echo base_url('/index.php/admin/allCategory')?>"> <i class="c-orange-500 ti-layout-list-thumb"> </i> All Category</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('index.php/admin/place')?>"><span class="icon-holder"><i class="c-deep-purple-500 ti-home"></i> </span><span class="title">Places</span></a></li>

                <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('index.php/admin/customers') ?>"><span class="icon-holder"><i class="c-deep-orange-500 ti-user"></i> </span><span class="title">Customers</span></a></li>

                <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('index.php/admin/order') ?>"><span class="icon-holder"><i class="c-deep-purple-500 ti-bar-chart"></i> </span><span class="title">Orders</span></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-container">
    <div class="header navbar">
        <div class="header-container">
            <ul class="nav-left">
                <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
                <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
            </ul>
            <ul class="nav-right">
                <!-- <li class="notifications dropdown"><span class="counter bgc-blue">3</span> <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-email"></i></a>
                    <ul class="dropdown-menu">
                        <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Emails</span></li>
                    </ul>
                </li> -->
                <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p" src="<?php echo base_url('assest/images/logo.png')?>" alt=""></div>
                    <div class="peer"><span class="fsz-sm c-grey-900"><?php echo $this->session->userdata('user'); ?></span></div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li><a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url('index.php/admin/logout')?>" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>