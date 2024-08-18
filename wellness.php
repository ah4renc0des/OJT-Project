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

        .cardwellness {
            border: none;
            border-radius: 10px; /* Rounded corners for a modern look */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: auto; /* Ensures content doesn't overflow */
            display: flex;
            width: 1200px; /* Fixed width */
            height: 400px; /* Fixed height */
            margin: auto; /* Center the card within its column */
        }

        .cardwellness-body {
            padding: 20px; /* Increased padding inside the card */
            flex: 1; /* Ensure card body takes up available space */
            overflow: auto; /* Ensure content fits within fixed size */
        }

        .cardpdf {
            border: none;
            border-radius: 10px; /* Rounded corners for a modern look */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: auto; /* Ensures content doesn't overflow */
            display: flex;
            width: 1200px; /* Fixed width */
            height: 430px; /* Fixed height */
            margin: auto; /* Center the card within its column */
        }

        .cardpdf-body {
            padding: 20px; /* Increased padding inside the card */
            flex: 1; /* Ensure card body takes up available space */
            overflow: auto; /* Ensure content fits within fixed size */
        }

        .text-muted {
            color: #6c757d !important;
        }

        .container {
            max-width: 1300px;
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
</head>
<body>
    <section class="py-3">
        <div class="container">
            <div class="cardwellness rounded-0">
                <div class="cardwellness-body">
                    <?php include "wellness-about.html" ?>
                </div>
            </div>
            <div>
                <?php include "wellness-pdf.html" ?>
            </div>
            <div>
                <?php include "wellness-vid.html" ?>
            </div>
            <div class="row justify-content-center my-4">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-group-lg" id="search-field">
                        <input type="search" class="form-control form-control-lg rounded-pill" aria-label="Search Wellness Post Input" id="search" placeholder="Search wellness post here">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-pill bg-transparent"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // Define the categories to display
            $displayCategories = ['Wellness', 'Mental Health'];

            // Prepare the SQL query with parameterized categories
            $categoryList = implode("','", $displayCategories);
            $stmt = $conn->prepare("SELECT p.*, c.name as `category` FROM `post_list` p INNER JOIN category_list c ON p.category_id = c.id WHERE p.status = 1 AND p.`delete_flag` = 0 AND c.name IN ('$categoryList') ORDER BY c.name, abs(unix_timestamp(p.date_created)) DESC");
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch the posts and group them by category
            $categories = [];
            while ($row = $result->fetch_assoc()) {
                $categories[$row['category']][] = $row;
            }

            // Iterate over each category and display posts
            foreach ($categories as $category => $category_posts): ?>
                <div class="category-section">
                    <h3 class="category-title"><?= $category ?></h3>
                    <div class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-1 gx-3 gy-3">
                        <?php foreach ($category_posts as $row): ?>
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
</body>
</html>
