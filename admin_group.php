<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <script src="assets/js/admin_home.js"></script>
    <script src="assets/js/admin_sidebar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        $(document).ready(function() {
            $('#group').addClass('active');
        });
    </script>
</head>

<body>
    <div class="row">
        <?php include('assets/admin_sidebar.php'); ?>

        <div class="col-md-9">
            <h1>Content For Managing Group</h1>

            <div class="container my-5">

                <div class="row" id="div-groups">
                    <div class="col-4">
                        <div class="card text-white bg-secondary mb-3 align-center" style="max-width: 18rem;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <span>Nama Group</span>
                                    </div>
                                    <div class="col-6 text-right">
                                        <span class="badge rounded-pill bg-danger float-end">Non-Active</span>
                                        <!-- <span class="badge rounded-pill bg-success float-end">Active</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Nama Ketua</h5>
                                <p class="card-text">Total : 70 Member</p>

                                <div class="row">
                                    <div class="col-12 col-sm-6"><input type="button" class="btn btn-info" value="Detail Group"></div>
                                    <div class="col-12 col-sm-6"><input type="button" class="btn btn-light" value="Detail Event"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    </div>


</body>

</html>