<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="assets/js/admin_sidebar.js"></script> -->

    <script>
        $(document).ready(function() {
            
            // alert();
            $('#group').addClass('active');
            $('#detail-group-tables').DataTable();

            // Fetching Group Untuk Ambil Group dari DB
            fetchGroup();

            // Dibuat Function agar bisa dipanggil lagi dari tempat lain
            function fetchGroup(page = 1) {

                // Function ini sudah dilengkapi dengan pagination, biar tidak terlalu lama loading
                $.ajax({
                    url: 'admin_fetch_group.php?page=' + page,
                    method: 'GET',
                    data: {},
                    success: function(result) {
                        // nampilin group ke div
                        $('#div-groups').html(result.output);
                    },
                    error: function(result) {

                    }
                });
            }

            // Handler ketika klik Detail Group Button
            $('body').on('click', '.detail-group', function() {
                var id = $(this).data('sp');
                var group_name = $(this).data('group');

                // Reset State dari id Group yang dipilih (Checkbox)
                checkedIdGroup.splice(0, checkedIdGroup.length);

                $.ajax({
                    url: 'admin_see_detail_group.php',
                    method: 'POST',
                    data: {
                        id: id,
                        group_name: group_name,
                    },
                    success: function(result) {
                        // Isi Header nya dengan Button
                        $('.header-list-renungan').html(result.outputHeader);

                        // Isi Info Nama dan Email Ketua
                        $('.info-list-renungan').html(result.outputInfo);

                        // Restart dan Isi DataTable
                        $('#detail-group-tables').DataTable().destroy();
                        $('#detail-group-tables').html(result.output);
                        $('#detail-group-tables').DataTable({
                            responsive: true,
                            bAutoWidth: false,
                            aoColumns: [{
                                    sWidth: '4%'
                                },
                                {
                                    sWidth: '10%'
                                },
                                {
                                    sWidth: '15%'
                                },
                                {
                                    sWidth: '18%'
                                },
                                {
                                    sWidth: '30%'
                                },
                                {
                                    sWidth: '15%'
                                },
                                {
                                    sWidth: '5%'
                                },
                            ]
                        });

                        // Tampilin Modal untuk Detail Group
                        $('#dtablesModalDetailGroup').modal('show');
                    },
                    error: function(result) {

                    }
                });
            });

            // Handler Untuk Klik List Event
            $('body').on('click', '.see-list-event', function() {
                //Ambil id dan nama group
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
                        // Isi Atasnya Modal Dengan Button
                        $('.header-list-event').html(result.outputHeader)

                        // Restart dan Isi DataTable
                        $('#list-event-tables').DataTable().destroy();
                        $('#list-event-tables').html(result.output);
                        $('#list-event-tables').DataTable({
                            responsive: true,
                            bAutoWidth: false,
                            aoColumns: [{
                                    sWidth: '3%'
                                },
                                {
                                    sWidth: '3%'
                                },
                                {
                                    sWidth: '25%'
                                },
                                {
                                    sWidth: '12%'
                                },
                                {
                                    sWidth: '3%'
                                },
                                {
                                    sWidth: '15%'
                                },
                            ]
                        });

                        //Tampilin Modalnya
                        $('#dtablesModalListEvent').modal('show');

                        // Reset State id Event yang dipilih dari radio
                        checkedIdEvent = null;
                    },
                    error: function(result) {

                    }
                });
            });

            // Untuk Handle Klik Detail Event
            $('body').on('click', '.see-detail-event', function() {
                // ambil id group, nama group, dan id event
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
                        // Tampilin Info Detail dari Event tsb
                        $('.detail-header').html(result.outputHeader);

                        // Restart dan Isi DataTable
                        $('#detail-event-tables').DataTable().destroy();
                        $('#detail-event-tables').html(result.output);
                        $('#detail-event-tables').DataTable({
                            responsive: true,
                            bAutoWidth: false,
                            aoColumns: [{
                                    sWidth: '3%'
                                },
                                {
                                    sWidth: '3%'
                                },
                                {
                                    sWidth: '10%'
                                },
                                {
                                    sWidth: '6%'
                                },
                                {
                                    sWidth: '30%'
                                },
                            ]
                        });

                        // Tampilin Modalnya
                        $('#dtablesModalDetailEvent').modal('show');

                        // Reset Checkbox Button untuk Update Detail Event
                        checkedIdDetailEvent.splice(0, checkedIdDetailEvent.length);
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

            // Handler Submit Event untuk dimasukkan ke DB
            $('#submit-event').click(function() {
                // Dapetin semua info dari modal
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
                        // Tampilin Notif Sukses dan Hide Modal untuk Input Event
                        alert(result.notif);

                        // Hide Modal untuk Add Event
                        $('#add-event-modal').modal('hide');

                    },
                    error: function(result) {

                    }
                });
            });

            // Add Renungan Handler
            $('body').on('click', '#add-renungan', function() {
                var id_group = $(this).data('sp');

                // Reset Pasal
                $('input[type=number]').val('');
                $('#inputRenungan').val('');

                $.ajax({
                    url: 'get_books.php',
                    method: 'GET',
                    data: {
                        id_group: id_group,
                    },
                    success: function(result) {
                        // Masukin data semua kitab ke dalam Selection
                        $('#inputKitab').html(result.output);

                        // Selipkan id group ke dalam tombol Submit Renungan
                        $('#submit-renungan').attr('data-group', result.id_group);
                    },
                    error: function(result) {

                    }
                });
            });

            // Init variable Batas Maximum dari Kitab Tertentu dan Kitabnya
            var max_chapter;
            var book;

            // Kalau Kitab nya diganti, dia akan menyimpan batas max dan nama kitab nya di variable
            $('body').on('change', '#inputKitab', function() {
                max_chapter = $(this).find(':selected').data('max');
                book = $(this).find(':selected').text();
            });

            // Kalau dia input sesuatu di modal renungan di bawah 1 maka akan langsung di peringati
            $('body').on('change', 'input[type=number]', function() {
                if ($(this).val() < 1) {
                    alert('Pasal / Ayat Tidak Boleh Dibawah 1');
                    $(this).val('');
                }
            });

            // Kalau Pasal nya Melebihi Batas Pasal Maximum maka akan di reset otomatis
            $('body').on('change', '#inputPasal', function() {
                var inputPasal = $('#inputPasal').val();
                if (max_chapter < inputPasal) {
                    alert('Pasal yang diinput melebihi Pasal Maksimal Kitab ' + book);
                    $('#inputKitab').val([]);
                    $('#inputPasal').val('');
                }
            });

            // Handler untuk Preview Renungan
            $('#preview-renungan-btn').click(function() {
                var kitab = $('#inputKitab').val();
                var pasal = $('#inputPasal').val();
                var awal = $('#inputAyatStart').val();
                var akhir = $('#inputAyatEnd').val();
                var renungan = $('#inputRenungan').val();

                // Check bila ada inputan yang kosong
                if (kitab === '' || pasal === '' || awal === '' || akhir === '' | renungan === '') {
                    alert('Kitab / Pasal / Ayat Awal / Ayat Akhir Masih Kosong');

                } else if (parseInt(akhir) < parseInt(awal)) {
                    // Check bila ayat terakhir lebih kecil dari yang awal (tidak valid)
                    alert('Ayat Akhir Tidak Boleh Dibawah Ayat Awal');

                } else {
                    // Bila sudah valid semua maka bisa melihat preview nya

                    $.ajax({
                        url: 'get_preview_renungan.php',
                        method: 'POST',
                        data: {
                            kitab: kitab,
                            pasal: pasal,
                            awal: awal,
                            akhir: akhir,
                            renungan: renungan,
                        },
                        success: function(result) {
                            // Menampilkan Preview Firman, Ayat, dan Renungan
                            $('#preview-firman').html(result.outputFirman);
                            $('#preview-ayat').html(result.outputAyat);
                            $('#preview-renungan').html(result.outputRenungan);

                            // Hide Modal Add Renungan dan tampilkan Preview Renungan
                            $('#add-renungan-modal').modal('hide');
                            $('#preview-renungan-modal').modal('show');
                        },
                        error: function(result) {

                        }
                    });
                }

            });
            // Handler untuk submit Renungan setelah di Preview
            $('#submit-renungan').click(function() {
                // Ambil data ayat, renungan, dan id group
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
                        // Memberi tahu bila sudah sukses dan Tutup Modal Preview Renungan
                        alert(result.notif);
                        $('#preview-renungan-modal').modal('hide');
                    },
                    error: function(result) {

                    }
                });
            });

            //Checkbox Renungan
            const checkedIdGroup = [];
            $('body').on('click', 'input[type="checkbox"].checkbox-renungan', function() {
                // Dapetin id group
                var obj = $(this).closest('tr');
                var id = obj.data('id');

                // Kalau di Check Checkboxnya masukkan ke dalam variable "checkedIdGroup" kalau di Uncheck di remove
                if ($(this).prop('checked')) {
                    checkedIdGroup.push(id);

                } else {
                    // Check id yang kembar ada di index berapa
                    const index = checkedIdGroup.indexOf(id);

                    //kalau ketemu masuk if ini
                    if (index > -1) {
                        checkedIdGroup.splice(index, 1);
                    }
                }
            });
            // Handler untuk Update Renungan
            $('body').on('click', '#update-renungan-btn', function() {
                // Kalau belum ada yang dipilih, diperingati, Kalau Sudah, bisa edit input yang di disabled
                if (checkedIdGroup.length !== 0) {
                    for (const id of checkedIdGroup) {
                        $('tr[data-id=' + id + ']').find('input').prop('disabled', false);
                        $('tr[data-id=' + id + ']').find('textarea').prop('disabled', false);
                    }

                    // ubah cursor not-allowed di "Save Renungan" jadi cursor pointer (bentuk tangan)
                    $('#save-renungan-btn').css('cursor', 'pointer');
                } else {
                    alert('empty');
                }

            });

            // Handler untuk Save Renungan
            $('body').on('click', '#save-renungan-btn', function() {
                // variable untuk dapetin ayat, renungan, dan id alkitab yang unik
                const updatedAyat = [];
                const updatedRenungan = [];
                const id_alkitab = [];

                // setiap yang di check checkboxnya, check apakah id group nya sama atau tidak
                // kalau sama dianggap 1 aja, lalu dimasukkan ke variable
                for (const id of checkedIdGroup) {

                    var tmp_id_alkitab = $('tr[data-id=' + id + ']').data('alkitab');
                    if (id_alkitab.indexOf(tmp_id_alkitab) <= -1) {
                        id_alkitab.push(tmp_id_alkitab);
                        updatedAyat.push($('tr[data-id=' + id + ']').find('td:eq(3)').find('input').val());
                        updatedRenungan.push($('tr[data-id=' + id + ']').find('td:eq(4)').find('textarea').val());
                    }

                }
                $.ajax({
                    url: 'admin_update_renungan.php',
                    method: 'POST',
                    data: {
                        updatedAyat: updatedAyat,
                        updatedRenungan: updatedRenungan,
                        id_alkitab: id_alkitab,
                    },
                    success: function(result) {
                        // Hide Modal untuk Detail Group dan Reset id group yang di check
                        $('#dtablesModalDetailGroup').modal('hide');
                        checkedIdGroup.splice(0, checkedIdGroup.length);
                    },
                    error: function(result) {

                    }
                });
            });

            // Handler untuk Delete Renungan
            $('body').on('click', '#delete-renungan-btn', function() {
                //cari id alkitab yang unik dalam 1 group, kalau sama diabaikan yang penting ada 1
                const id_alkitab = [];
                for (const id of checkedIdGroup) {
                    var tmp_id_alkitab = $('tr[data-id=' + id + ']').data('alkitab');
                    if (id_alkitab.indexOf(tmp_id_alkitab) <= -1) {
                        id_alkitab.push(tmp_id_alkitab);
                    }
                }

                $.ajax({
                    url: 'admin_delete_restore_renungan.php',
                    method: 'POST',
                    data: {
                        id_alkitab: id_alkitab,
                        type: "DELETE",
                    },
                    success: function(result) {
                        // Hide Modal Detail Group dan Reset id group yang di check
                        $('#dtablesModalDetailGroup').modal('hide');
                        checkedIdGroup.splice(0, checkedIdGroup.length);
                    },
                    error: function(result) {

                    }
                });
            });

            // Handler untuk Restore Renungan
            $('body').on('click', '#restore-renungan-btn', function() {
                //cari id alkitab yang unik dalam 1 group, kalau sama diabaikan yang penting ada 1
                const id_alkitab = [];
                for (const id of checkedIdGroup) {
                    var tmp_id_alkitab = $('tr[data-id=' + id + ']').data('alkitab');
                    if (id_alkitab.indexOf(tmp_id_alkitab) <= -1) {
                        id_alkitab.push(tmp_id_alkitab);
                    }
                }
                $.ajax({
                    url: 'admin_delete_restore_renungan.php',
                    method: 'POST',
                    data: {
                        id_alkitab: id_alkitab,
                        type: "RESTORE",
                    },
                    success: function(result) {
                        // Hide Modal Detail Group dan Reset id group yang di check
                        $('#dtablesModalDetailGroup').modal('hide');
                        checkedIdGroup.splice(0, checkedIdGroup.length);
                    },
                    error: function(result) {

                    }
                });
            });

            // Radio Button Event
            var checkedIdEvent = null;
            $('body').on('click', 'input[type="radio"]', function() {
                // Setting Behavior dari radio, ketika 1 radio di check, yang lain harus dihilangkan
                $('input[type=radio]').prop('checked', false);
                $(this).prop('checked', true);
                var obj = $(this).closest('tr');

                // ambil id event dan masukkan ke variable
                checkedIdEvent = obj.data('event');
            });

            // kalau di klik clear button maka radio button nya hilang dan tidak ada pilihan
            $('body').on('click', '#clearRadio', function() {
                // Set semua radio button untuk un-check dan reset id event 
                $('input[type=radio]').prop('checked', false);
                checkedIdEvent = null;
            });


            // Show Modal bila klik button "Update Event" dan beri alert bila belum memilih radio button
            $('body').on('click', '#update-event-btn', function() {
                if (checkedIdEvent === null) {
                    alert('Belum Memilih Group yang Akan di Update');
                } else {
                    $('#dtablesModalListEvent').modal('hide');

                    // Populate Input
                    $.ajax({
                        url: 'populate_update_event.php',
                        method: 'POST',
                        data: {
                            checkedIdEvent: checkedIdEvent

                        },
                        success: function(result) {
                            // Show Modal Update Event dan Populate isi Form nya
                            $('#update-event-modal').modal('show');
                            $('#update-event-submit').attr('data-id', result.id_event);
                            $('#updateEvent').val(result.nama);
                            $('#updateJenisEvent').val(result.jenis);
                            $('#updateTempat').val(result.tempat);
                            $('#updateLink').val(result.link);
                        },
                        error: function(result) {

                        }
                    });
                }
            });

            // Ajax Response untuk Submit Update di Modal Update
            $('#update-event-submit').click(function() {
                var id = $(this).data('id');
                var nama = $('#updateEvent').val();
                var jenis = $('#updateJenisEvent').val();
                var tempat = $('#updateTempat').val();
                var link = $('#updateLink').val();


                $.ajax({
                    url: 'admin_update_event.php',
                    method: 'POST',
                    data: {
                        id: id,
                        nama: nama,
                        jenis: jenis,
                        tempat: tempat,
                        link: link,
                    },
                    success: function(result) {
                        // Alert pesan dan Hide Modal Update Event
                        alert(result.notif);
                        $('#update-event-modal').modal('hide');
                    },
                    error: function(result) {

                    }
                });
            });

            $('body').on('click', '#delete-event-btn', function() {
                if (checkedIdEvent === null) {
                    alert('Belum Memilih Group yang Akan di Delete');
                } else {

                    // Ajax untuk Delete Event
                    $.ajax({
                        url: 'admin_delete_restore_event.php',
                        method: 'POST',
                        data: {
                            checkedIdEvent: checkedIdEvent,
                            type: "DELETE",
                        },
                        success: function(result) {
                            // Alert pesan dan Hide Modal List Event
                            alert(result.notif);
                            $('#dtablesModalListEvent').modal('hide');
                        },
                        error: function(result) {

                        }
                    });
                }
            });

            $('body').on('click', '#restore-event-btn', function() {
                if (checkedIdEvent === null) {
                    alert('Belum Memilih Group yang Akan di Restore');
                } else {

                    // Ajax untuk Delete Event
                    $.ajax({
                        url: 'admin_delete_restore_event.php',
                        method: 'POST',
                        data: {
                            checkedIdEvent: checkedIdEvent,
                            type: "RESTORE",
                        },
                        success: function(result) {
                            // Alert pesan dan Hide Modal List Event
                            alert(result.notif);
                            $('#dtablesModalListEvent').modal('hide');

                        },
                        error: function(result) {

                        }
                    });
                }
            });

            // Handler untuk Detail Setiap Event
            const checkedIdDetailEvent = [];
            $('body').on('click', 'input[type=checkbox].checkbox-detail-event', function() {
                // ambil id detail event
                var obj = $(this).closest('tr');
                var id = obj.data('devent');

                // kalau checkbox nya di check maka tombol absen sama alasan di dibuka, tombol update juga diperbolehkan
                if ($(this).prop('checked')) {
                    checkedIdDetailEvent.push(id);
                    obj.find('td:eq(3)').find('input').prop('disabled', false);
                    obj.find('td:eq(4)').find('textarea').prop('disabled', false);
                    $('#update-detail-event').prop('disabled', false);
                } else {
                    // Check id yang kembar ada di index berapa
                    const index = checkedIdDetailEvent.indexOf(id);

                    //kalau ketemu masuk if ini
                    if (index > -1) {
                        checkedIdDetailEvent.splice(index, 1);

                        obj.find('td:eq(3)').find('input').prop('disabled', true);
                        obj.find('td:eq(4)').find('textarea').prop('disabled', true);
                    }
                }

                // Kalau Tidak Ada Yang Dipilih Dikembalikan Ke State Semula (Tombol Update Detail Event)
                if (checkedIdDetailEvent.length > 0) {
                    $('#update-detail-event').prop('disabled', false);
                } else {
                    $('#update-detail-event').prop('disabled', true);
                }
            });

            // Handler untuk klik Absen, jika tulisan tidak hadir di klik akan jadi hadir dan sebaliknya
            $('body').on('click', '.event-absen', function() {
                if ($(this).hasClass('btn-danger') && $(this).val() === 'Tidak Hadir') {
                    $(this).removeClass('btn-danger').addClass('btn-success').val('Hadir');

                } else if ($(this).hasClass('btn-success') && $(this).val() === 'Hadir') {
                    $(this).removeClass('btn-success').addClass('btn-danger').val('Tidak Hadir');
                }
            });

            // Handler untuk Update Detail Event
            $('body').on('click', '#update-detail-event', function() {
                // Variable untuk simpan absen dan alasan
                const absen = [];
                const alasan = [];

                // Untuk setiap id detail event, dapatkan absen dan alasan nya
                for (const id of checkedIdDetailEvent) {
                    var tmp_obj = $('tr[data-devent=' + id + ']');
                    var tmp_absen = tmp_obj.find('td:eq(3)').find('input');

                    if (tmp_absen.hasClass('btn-danger') && tmp_absen.val() === 'Tidak Hadir') {
                        absen.push(0);
                    } else if (tmp_absen.hasClass('btn-success') && tmp_absen.val() === 'Hadir') {
                        absen.push(1);
                    } else {
                        absen.push(2);
                    }
                    var tmp_alasan = tmp_obj.find('td:eq(4)').find('textarea').val();
                    alasan.push(tmp_alasan);
                }

                $.ajax({
                    url: 'admin_update_detail_event.php',
                    method: 'POST',
                    data: {
                        absen: absen,
                        alasan: alasan,
                        checkedIdDetailEvent: checkedIdDetailEvent,
                    },
                    success: function(result) {
                        // Keluarkan Notif dan Hide Modal Detail Event
                        alert(result.notif);
                        $('#dtablesModalDetailEvent').modal('hide');
                    },
                    error: function(result) {

                    }
                });
            });

            // Update Group
            // Handler untuk Double Klik Nama Group
            $('body').on('dblclick', '.group-name-input', function() {
                $(this).prop('disabled', false);
            });

            // Handler untuk Pergantian Nama Group
            $('body').on('change', '.group-name-input', function() {
                // Ada Modal Confirm (yes/no), bila yes masuk if ini
                if (confirm("Nama Group Ini Akan Terubah. Apakah Anda Yakin ?")) {
                    // ambil id dan nama ter-update
                    var id = $(this).data('id');
                    var updatedName = $(this).val();

                    $.ajax({
                        url: 'admin_update_group.php',
                        method: 'POST',
                        data: {
                            id: id,
                            updatedName: updatedName,
                        },
                        success: function(result) {
                            // Keluarkan Notif dan Disabled kembali Nama Group nya
                            alert(result.notif);
                            $('input[data-id=' + id + '].group-name-input').prop('disabled', true);
                        },
                        error: function(result) {

                        }
                    });
                }

            });
            // Delete and Restore Group
            $('body').on('click', '.badge-group', function() {

                // Cek Kalau ada class bg-danger dan tulisannya Non-Active maka ubah jadi aktif dan sebaliknya
                if ($(this).hasClass('bg-danger') && $(this).text('Non-Active')) {
                    newStatus = 1;
                } else if ($(this).hasClass('bg-success') && $(this).text('Active')) {
                    newStatus = 0;
                }

                var statusQuestion = newStatus ? "Aktifkan" : "Non-Aktifkan";
                if (confirm("Group Ini Akan di " + statusQuestion + ". Apakah Anda Yakin ? ")) {

                    var id = $(this).data('id');

                    $.ajax({
                        url: 'admin_delete_restore_group.php',
                        method: 'POST',
                        data: {
                            id: id,
                            newStatus: newStatus,
                        },
                        success: function(result) {
                            // Keluarkan Notif dan Ubah Tampilan Aktif ke Non-Aktif dan sebaliknya
                            alert(result.notif);
                            if (newStatus) {
                                $('span[data-id=' + id + '].badge-group').removeClass('bg-danger').addClass('bg-success').text('Active')
                            } else {
                                $('span[data-id=' + id + '].badge-group').removeClass('bg-success').addClass('bg-danger').text('Non-Active')
                            }
                        },
                        error: function(result) {

                        }
                    });
                }
            });
        });
    </script>

</head>

<body style="overflow-x:scroll;">
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
                                <div class="col-12 header-list-renungan mb-3">
                                    <!-- Button Add Renungan -->
                                </div>
                                <div class="col-4 info-list-renungan">
                                    <!-- Info Nama dan Email Ketua -->
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
                                <div class="col-12 header-list-event">
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
                                        <i class="fas fa-user prefix grey-text"> </i> <label for="inputPasal">Pasal</label>
                                        <input type="number" min="1" class="form-control rounded" name="inputPasal" id="inputPasal">
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
                                    <button class="btn btn-dark" id="preview-renungan-btn">Preview Renungan</button>
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

            <!-- Modal Update Event -->
            <div class="modal fade py-4" id="update-event-modal" data-isingroup="false" data-idgroup="" role="dialog">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog vertical-align-center">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Update Event</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body mx-3">

                                <div class="md-form mb-4">
                                    <i class="fas fa-user prefix grey-text"> </i> <label for="updateEvent">Nama Event</label>
                                    <input type="text" id="updateEvent" class="form-control" placeholder="Pertemuan Hari Kamis" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-calendar-alt prefix grey-text"> </i> <label for="updateJenisEvent">Jenis Event</label>
                                    <input type="text" id="updateJenisEvent" class="form-control" placeholder="CG In" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-phone prefix grey-text"> </i> <label for="updateTempat">Tempat</label>
                                    <input type="text" id="updateTempat" class="form-control" placeholder="Zoom" required>
                                </div>

                                <div class="md-form mb-4">
                                    <i class="fas fa-envelope prefix grey-text"> </i> <label for="updateLink">Link</label>
                                    <input type="url" id="updateLink" class="form-control" placeholder="https:www.zoom.com" required>
                                </div>

                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" id="update-event-submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>