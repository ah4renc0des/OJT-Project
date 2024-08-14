<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(90deg, #2c3e50, #3498db);
            padding: 0.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;base64,...'); /* Default icon image */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #00bcd4; /* Highlight color */
        }

        .btn-rounded {
            border-radius: 45px;
        }

        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            min-width: 150px;
        }

        .dropdown-item {
            font-size: 14px;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        .user-img {
            height: 32px;
            width: 32px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .user-dd .btn {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            background: transparent;
            transition: background-color 0.3s ease;
        }

        .user-dd .btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .font-weight-bolder {
            font-weight: 600;
        }

        .text-light {
            color: #fff !important;
        }

        .border-right {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="./">
                <img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="Logo" loading="lazy">
                <?php echo $_settings->info('short_name') ?>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./?p=categories">Topic Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="./?p=about">About</a></li>
                    <?php if($_settings->userdata('id') != '' && $_settings->userdata('type') == 2): ?>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./?p=posts">My Posts</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="./?p=posts/manage_post"><i class="far fa-plus-square"></i> Add Post</a></li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center">
                    <?php if($_settings->userdata('id') > 0 && $_settings->userdata('type') == 2): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle user-dd" data-toggle="dropdown">
                            <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="user-img" alt="User Image"></span>
                            <span><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="<?php echo base_url.'./?p=user' ?>"><span class="fa fa-user"></span> My Account</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url.'/classes/Login.php?f=logout_user' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle" data-toggle="dropdown">
                            <span>My Account</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="./login.php">Login</a>
                            <a class="dropdown-item" href="./register.php">Register</a>
                            <a class="dropdown-item" href="./admin">Admin Login</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function(){
            $('#login-btn').click(function(){
                uni_modal("","login.php");
            });

            $('#navbarResponsive').on('show.bs.collapse', function () {
                $('#mainNav').addClass('navbar-shrink');
            });

            $('#navbarResponsive').on('hidden.bs.collapse', function () {
                if($('body').offset().top === 0)
                    $('#mainNav').removeClass('navbar-shrink');
            });
        });

        $('#search-form').submit(function(e){
            e.preventDefault();
            var sTxt = $('[name="search"]').val();
            if(sTxt !== '')
                location.href = './?p=products&search=' + sTxt;
        });
    </script>
</body>
</html>
