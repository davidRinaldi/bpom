<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIPH BBPOM Padang</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url();?>assets/images/mapala.png" type="image/gif">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>pengaduanyanblik@pom.go.id
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+6221 4244691 / 42883309 / 42883462
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="nav navbar-nav navbar-left" href="#">
                    <img src="<?php echo base_url();?>assets/img/bpom.jpg" width="150" height="90"/>
                </a>
            </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->

    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Sistim Informasi Pendataan Hasil Pemeriksaan Sarana Distribusi dan Sarana Produksi BBPOM Padang</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                  <!-- ========== Flashdata ========== -->
                  <?php echo $this->session->flashdata("msg");?>
                      <!-- ========== End Flashdata ========== -->
                    <form action="<?php echo base_url();?>login/login_akses" method="post">
                        <label>Username : </label>
                        <input type="text" name="username" class="form-control" />
                        <label>Password :  </label>
                        <input type="password" name="password" class="form-control" />
                        <hr />
                        <input type="submit" name="masuk" value="Login" class="btn btn-info">
                    </form>
                </div>
                <br />
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <div style='text-align:justify;'>
                        <h6><strong>Sistim Informasi Pendataan Hasil Pemeriksaan Sarana Distribusi dan Sarana Produksi BBPOM Padang</strong></h6>
                        <ul>
                            <li>
                            Silahkan login terlebih dahulu untuk menikmati fasilias yang kami sediakan.
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
                  Copyright &copy; 2018 STMIK INDONESIA 
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url();?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script>
      !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
          $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);

      $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
    </script>
</body>
</html>
