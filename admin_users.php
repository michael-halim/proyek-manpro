<?php
session_start();
?>
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
            <h1>Content For Managing Users</h1>
        </div>
    </div>

</body>
</html>