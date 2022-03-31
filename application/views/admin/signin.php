<?php include('templete/header.php')?>

<div class="peers ai-s fxw-nw h-100vh">
    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url('<?php echo base_url("assest/images/bg_2.jpg");?>')">
        <div class="pos-a centerXY">
            <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY" src="<?php echo base_url('assest/images/logo.png')?>" height="80" alt=""></div>
        </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40 text-center">Login</h4>
        <?php if (form_error('uname') || form_error('password')) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="alert alert-danger">
                            <?php echo form_error('uname'); ?>
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <form action="<?php echo base_url('index.php/admin/index')?>" method = "POST">
            <?php  if($error = $this->session->flashdata('Login_failed')){ ?>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    </div>
                </div>
            <?php }?>

            <div class="form-group">
                <label class="text-normal text-dark">Username</label>
                <?php echo form_input(['name' => 'uname', 'class' => 'form-control', 'value' => set_value('uname')])?>
                
            </div>
            <div class="form-group">
                <label class="text-normal text-dark">Password</label>
                <?php echo form_input(['name' => 'password', 'class' => 'form-control', 'type' => 'password', 'value' => set_value('password')]) ?>
               
            </div>
            <div class="form-group">
                <div class="peers ai-c jc-sb fxw-nw">
                    <div class="peer w-100">
                        <?php echo form_submit(['name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-outline-primary w-100']) ?>
                    </div>

                </div>
            </div>
        </form>
        <div class="peer w-100">
            <a href="" class="btn btn-outline-danger w-100 text-dark">Register</a>
        </div>
    </div>
</div>

<?php include('templete/footer.php')?>