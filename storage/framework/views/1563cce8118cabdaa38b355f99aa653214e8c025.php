<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">


<head>
    <script type="text/javascript">
        function disableBack() {
            window.history.forward();
        }
        setTimeout("disableBack()", 0);
        window.onunload = function() {
            null
        };

    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script src="<?php echo e(asset('../../js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="<?php echo e(asset('../assets/css/app.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('../assets/bundles/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('../assets/bundles/datatables/datatables.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="stylesheet" href="../../assets/css/data.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/alcoyLogo.png" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<style>
    @media  screen and (min-width: 676px) {
        .modal-dialog {
            max-width: 1000px;
            /* New width for default modal */
        }
    }

    @media  print {
        .print {
            display: none;
        }


        .main-sidebar {
            display: none;
            margin-top: -20px;
        }

        #table_length {
            display: none;
        }

        #table_filter {
            display: none;
        }

        #table_info {
            display: none;
        }

        .pagination {
            display: none;
        }

        #arrow {
            display: none;
        }

        .sta {
            display: none;
        }

        #back {
            display: none;
        }

    }

</style>

<body>
    <div class="loader"></div>
    <div id="#app"></div>
    <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->yieldContent('editResortlist'); ?>
        <?php echo $__env->yieldContent('voda'); ?>
        <?php echo $__env->yieldContent('search'); ?>
        <?php echo $__env->yieldContent('editUser'); ?>
        <?php echo $__env->yieldContent('lionarch'); ?>
        <?php echo $__env->yieldContent('resort_search'); ?>
        <div id="#app" class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky" style="background:#21791A;">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="/" data-toggle="sidebar" id="click_me" class="nav-link nav-link-lgcollapse-btn">
                            <i data-feather="align-justify"></i>
                        </a>
                    </li>
                </ul>
                <div class="text-white h3 pt-2">
                    <?php if(Auth::user()->type == 'STAFF'): ?>
                        <?php echo e(Auth::user()->resortList->resort_name); ?>

                    <?php else: ?>
                        Alcoy Data Banking
                    <?php endif; ?>
                </div>
            </div>
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <?php if(Route::has('login')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>" hidden><?php echo e(__('Login')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?>

                            <img src="<?php echo e(Auth::user()->image ?? asset('storage/images/default_profile.jpg')); ?>"
                                class="rounded-circle" style="width:30px; height: 30px;" alt="img">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                                                                                                                                                          document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?> <i data-feather="log-out" class="ml-2"></i>
                            </a>
                            <a class="dropdown-item text-center" href="/profile"
                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Profile')); ?>

                                <img src="<?php echo e(Auth::user()->image ?? asset('storage/images/default_profile.jpg')); ?>"
                                    class="rounded-circle ml-2" style="width:20px; height: 20px;" alt="img">
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>

                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-1 sticky">
            <aside id="sidebar-wrapper ">
                <div class="sidebar-brand " style="background:#21791A;">
                    <a href=""> <img alt="image" src="../../assets/img/logo.png" class="header-logo rounded-circle" />
                        <span class="text-white " class="logo-name" id="alcoy"><?php echo e(__('Alcoy')); ?></span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <?php if(Auth::user()->type == 'ADMIN'): ?>
                        <li class="dropdown">
                            <a href="/admin_dashboard" class="nav-link"><i
                                    data-feather="monitor"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->type == 'STAFF'): ?>
                        <li class="dropdown">
                            <a href="/staff_dashboard" class="nav-link"><i
                                    data-feather="monitor"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown">
                        <a href="/profile" class="nav-link"><i
                                data-feather="user"></i><span><?php echo e(__('Profile')); ?></span></a>
                    </li>
                    <?php if(Auth::user()->type == 'STAFF'): ?>
                        <li class="dropdown">
                            <a href="/resort_guest/<?php echo e(Auth::user()->resortList->resort_id); ?>" class="nav-link"><i
                                    data-feather="list"></i><span><?php echo e(Auth::user()->resortList->resort_name); ?></span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/staff_register" class="nav-link"><i
                                    data-feather="edit"></i><span><?php echo e(__('Direct Register')); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->type == 'ADMIN'): ?>
                        <li class="dropdown">
                            <a href="/add_resort" class="nav-link"><i
                                    data-feather="image"></i><span><?php echo e(__('Add Resort')); ?></span></a>
                        </li>

                        <li class="dropdown">
                            <a href="/add_user" class="nav-link"><i
                                    data-feather="users"></i><span><?php echo e(__('Users')); ?></span></a>
                        </li>

                        <li class="dropdown">
                            <a href="/resort_list" class="nav-link"><i
                                    data-feather="list"></i><span><?php echo e(__('Resort Assignee')); ?></span></a>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown">
                        <a href="/generate_qrcode" class="nav-link"><i
                                data-feather="code"></i><span><?php echo e(__('QRcode')); ?></span></a>
                    </li>
                </ul>
            </aside>
        </div>
    <?php endif; ?>

    <main class="py-4">


    </main>
    <?php echo $__env->yieldContent('content'); ?>


    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('../assets/js/app.min.js')); ?>"></script>

    <script src="<?php echo e(asset('../assets/bundles/summernote/summernote-bs4.js')); ?>"></script>
    <!-- JS Libraies -->
    <script src="<?php echo e(asset('../assets/bundles/datatables/datatables.min.js')); ?>"></script>
    

    
    <script src="<?php echo e(asset('../assets/bundles/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Page Specific JS File -->
    

    <!-- Template JS File -->
    <script src="<?php echo e(asset('../assets/js/scripts.js')); ?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Custom JS File -->
    <script src="<?php echo e(asset('../assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('../assets/js/jquery.printPage.js')); ?>"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn-password').on('click', function() {
                $('#change-password').attr('hidden', false);
                $('#btn-password').attr('hidden', true);
            });

            $('#table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });

            $('.p').hide();

            $("#click_me").click(function() {
                $("#alcoy").toggle();
            });

            $('#imageMain').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-imageMain').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        function filterText() {
            var rex = new RegExp($('#filterText').val());
            if (rex == "/all/") {
                clearFilter()
            } else {
                $('.tr').hide();
                $('.tr').filter(function() {
                    return rex.test($(this).text());
                }).show();
            }
        }

        function clearFilter() {
            $('.filterText').val('');
            $('.tr').show();
        }

    </script>
</body>

</html>
<?php /**PATH C:\Users\capstonestudent\Desktop\Data_Banking_System\resources\views/sideNav/resort_nav.blade.php ENDPATH**/ ?>