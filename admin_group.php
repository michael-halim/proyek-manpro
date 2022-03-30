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
                var group_name = $(this).data('group');
                // alert(id);
                // alert(group_name);

                $.ajax({
                    url: 'admin_see_detail_group.php',
                    method: 'POST',
                    data: {
                        id: id,
                        group_name: group_name,
                    },
                    success: function(result) {
                        $('#detail-group-tables').DataTable().destroy();
                        $('.header-list-renungan').html(result.outputHeader);

                        $('#detail-group-tables').html(result.output);
                        $('#detail-group-tables').DataTable();
                        $('#dtablesModalDetailGroup').modal('show');
                    },
                    error: function(result) {

                    }
                });
            });
            $('body').on('click', '.see-list-event', function() {
                var id = $(this).data('sp');
                var group_name = $(this).data('group');

                $.ajax({
                    url: 'admin_see_list_event.php',
                    method: 'POST',
                    data: {
                        id: id,
                        group_name: group_name,
                    },
                    success: function(result) {
                        $('#list-event-tables').DataTable().destroy();
                        $('.header-list-event').html(result.outputHeader)

                        $('#list-event-tables').html(result.output);
                        $('#list-event-tables').DataTable();
                        $('#dtablesModalListEvent').modal('show');
                    },
                    error: function(result) {

                    }
                });
            });
            $('body').on('click', '.see-detail-event', function() {
                var id = $(this).data('sp');
                var group_name = $(this).data('group');
                var id_event = $(this).closest('tr').data('event');

                $.ajax({
                    url: 'admin_see_detail_event.php',
                    method: 'POST',
                    data: {
                        id: id,
                        group_name: group_name,
                        id_event: id_event,
                    },
                    success: function(result) {
                        $('.detail-header').html(result.outputHeader);

                        $('#detail-event-tables').DataTable().destroy();

                        $('#detail-event-tables').html(result.output);
                        $('#detail-event-tables').DataTable();
                        $('#dtablesModalDetailEvent').modal('show');
                    },
                    error: function(result) {

                    }
                });
            });

            $('body').on('click', '#add-event', function() {
                $('#add-event-modal').attr('data-isingroup', true);

                var id = $(this).data('sp');
                $('#add-event-modal').attr('data-idgroup', id);
            });

            $('#outside-add-event').click(function() {

                $('#add-event-modal').attr('data-isingroup', false);
                $('#add-event-modal').attr('data-idgroup', '');
            });

            $('#submit-event').click(function() {
                var event = $('#inputEvent').val();
                var jenis = $('#inputJenisEvent').val();
                var tempat = $('#inputTempat').val();
                var link = $('#inputLink').val();

                var isInGroup = $('#add-event-modal').data('isingroup');
                var id_group = '';

                if (isInGroup) {
                    id_group = $('#add-event-modal').data('idgroup');
                }

                $.ajax({
                    url: 'add_event.php',
                    method: 'POST',
                    data: {
                        event: event,
                        jenis: jenis,
                        tempat: tempat,
                        link: link,
                        isInGroup: isInGroup,
                        id_group: id_group,
                    },
                    success: function(result) {
                        alert(result.notif);
                        $('#add-event-modal').modal('hide');

                    },
                    error: function(result) {

                    }
                });
            });

            // Add Renungan Handler
            $('body').on('click', '#add-renungan', function() {
                var id_group = $(this).data('sp');
                // alert(id_group);
                $.ajax({
                    url: 'get_books.php',
                    method: 'GET',
                    data: {
                        id_group: id_group,
                    },
                    success: function(result) {
                        $('#inputKitab').html(result.output);
                        $('#submit-renungan').attr('data-group', result.id_group);
                    },
                    error: function(result) {

                    }
                });
            });
            var max_chapter;
            var book;
            $('body').on('change', '#inputKitab', function() {
                max_chapter = $(this).find(':selected').data('max');
                book = $(this).find(':selected').text();
            });

            $('body').on('change', 'input[type=number]', function() {
                if ($(this).val() < 1) {
                    alert('Bab / Ayat Tidak Boleh Dibawah 1');
                    $(this).val('');
                }
            });
            $('body').on('change', '#inputBab', function() {
                var inputBab = $('#inputBab').val();
                if (max_chapter < inputBab) {
                    alert('Bab yang diinput melebihi Bab Maksimal Kitab ' + book);
                    $('#inputKitab').val([]);
                    $('#inputBab').val('');
                }
            });

            $('#preview-renungan-btn').click(function() {
                var kitab = $('#inputKitab').val();
                var bab = $('#inputBab').val();
                var awal = $('#inputAyatStart').val();
                var akhir = $('#inputAyatEnd').val();
                var renungan = $('#inputRenungan').val();
                // var id_group = $('')
                if (kitab === '' || bab === '' || awal === '' || akhir === '' | renungan === '') {
                    alert('Kitab / Bab / Ayat Awal / Ayat Akhir Masih Kosong');

                } else if (parseInt(akhir) < parseInt(awal)) {
                    alert('Ayat Akhir Tidak Boleh Dibawah Ayat Awal');

                } else {
                    $.ajax({
                        url: 'get_preview_renungan.php',
                        method: 'POST',
                        data: {
                            kitab: kitab,
                            bab: bab,
                            awal: awal,
                            akhir: akhir,
                            renungan: renungan,
                        },
                        success: function(result) {
                            // alert(result.outputAyat);
                            $('#preview-firman').html(result.outputFirman);
                            $('#preview-ayat').html(result.outputAyat);
                            $('#preview-renungan').html(result.outputRenungan);

                        },
                        error: function(result) {

                        }
                    });
                }

            });
            $('#submit-renungan').click(function() {
                var ayat = $('#content-ayat').val().toLowerCase();
                var renungan = $('#content-renungan').text();
                var id_group = $(this).data('group');

                $.ajax({
                    url: 'add_renungan.php',
                    method: 'POST',
                    data: {
                        ayat: ayat,
                        renungan: renungan,
                        id_group: id_group,
                    },
                    success: function(result) {
                        alert(result.notif);
                    },
                    error: function(result) {

                    }
                });
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
            <div class="modal fade" id="dtablesModalDetailGroup" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">List Renungan</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body see-detail-group">
                            <div class="row mb-5">
                                <div class="col-4 header-list-renungan">
                                    <!-- Button Add Renungan -->
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Untuk List Event  -->
            <div class="modal fade" id="dtablesModalListEvent" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">List </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body see-list-event">
                            <div class="row mb-5">
                                <div class="col-4 header-list-event">
                                    <!-- Button Add Event Inside List Event -->
                                </div>
                            </div>
                            <table id="list-event-tables" class="table table-bordered">
                                <thead>
                                    <tr>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Untuk Detail Event  -->
            <div class="modal fade" id="dtablesModalDetailEvent" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Detail Event</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="col-6 detail-header"></div>
                            </div>
                            <table id="detail-event-tables" class="table table-bordered">
                                <thead>
                                    <tr>
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
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add Renungan -->
            <div class="modal fade py-4" id="add-renungan-modal" data-isingroup="false" data-idgroup="" role="dialog">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog modal-lg vertical-align-center">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add Renungan</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <i class="fas fa-user prefix grey-text"> </i> <label for="inputKitab">Kitab</label>
                                        <select id="inputKitab" name="inputKitab" class="form-select">

                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <i class="fas fa-user prefix grey-text"> </i> <label for="inputBab">Bab</label>
                                        <input type="number" min="1" class="form-control rounded" name="inputBab" id="inputBab">
                                    </div>
                                    <div class="col-2">
                                        <i class="fas fa-user prefix grey-text"> </i> <label for="inputAyatStart">Awal</label>
                                        <input type="number" min="1" class="form-control rounded" name="inputAyatStart" id="inputAyatStart">
                                    </div>
                                    <div class="col-2">
                                        <i class="fas fa-user prefix grey-text"> </i> <label for="inputAyatEnd">Akhir</label>
                                        <input type="number" min="1" class="form-control rounded" name="inputAyatEnd" id="inputAyatEnd">
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-user prefix grey-text"></i> <label for="inputRenungan">Input Renungan</label>
                                    <textarea class="form-control" id="inputRenungan" placeholder="Leave a comment here"></textarea>
                                </div>

                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-dark" id="preview-renungan-btn" data-bs-target="#preview-renungan-modal" data-bs-toggle="modal">Preview Renungan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Untuk Preview Renungan -->
            <div class="modal fade" id="preview-renungan-modal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="previewRenunganLabel">Preview Renungan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6" id="preview-firman">

                                    </div>
                                    <div class="col-6">
                                        <div class="row mb-3" id="preview-ayat"></div>
                                        <div class="row" id="preview-renungan"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-dark" data-bs-target="#add-renungan-modal" data-bs-toggle="modal">Back</button>
                            <button type="button" data-group="" id="submit-renungan" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" id="outside-add-event" data-bs-toggle="modal" data-bs-target="#add-event-modal" value="Add Event">
            <!-- Modal Add Event -->
            <div class="modal fade py-4" id="add-event-modal" data-isingroup="false" data-idgroup="" role="dialog">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog vertical-align-center">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add Event</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">

                                <div class="md-form mb-4">
                                    <i class="fas fa-user prefix grey-text"> </i> <label for="inputEvent">Nama Event</label>
                                    <input type="text" id="inputEvent" class="form-control" placeholder="Pertemuan Hari Rabu" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-calendar-alt prefix grey-text"> </i> <label for="inputJenisEvent">Jenis Event</label>
                                    <input type="text" id="inputJenisEvent" class="form-control" placeholder="CG In" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-phone prefix grey-text"> </i> <label for="inputTempat">Tempat</label>
                                    <input type="text" id="inputTempat" class="form-control" placeholder="Zoom" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputLink">Link</label>
                                    <input type="url" id="inputLink" class="form-control" placeholder="https:www.zoom.com" required>
                                </div>

                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" id="submit-event" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</body>

</html>