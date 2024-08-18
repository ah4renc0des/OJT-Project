<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modernized Section</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .carousel-item > img {
            object-fit: cover !important;
        }

        #carouselExampleControls .carousel-inner {
            height: 280px !important;
        }

        #search-field .form-control.rounded-pill {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-right: none !important;
            font-family: 'Montserrat', sans-serif;
        }

        #search-field .form-control:focus {
            box-shadow: none !important;
        }

        #search-field .form-control:focus + .input-group-append .input-group-text {
            border-color: #86b7fe !important;
        }

        #search-field .input-group-text.rounded-pill {
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-left: none !important;
            background-color: #f1f1f1 !important;
        }

        .post-item {
            position: relative;
            padding-left: 120px; /* Space for date on the left */
            margin-bottom: 30px; /* Add spacing between posts */
        }

        .post-item:hover {
            transform: scale(1.02);
        }

        .post-date {
            position: absolute;
            left: 10px;
            top: 20px;
            color: #6c757d;
            font-size: 14px;
        }
            .post-item {
                position: relative;
                margin-bottom: 30px; /* Spacing between posts */
                padding: 15px; /* Internal spacing within the post item */
            }

            .post-item:nth-child(odd) {
                margin-right: 20px; /* Spacing on the right for odd items */
            }

            .post-item:nth-child(even) {
                margin-left: 20px; /* Spacing on the left for even items */
            }
        .category-title {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0 15px; /* Increased bottom margin */
        }

        .card {
            border: none;
            border-radius: 10px; /* Rounded corners for a modern look */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ensures content doesn't overflow */
            display: flex;
            flex-direction: column;
            width: 300px; /* Fixed width */
            height: 250px; /* Fixed height */
            margin: auto; /* Center the card within its column */
        }

        .card-body {
            padding: 20px; /* Increased padding inside the card */
            flex: 1; /* Ensure card body takes up available space */
            overflow: hidden; /* Ensure content fits within fixed size */
        }

        .card-title {
            font-weight: bold;
            margin-bottom: 15px; /* Space below the title */
        }

        .card-text {
            height: 4.5em; /* Adjust height for more space */
            overflow: hidden; /* Hide overflow text */
            text-overflow: ellipsis; /* Add ellipsis for overflowing text */
        }

        .text-muted {
            color: #6c757d !important;
        }

        .container {
            max-width: 1200px;
        }

        /* Adjust column sizes */
        .row-cols-xl-4 .col-xl-3,
        .row-cols-md-3 .col-md-4,
        .row-cols-sm-1 .col-sm-6 {
            display: flex;
            justify-content: center; /* Center columns horizontally */
            padding: 50px; /* Padding around each column */
        }
    </style>
    <link rel="stylesheet" href="survey/style.css">
</head>
<body>
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide bg-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                                $upload_path = "uploads/bg";
                                if(is_dir(base_app.$upload_path)): 
                                $file = scandir(base_app.$upload_path);
                                $_i = 0;
                                foreach($file as $img):
                                    if(in_array($img, array('.', '..')))
                                        continue;
                                    $_i++;
                            ?>
                            <div class="carousel-item h-100 <?php echo $_i == 1 ? 'active' : '' ?>">
                                <img src="<?php echo validate_image($upload_path.'/'.$img) ?>" class="d-block w-100 h-100" alt="<?php echo $img ?>">
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center my-4">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-group-lg" id="search-field">
                        <input type="search" class="form-control form-control-lg rounded-pill" aria-label="Search Post Input" id="search" placeholder="Search post here">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-pill bg-transparent"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            // Group posts by category
            $categories = [];
            $posts = $conn->query("SELECT p.*, c.name as `category` FROM `post_list` p INNER JOIN category_list c ON p.category_id = c.id WHERE p.status = 1 AND p.`delete_flag` = 0 ORDER BY c.name, abs(unix_timestamp(p.date_created)) DESC");
            while($row = $posts->fetch_assoc()){
                $categories[$row['category']][] = $row;
            }

            // Iterate over each category and display posts
            foreach($categories as $category => $category_posts):
            ?>
            <div class="category-section">
                <h3 class="category-title"><?= $category ?></h3>
                <div class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-1 gx-3 gy-3">
                    <?php foreach($category_posts as $row): ?>
                    <div class="col post-item">
                        <a href="./?p=posts/view_post&id=<?= $row['id'] ?>" class="card text-decoration-none text-reset">
                            <div class="card-body">
                                <div class="post-date">
                                    <?= date("F, Y", strtotime($row['date_created'])) ?>
                                </div>
                                <br>
                               </br>
                                <h3 class="card-title"><?= $row['title'] ?></h3>
                                <div class="card-text"><?= strip_tags($row['content']) ?></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <script>
        $(function(){
            $('#search').on('input', function(){
                var _search = $(this).val().toLowerCase();
                $('.post-item').each(function(){
                    var _text = $(this).text().toLowerCase().trim();
                    $(this).toggle(_text.includes(_search));
                });
            });
        });
    </script>
  </div>
  <div class="popup-box" id="hid" style="display: block; visibility: hidden">
    <div class="transparent-layer" onclick="closePopup()"></div>
    <div class="popup-inner">
        <!-- Close button -->
        <span class="close-btn" onclick="closePopup()">&times;</span>

        <div class="popup-msg">Have a few minutes? Take a feedback survey!</div>

        <button class="next-step-btn" onclick="location.href = 'survey/survey.php'">Continue</button>
    </div>
    </div>
    <script src="survey/surveypop.js"></script>
</body>
</html>
