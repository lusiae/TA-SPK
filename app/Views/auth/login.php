<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SPK Bidikmisi</title>

    <base href="<?php

                use PhpParser\Node\Stmt\Echo_;

                echo base_url('Form_Login') ?>/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/baru.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form p-lg-5">
                    <div class="text-center m-t-0">
                        <img src="images/icons/baru.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="130px" alt="profile">
                    </div>

                    <span class="login100-form-title  m-t-0 m-b-20">
                        Login to continue
                    </span>
                    <?php $validation =  \Config\Services::validation(); ?>
                    <form action="<?= site_url('auth/loginProcess') ?>" method="post">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show ">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert"> </button>
                                    <b>Error ! </b>
                                    <?= session()->getFlashdata('error'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">
                                Username
                            </label>
                            <input type="text" name="username_Sadmin" class="form-control <?= ($validation->hasError('username_Sadmin')) ? 'is-invalid'
                                                                                                : ''; ?>" value="<?= old('username_Sadmin') ?>" id="inputUsername" placeholder="Masukan Username">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username_Sadmin') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid'
                                                                                            : ''; ?>" value="<?= old('password') ?>" id="inputPassword" placeholder="Masukan Password">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>

                        <p><br></p>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="login" class="login100-form-btn" value="LOGIN">
                        </div>
                    </form>
                    <br>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p class="text-inverse text-center m-t-10 m-b-0">&copy; <a href="https://pnm.ac.id/" target="_blank">Bidikmisi PNM</a> <b><?= date('Y'); ?></b></p>
                        </div>
                    </div>
                </div>

                <div class="login100-more" style="background-image: url('images/bg-02.jpg');" class="img-fluid">

                </div>
            </div>

        </div>
    </div>
</body>

</html>