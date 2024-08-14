<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Montserrat:wght@400&display=swap');

        /* Font settings */
        h3 {
            font-family: 'Quicksand', sans-serif;
        }
        .btn, .btn-primary, .navbar-nav .nav-link {
            font-family: 'Montserrat', sans-serif;
        }

        /* Search field styles */
        #search-field {
            margin-bottom: 20px;
        }
        #search-field .form-control.rounded-pill {
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-right: none !important;
            font-family: 'Montserrat', sans-serif;
        }
        #search-field .form-control::placeholder {
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
            border-right: left !important;
            padding: 0.75rem 1rem;
        }
        #search-field .input-group-text {
            margin-left: -1px;
        }

        /* Accordion button styles */
        #categoryAccordion button.btn.btn-block.text-left.font-weight-bolder {
            border: none;
            border-radius: 0;
            box-shadow: none;
            transition: background-color 0.3s ease;
            padding: 10px 15px; /* Add padding for better click area */
        }
        #categoryAccordion button.btn.btn-block.text-left.font-weight-bolder:hover {
            background-color: #ececec; /* Light grey on hover */
        }

        /* Remove default border for collapse icon */
        .collapse-icon {
            margin-left: 10px;
        }

        /* Image display styles */
        .category-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="section py-5">
        <div class="container">
            <h3 class="text-center"><b>Topic Categories</b></h3>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12 mb-3">
                    <div class="input-group input-group-lg" id="search-field">
                        <input type="search" class="form-control form-control-lg rounded-pill" aria-label="Search Category Field" id="search" placeholder="Search category here">
                        <div class="input-group-append">
                            <span class="input-group-text rounded-pill bg-transparent"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="categoryAccordion">
                <?php 
                // Replace with actual database connection and query
                $categorys = $conn->query("SELECT * FROM `category_list` WHERE delete_flag = 0 AND `status` = 1 ORDER BY `name` ASC");
                while($row = $categorys->fetch_assoc()):
                ?>
                <div class="card mb-0 rounded-0">
                    <div class="card-header" id="category<?= $row['id'] ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left font-weight-bolder" type="button" data-toggle="collapse" data-target="#collapse<?= $row['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $row['id'] ?>">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <?= $row['name'] ?>
                                <i class="fa fa-plus font-size-3 collapse-icon"></i>
                            </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapse<?= $row['id'] ?>" class="collapse category_collapse" aria-labelledby="category<?= $row['id'] ?>" data-parent="#categoryAccordion">
                        <div class="card-body">
                        <p><?= str_replace(["\n\r","\n","\r"], "<br/>", $row['description']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function(){
            $('.category_collapse').on('show.bs.collapse', function(){
                var card = $(this).closest('.card');
                var icon = card.find('.collapse-icon');
                icon.removeClass('fa-plus').addClass('fa-minus');
            });
            $('.category_collapse').on('hide.bs.collapse', function(){
                var card = $(this).closest('.card');
                var icon = card.find('.collapse-icon');
                icon.removeClass('fa-minus').addClass('fa-plus');
            });
            $('#search').on('input', function(){
                var _search = $(this).val().toLowerCase();
                $('#categoryAccordion .card').each(function(){
                    var _text = $(this).text().toLowerCase();
                    _text = _text.trim();
                    if (_text.includes(_search) === false) {
                        $(this).toggle(false);
                    } else {
                        $(this).toggle(true);
                    }
                });
            });
        });
    </script>
</body>
</html>
