<?php
    include 'connect.php';
    var_dump($_SESSION['email']);
    require_once 'secure_admin.php';
    $sql = "SELECT * FROM `group_alkitab` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $output="";
    $count = 0;

    while ($row = $stmt->fetch()) {
        $output .= '<tr>
                    <td>' . ++$count . '</td>
                    <td>' . $row['nama'] . '</td>';

        $output .= '<td>
                        <button id="'. $row['id'] .'-" type="button" class="btn btn-success viewAnggota">View</button>
                    </td>
                    <td>
                        <button id="' . $row['id'] . '" type="button" class="btn btn-primary viewEvent">View</button>
                    </td>
                    <td>
                        <a href="pdf_recap.php?id=' . $row['id'] . '">
                            <button type="button" class="btn btn-secondary">Download</button>
                        </a>
                    </td></tr>';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proyek Tekweb</title>
    <?php include('assets/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="assets/css/admin_sidebar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin_home.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        $(document).ready(function() {
            $('#recap').addClass('active');

            $(document).on("click", ".viewAnggota", function(){
                 // SHOW MODAL
                 var myModal = new bootstrap.Modal(document.getElementById('anggotaModal'), {
                    keyboard: false
                })
                var modalToggle = document.getElementById('anggotaModal') // relatedTarget
                myModal.show(modalToggle);
                var idGroup = this.id[0];

                $.ajax({
                    url: "admin_recap_ajax.php",
                    method: "POST",
                    data: { for: "viewAnggota", idGroup: idGroup },
                    success: function(data) {
                        var res = data.split('~~');   

                        if (res[0] == "success") {
                            $("#modalAnggota").html(res[1]);
                        }
                        else if (res[0] == "error") {
                            alert("error");
                        }
                    },
                    error: function() {
                        alert("error");
                    }
                });
            });

            $(document).on("click", ".viewEvent", function(){
                // SHOW MODAL
                var myModal = new bootstrap.Modal(document.getElementById('eventModal'), {
                    keyboard: false
                })
                var modalToggle = document.getElementById('eventModal') // relatedTarget
                myModal.show(modalToggle);
                var idGroup = this.id;

                $.ajax({
                    url: "admin_recap_ajax.php",
                    method: "POST",
                    data: { for: "viewEvent", idGroup: idGroup },
                    success: function(data) {
                        var res = data.split('~~');   

                        if (res[0] == "success") {
                            $("#modalEvent").html(res[1]);
                        }
                        else if (res[0] == "error") {
                            alert("error");
                        }
                    },
                    error: function() {
                        alert("error");
                    }
                });
            });

            $(document).on("click", ".downloadPdf", function(){
                var idGroup = this.id;
                
                $.ajax({
                    url: "admin_recap_ajax.php",
                    method: "POST",
                    data: { for: "downloadPdf", idGroup: idGroup },
                    success: function(data) {
                        alert(data)
                    },
                    error: function() {
                        alert("error");
                    }
                });
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
                <h1><i class="fa-solid fa-clipboard"></i> Recap</h1>
                <div id="div-manage-users" class="my-5">
                    <table id="manage-users" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>GROUP</th>
                                <th>ANGGOTA</th>
                                <th>EVENTS</th>
                                <th>BUTTON PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $output;?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal List Event -->
                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalEvent">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Modal List Anggota -->
                <div class="modal fade" id="anggotaModal" tabindex="-1" aria-labelledby="anggotaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="anggotaModalLabel">Anggota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalAnggota">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>