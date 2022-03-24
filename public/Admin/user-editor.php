<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Hot & Tasty Admin page </title>
    <link rel="shortcut icon" type="image/png" href="assets/icon/favicon.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/vendor.css">
    <!-- Theme initialization -->
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};
        var themeName = themeSettings.themeName || '';
        if (themeName) {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        } else {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
    <?php include_once '../include/sidebar_controler.php' ?>
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app">

            <?php
            include_once '../include/header.php';
            include_once '../controller/categoriesController.php';
            ?>

            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Thông tin người dùng <?php echo isset($user_prf) ? $user_prf->getEmail() : '' ?> <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                <form name="item" onsubmit="return userValidate()" enctype="multipart/form-data" method="POST" action="../controller/userController.php<?php if (isset($user_prf)) {
                                                                                                                                                            echo '?id=' . $user_prf->getId();
                                                                                                                                                        }   ?>">
                    <div class="card card-block">
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Avatar: </label>
                            <div class="col-sm-10">
                                <div class="images-container">
                                    <input type="file" name="img" id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Họ và tên: </label>
                            <div class="col-sm-10">
                                <input type="text" name="userName" id="userName" class="form-control boxed" placeholder="Nhập họ và tên" value="<?php echo isset($user_prf) ? $user_prf->getUser_name() : '' ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Email: </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control boxed" placeholder="Nhập email" value="<?php echo isset($user_prf) ? $user_prf->getEmail() : '' ?>" <?php echo isset($user_prf) ? 'disabled' : '' ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Số Điện thoại: </label>
                            <div class="col-sm-10">
                                <input type="number" name="phone" id="phone" min=0 class="form-control boxed" placeholder="Nhập số điện thoại" value="<?php echo isset($user_prf) ? $user_prf->getPhone() : '' ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Địa Chỉ: </label>
                            <div class="col-sm-10">
                                <input type="text" name="address" id="address" class="form-control boxed" placeholder="Nhập địa chỉ" value="<?php echo isset($user_prf) ? $user_prf->getAddress() : '' ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label"> Quản trị viên: </label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="admin" style="width: 10%; height: calc(1.5em + 0.75rem + 2px);" <?php
                                                                                                                                if (isset($user_prf)) {
                                                                                                                                    if ($user_prf->getAdministrator() != 0) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                } ?>>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Mật khẩu: </label>
                            <div class="col-sm-10">
                                <?php if (isset($user_prf)) {
                                    echo '<a href="#" data-target="#changePass" data-toggle="modal">Đổi mật khẩu</a>';
                                } else {
                                    echo '<input type="password" name="passwd" id="passwd" class="form-control boxed" placeholder="Mật khẩu">';
                                } ?>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="action" value="<?php echo isset($user_prf) ? 'editUser' : 'create' ?>"> Lưu thay đổi </button>
                                <button type="button" class="btn btn-secondary"> <a href="../controller/userController.php" style="text-decoration: none;">Quay lại </a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </article>
            <footer class="footer">
                <div class="footer-block buttons">
                </div>
                <div class="footer-block author">
                </div>
            </footer>
            <div class="modal fade" id="changePass">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-lock"></i> Đổi mật khẩu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../controller/userController.php?id=<?php echo $user_prf->getId() ?>" onsubmit="return passValidate()" method="POST">
                            <div class="modal-body">
                                <input type="password" name="passwd" id="passwd2" class="form-control boxed" placeholder="Mật khẩu mới">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="action" value="editPasswd">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-80463319-4', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    <script>
        function passValidate() {
            pass = document.getElementById('passwd2').value;
            if (pass.length < 8) {
                alert('Mật khẩu phải có ít nhất 8 kí tự');
                return false;
            }
            return true;
        }

        function userValidate() {
            pattern = /^[\p{L}\s\d]*[\p{L}\s\d]*[\p{L}\s\d]*$/u;
            userName = document.getElementById('userName').value;
            email = document.getElementById('email').value;
            address = document.getElementById('address').value;
            pass = document.getElementById('passwd').value;

            if (!userName.match(pattern)) {
                alert('Tên chỉ chứa kí tự và số');
                return false;
            }
            if (email == '') {
                alert('Email không được để trống');
                return false;
            }
            if (!address.match(pattern)) {
                alert('Địa chỉ chứa kí tự không hợp lệ');
                return false;
            }
            if (pass.length < 8) {
                alert('Mật khẩu phải có ít nhất 8 kí tự');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>