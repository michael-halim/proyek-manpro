<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <script>
        $(document).ready(function() {
            $('#manage-users').DataTable({
                responsive: true
            });
            $.ajax({

                url: 'admin_fetch_update_user.php',
                method: 'POST',
                data: {
                    type: 'READ',

                },
                success: function(result) {
                    // Restart dan Isi DataTable
                    $('#manage-users').DataTable().destroy();
                    $('#manage-users').html(result.output);
                    $('#manage-users').DataTable({
                        responsive: true
                    });

                    // Unhide Div
                    $('#div-manage-users').prop('hidden', false);

                },
                error: function(result) {

                }
            });
            // Ajax untuk ubah jadi ketua
            $('body').on('click', '.ubah-ketua', function() {
                var email = $(this).data('email');
                $.ajax({
                    url: 'admin_fetch_update_user.php',
                    method: 'POST',
                    data: {
                        type: 'UPDATE',
                        email: email
                    },
                    success: function(result) {
                        // Restart dan Isi DataTable
                        $('#manage-users').DataTable().destroy();
                        $('#manage-users').html(result.output);
                        $('#manage-users').DataTable({
                            responsive: true
                        });

                        // Unhide Div
                        $('#div-manage-users').prop('hidden', false);
                    },
                    error: function(result) {

                    }
                });
            });

            // See Detail if click and response
            $('body').on('click', '.see-detail', function() {
                var obj = $(this).closest('tr');

                var email = obj.find('td:eq(1)').text();
                $.ajax({
                    url: 'admin_see_detail.php',
                    method: 'POST',
                    data: {
                        email: email
                    },
                    success: function(result) {
                        $('.detail-body').html(result.output);
                        $('#detail').modal('show');
                    },
                    error: function(result) {

                    }
                });

            });
        });
    </script>
</head>

<body style="overflow-x:hidden;">
    <div class="row">
        <?php include('assets/admin_sidebar.php'); ?>
        <div class="col-md-9">
            <div class="container">

                <h1>Content For Managing Users</h1>

                <div id="div-manage-users" class="my-5" hidden>
                    <table id="manage-users" class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
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
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="detail" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Details </h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body detail-body">
                                <!-- detail user -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>