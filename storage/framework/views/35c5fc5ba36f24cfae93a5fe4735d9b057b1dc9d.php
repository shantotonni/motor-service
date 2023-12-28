<title>Login | Motor Autonomous</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-image: linear-gradient(to right, #fdefff, #ffe388);
        background-repeat: no-repeat;
    }

    input, textarea {
        background-color: #F3E5F5;
        border-radius: 50px !important;
        padding: 12px 15px 12px 15px !important;
        width: 100%;
        box-sizing: border-box;
        border: none !important;
        border: 1px solid #F3E5F5 !important;
        font-size: 16px !important;
        color: #000 !important;
        font-weight: 400;
    }
    input:focus, textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #D500F9 !important;
        outline-width: 0;
        font-weight: 400;
    }
    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0;
    }
    .card {
        border-radius: 0;
        border: none;
    }
    .card1 {
        width: 50%;
        padding: 40px 30px 10px 30px;
    }
    .card2 {
        width: 50%;
        background-image: linear-gradient(to right, #FFD54F, #D500F9);
    }
    /*#logo {*/
    /*    width: 70px;*/
    /*    height: 60px;*/
    /*}*/
    .heading {
        margin-bottom: 60px !important;
    }
    ::placeholder {
        color: #000 !important;
        opacity: 1;
    }
    :-ms-input-placeholder {
        color: #000 !important;
    }
    ::-ms-input-placeholder {
        color: #000 !important;
    }
    .form-control-label {
        font-size: 12px;
        margin-left: 15px;
    }
    .msg-info {
        padding-left: 15px;
        margin-bottom: 30px;
    }
    .btn-color {
        border-radius: 50px;
        color: #fff;
        background-image: linear-gradient(to right, #FFD54F, #D500F9);
        padding: 15px;
        cursor: pointer;
        border: none !important;
        margin-top: 40px;
    }
    .btn-color:hover {
        color: #fff;
        background-image: linear-gradient(to right, #D500F9, #FFD54F);
    }
    .btn-white {
        border-radius: 50px;
        color: #D500F9;
        background-color: #fff;
        padding: 8px 40px;
        cursor: pointer;
        border: 2px solid #D500F9 !important;
    }
    .btn-white:hover {
        color: #fff;
        background-image: linear-gradient(to right, #FFD54F, #D500F9);
    }
    a {
        color: #000;
    }

    a:hover {
        color: #000;
    }

    .bottom {
        width: 100%;
        margin-top: 50px !important;
    }

    .sm-text {
        font-size: 15px;
    }

    @media  screen and (max-width: 992px) {
        .card1 {
            width: 100%;
            padding: 40px 30px 10px 30px;
        }

        .card2 {
            width: 100%;
        }

        .right {
            margin-top: 100px !important;
            margin-bottom: 100px !important;
        }
    }

    @media  screen and (max-width: 768px) {
        .container {
            padding: 10px !important;
        }

        .card2 {
            padding: 50px;
        }

        .right {
            margin-top: 50px !important;
            margin-bottom: 50px !important;
        }
    }
</style>
<div class="container px-4 py-5 mx-auto">
    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">
                            <div class="row justify-content-center px-3 mb-3">
                                <img id="logo" src="<?php echo e(asset('logo/logo.jpeg')); ?>" style="width: 160px">
                            </div>
                            

                            

                            <div class="form-group">
                                <label class="form-control-label text-muted">Username</label>
                                <input type="text" id="username" name="username" placeholder="Enter Username" class="form-control">
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-muted">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="row justify-content-center my-3 px-3">
                                <button class="btn-block btn-color">Login</button>
                            </div>

                            
                            
                            
                        </div>
                    </div>
                </form>



            </div>
            <div class="card card2">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">ACI Motors Agri-machineries Service Team</h3>
                    <small class="text-white">
                        We are the largest service team in the Agri-machineries industry.
                        We are improving lives with high-tech advantages in sustainable agriculture and providing the best after-sales on-the-spot service within 6 hours.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\motor-service\resources\views/auth/login.blade.php ENDPATH**/ ?>