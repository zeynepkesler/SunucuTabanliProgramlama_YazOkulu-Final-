<?php
$page = "Hakkımızda";
include('../inc/vt.php');
include('inc/head.php');
include('inc/nav.php');
include('inc/sidebar.php');

$query = $connection->prepare("SELECT * FROM about_us");
$query->execute();


?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Hakkımızda</li>
        </ol>
        

        <!-- DataTables Example -->
        <div class="card mb-3">

            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fotoğraf</th>
                            <th>Üst Başlık</th>
                            <th>Başlık</th>
                            <th>İçerik</th>
                            <th>Düzenle</th>
                            

                        </tr>
                        </thead>

                        <tbody>

                        <?php while ($result = $query->fetch()) { ?>
                            <tr>
                                <td><?= $result["id"] ?></td>
                                <td><img src="../img/<?= $result["photo"] ?>" width="150px"/></td>
                                <td><?= $result["toptitle"] ?></td>
                                <td><?= $result["title"] ?></td>
                                <td><a class="btn btn-info" href="#" data-toggle="modal"
                                       data-target="#content<?= $result["id"] ?>">Oku</a>
                                    <!-- Logout Modal-->
                                    <div class="modal fade" id="content<?= $result["id"] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">İçerik</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"><?= $result["content"] ?></div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Kapat
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
</td>
                              
                                <td><a class="btn btn" href="aboutusupdate.php?id=<?= $result["id"] ?>"><span
                                                class="fa fa-edit fa-2x"></span></a></td>
                                
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <?php
    include('inc/footer.php');
    ?>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                language: {
                    info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
                    infoEmpty: "Gösterilecek hiç kayıt yok.",
                    loadingRecords: "Kayıtlar yükleniyor.",
                    zeroRecords: "Tablo boş",
                    search: "Arama:",
                    sLengthMenu: "Sayfada _MENU_ kayıt göster",
                    infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
                    buttons: {
                        copyTitle: "Panoya kopyalandı.",
                        copySuccess: "Panoya %d satır kopyalandı",
                        copy: "Kopyala",
                        print: "Yazdır",
                    },

                    paginate: {
                        first: "İlk",
                        previous: "Önceki",
                        next: "Sonraki",
                        last: "Son"
                    },
                }
            });
        });

    </script>
    
    <link rel="stylesheet" type="text/css" href="css/switch.css">


    