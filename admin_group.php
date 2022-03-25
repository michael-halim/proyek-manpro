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
            $('#detail-group-tables').DataTable();
            $.ajax({
                url: 'admin_fetch_group.php?page=1',
                method: 'GET',
                data: {},
                success: function(result) {
                    $('#div-groups').html(result.output);
                },
                error: function(result) {

                }
            });
            $('body').on('click', '.detail-group', function() {
                var id = $(this).data('sp');
                var group_name = $(this).closest('span.group-name').text();
                // cari tau cara dapetin group name
                console.log(group_name);
                // alert(group_name);
                // $.ajax({
                //     url: 'admin_see_detail_group.php',
                //     method: 'POST',
                //     data: {

                //     },
                //     success: function(result) {

                //     },
                //     error: function(result) {

                //     }
                // });
            });
            $('body').on('click', '.detail-event', function() {
                alert('detail event');
            });
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
                    <!-- group card -->
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
            
            <!-- Modal Untuk Detail Group  -->
            <div class="modal fade" id="dtablesModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">List </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body see-detail-group">
                            <table id="detail-group-tables" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" data-bs-target="#secondModal" data-bs-toggle="modal">Open second modal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>