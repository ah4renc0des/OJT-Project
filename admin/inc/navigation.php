<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* General body styles */
        body {
            font-family: 'Manrope', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Sidebar styles */
        .main-sidebar {
            background-color: #ffffff; /* White background */
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            border-right: 1px solid #e0e0e0;
            color: #333; /* Darker text color */
            padding-top: 60px; /* Space for brand logo and text */
        }

        .brand-link {
            display: flex;
            align-items: center;
            padding: 10px 15px; /* Adjust padding */
            text-decoration: none;
            background-color: #ffffff; /* Ensure the background color is white */
            border-bottom: 1px solid #e0e0e0; /* Add a border to separate from content */
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 60px; /* Height of the brand section */
            z-index: 1000; /* Ensure it stays on top of content */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional shadow for separation */
        }

        .brand-image {
            border-radius: 50%; /* Circular logo */
            width: 2rem; /* Adjust size as needed */
            height: 2rem; /* Adjust size as needed */
            object-fit: cover;
            margin-right: 10px; /* Space between logo and text */
        }

        .brand-text {
            font-size: 1.5rem; /* Larger font size */
            font-weight: 700; /* Bold font weight */
            color: #000; /* Black text color */
            font-family: 'Montserrat', sans-serif; /* Montserrat font for brand text */
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #333; /* Darker text color */
            font-size: 0.875rem; /* Smaller font size */
        }

        .nav-link:hover {
            background-color: #e0f7fa; /* Light blue on hover */
            color: #000; /* Black text color on hover */
        }

        .nav-link.active {
            background-color: #0288d1 !important; /* Blue for clicked button */
            color: #ffffff !important; /* White text color for active button */
        }

        .nav-icon {
            margin-right: 10px;
        }

        .nav-pills .nav-link {
            border-radius: 0;
        }

        .nav-header {
            font-size: 1.25rem; /* Larger font size for section headers */
            font-weight: 800; /* Extra bold */
            margin: 10px 15px;
        }

        /* Override text size for the MAINTENANCE header */
        .nav-header b {
            font-size: 1.5rem; /* Larger font size for MAINTENANCE */
            font-weight: 900; /* Extra bold */
        }
    </style>
</head>
<body>
    <aside class="main-sidebar">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link">
            <img src="<?php echo base_url ?>uploads/logo.png" alt="Store Logo" class="brand-image">
            <span class="brand-text">VirtuaLink</span>
        </a>
        <!-- Sidebar -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item dropdown">
                    <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><b>Dashboard</b></p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="./?page=posts" class="nav-link nav-posts">
                        <i class="nav-icon fas fa-blog"></i>
                        <p><b>Posts</b></p>
                    </a>
                </li>
                <?php if($_settings->userdata('type') == 1): ?>
                <li class="nav-header"><b>Maintenance</b></li>
                <li class="nav-item dropdown">
                    <a href="<?php echo base_url ?>admin/?page=categories" class="nav-link nav-categories">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p><b>Category List</b></p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user-list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p><b>User List</b></p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-tools"></i>
                        <p><b>Settings</b></p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar -->
    </aside>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
            page = page.replace(/\//g,'_');
            console.log('Current page:', page);

            $('.nav-link').removeClass('active'); // Clear previous active states

            if($('.nav-link.nav-'+page).length > 0){
                $('.nav-link.nav-'+page).addClass('active');
                console.log('Active link:', $('.nav-link.nav-'+page).attr('href'));
            }
        });
    </script>
</body>
</html>
