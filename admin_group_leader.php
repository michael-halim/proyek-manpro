<?php
include "connect.php";
var_dump($_SESSION['email']);
require_once 'secure_admin.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <script>
        $(document).ready(function() {

            // Init 2 DataTables
            $('#manage-users').DataTable();
            $('#assign-users-tables').DataTable();

            // Ajax awal untuk load ketua
            $.ajax({
                url: 'admin_fetch_ketua.php',
                method: 'POST',
                data: {
                    type: 'READ',

                },
                success: function(result) {
                    // Restart dan Isi DataTable
                    $('#manage-users').DataTable().destroy();
                    $('#manage-users').html(result.output);
                    $('#manage-users').DataTable();

                    // Tampilan Div yang di Hidden
                    $('#div-manage-users').prop('hidden', false);
                },
                error: function(result) {

                }
            });

            // Handler untuk klik Assign Group
            var assignedPerson;
            $('body').on('click', '.assign-group', function() {
                checkedPerson.splice(0, checkedPerson.length);

                var obj = $(this).closest('tr');
                var email = obj.find('td:eq(1)').text();
                assignedPerson = email;
                // alert(email);
                $.ajax({
                    url: 'admin_fetch_user.php',
                    method: 'POST',
                    data: {
                        email: email
                    },
                    success: function(result) {
                        // Restart dan Isi DataTable
                        $('#assign-users-tables').DataTable().destroy();
                        $('#assign-users-tables').html(result.output);
                        $('#assign-users-tables').DataTable();

                        // Tampilin modal
                        $('#dtablesModal').modal('show');

                    },
                    error: function(result) {

                    }
                });
            });

            // Handler untuk klik See Detail
            $('body').on('click', '.see-detail', function() {
                // Ambil Email
                var obj = $(this).closest('tr');
                var email = obj.find('td:eq(1)').text();

                $.ajax({
                    url: 'admin_see_detail.php',
                    method: 'POST',
                    data: {
                        email: email
                    },
                    success: function(result) {
                        // Tampilkan Detail di Modal dan di show
                        $('.detail-body').html(result.output);
                        $('#detail').modal('show');
                    },
                    error: function(result) {

                    }
                });

            });
            // Handler untuk behavior checkbox
            const checkedPerson = [];
            $('body').on('click', 'input[type="checkbox"]', function() {
                var obj = $(this).closest('tr');
                var email = obj.find('td:eq(1)').text();

                if ($(this).prop('checked')) {
                    checkedPerson.push(email);

                } else {
                    // Check email yang kembar ada di index berapa
                    const index = checkedPerson.indexOf(email);

                    //kalau ketemu masuk if ini
                    if (index > -1) {
                        checkedPerson.splice(index, 1); // 2nd parameter means remove one item only
                    }
                }

            });

            // Handler untuk klik "next" di modal Assign Group
            $('.next-modal-btn').click(function() {
                // Kalau Belum milih tidak bisa next modal
                if (checkedPerson.length === 0) {
                    alert('Belum Memilih User');
                } else {
                    $('#dtablesModal').modal('hide');
                    $('#secondModal').modal('show');
                }
            });


            // Handler untuk klik save changes
            $('.save-changes').click(function() {

                const groupName = $('#group-name').val();
                if (groupName === '') {
                    alert('Nama Group Tidak Boleh Kosong');
                } else {
                    $.ajax({
                        url: 'admin_save_changes.php',
                        method: 'POST',
                        data: {
                            assignedPerson: assignedPerson,
                            checkedPerson: checkedPerson,
                            groupName: groupName
                        },
                        success: function(result) {
                            // Hide Modal untuk Nama Group
                            $('#secondModal').modal('hide');
                        },
                        error: function(result) {

                        }
                    });
                }

            });
        });
    </script>
</head>

<body>
    <div class="row">
        <?php include('assets/admin_sidebar.php'); ?>

        <div class="col-md-8">
            <div class="container">
                <br>
                <h1><i class="fa-solid fa-user-group"></i>Manage Group Leader</h1>

                <!-- DataTables Utama untuk Melihat Semua Ketua  -->
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

                <!-- Modal Untuk Lihat Detail dari Ketua - Ketua -->
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

                <!-- Modal Isi Data Tables User -->
                <div class="modal fade" id="dtablesModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">User List</h3>
                                <button type="button" class="btn-close close-modal-user" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body assign-users-body">
                                <table id="assign-users-tables" class="table table-bordered">
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
                                <button type="button" class="btn btn-secondary close-modal-user" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary next-modal-btn">Next</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Kedua Untuk Isi Nama Group -->
                <div class="modal fade" id="secondModal" tabindex="-1">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Nama Group</h5>
                                <button type="button" class="btn-close close-second-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="group-name" class="col-form-label">Nama Group :</label>
                                    <input type="text" class="form-control" id="group-name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#dtablesModal" data-bs-toggle="modal">Back</button>
                                <button type="button" class="btn btn-primary save-changes">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>