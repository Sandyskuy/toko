<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('sb/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb/css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/transaksi') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Transaksi</span>
                </a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('/barang') ?>">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/user') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th>NAMA</th>
                                    <th>NETTO</th>
                                    <th>STOK</th>
                                    <th>HARGA JUAL</th>
                                    <th>HARGA BELI</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1;
                                for ($i = count($barang) - 1; $i > -1; $i--) :
                                ?>
                                    <tr id="baris<?= $barang[$i]['id'] ?>">
                                        <td><?= $j ?></td>
                                        <td><?= $barang[$i]['id'] ?></td>
                                        <td><?= $barang[$i]['nama'] ?></td>
                                        <td><?= $barang[$i]['netto'] ?></td>
                                        <td><?= $barang[$i]['stok'] ?></td>
                                        <td><?= $barang[$i]['harga'] ?></td>
                                        <td><?= $barang[$i]['hargaKulak'] ?></td>
                                        <td>
                                        <a href="#" class="badge badge-warning p-2" onClick="edit(<?= $barang[$i]['id'] ?>)"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="badge badge-danger p-2" id="hapus<?= $barang[$i]['id'] ?>" onClick="tryHapus(<?= $barang[$i]['id'] ?>, '<?= $barang[$i]['nama'] ?>', '<?= $barang[$i]['netto'] ?>')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $j++;
                                endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Netto</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="netto" name="netto" placeholder="Netto. (contoh 20 ml)">
                                    </div>
                                </div>
                                <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Stok</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="0">
    </div>
</div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Harga Kulak</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="hargaKulak" name="hargaKulak" placeholder="Harga Kulak" value="0">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" onclick="tambah()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="modalHapus" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Barang</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="" id="idHapus" name="idHapus">
                            <p>Apakah anda yakin ingin menghapus <b id="detailHapus">....</b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="hapus()" class="btn btn-danger">Hapus</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
            </div>
            <div class="modal-body">
                <form id="formEdit">
                    <input type="hidden" id="editId" name="editId">
                    <div class="form-group row">
                        <label for="editNama" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editNama" name="editNama" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editNetto" class="col-sm-2 col-form-label">Netto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editNetto" name="editNetto" placeholder="Netto. (contoh 20 ml)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editStok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editStok" name="editStok" placeholder="Stok" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editHarga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editHarga" name="editHarga" placeholder="Harga" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editHargaKulak" class="col-sm-2 col-form-label">Harga Kulak</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="editHargaKulak" name="editHargaKulak" placeholder="Harga Kulak" value="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="update()">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
            <script>
                function tambah() {
                    if ($("#nama").val() == "") {
                        $("#nama").focus();
                    } else if ($("#netto").val() == "") {
                        $("#netto").focus();
                    } else if ($("#stok").val() == "") {
                        $("#stok").val(0);
                    } else if ($("#harga").val() == "") {
                        $("#harga").val(0);
                    } else if ($("#hargaKulak").val() == "") {
                        $("#hargaKulak").val(0);
                    } else {
                        $.ajax({
                            type: 'POST',
                            data: 'nama=' + $("#nama").val() + '&netto=' + $("#netto").val() + '&stok=' + $("#stok").val() + '&harga=' + $("#harga").val() + '&hargaKulak=' + $("#hargaKulak").val(),
                            url: '<?= base_url() ?>/barang/tambah',
                            dataType: 'json',
                            success: function (data) {
                                $("#nama").val("");
                                $("#netto").val("");
                                $("#stok").val(0); // Reset stok setelah tambah
                                $("#harga").val(0);
                                $("#hargaKulak").val(0);

                                $('#modalTambah').modal('hide');
                                $("<tr id='baris" + data["id"] + "'><td>0</td><td>" + data["id"] + "</td><td>" + data["nama"] + "</td><td>" + data["netto"] + "</td><td>" + data["stok"] + "</td><td>" + data["harga"] + "</td><td>" + data["hargaKulak"] + '</td><td><a href="#" class="badge badge-danger p-2" id="hapus' + data['id'] + '" onClick=\'tryHapus(' + data['id'] + ', "' + data['nama'] + '", " ' + data['netto'] + '")\'><i class="fas fa-trash"></i></a></td></tr>').prependTo("#dataTable");
                            }
                        });
                    }
                }

                function edit(id) {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url() ?>/barang/edit/' + id,
                        dataType: 'json',
                        success: function (data) {
                            if (data.error) {
                                alert(data.error);
                            } else {
                                $('#editId').val(data.id);
                                $('#editNama').val(data.nama);
                                $('#editNetto').val(data.netto);
                                $('#editStok').val(data.stok);
                                $('#editHarga').val(data.harga);
                                $('#editHargaKulak').val(data.hargaKulak);
                                $('#modalEdit').modal('show');
                            }
                        }
                    });
                }

                function update() {
                    $.ajax({
                        type: 'POST',
                        data: $('#formEdit').serialize(),
                        url: '<?= base_url() ?>/barang/update',
                        dataType: 'json',
                        success: function (data) {
                            // Update the corresponding row in the table with the new data
                            $('#baris' + data.id + ' td:nth-child(3)').text(data.nama);
                            $('#baris' + data.id + ' td:nth-child(4)').text(data.netto);
                            $('#baris' + data.id + ' td:nth-child(5)').text(data.stok);
                            $('#baris' + data.id + ' td:nth-child(6)').text(data.harga);
                            $('#baris' + data.id + ' td:nth-child(7)').text(data.hargaKulak);
                            $('#modalEdit').modal('hide');
                        }
                    });
                }

                function tryHapus(id, nama, netto) {
                    $("#hapus" + id).html('<i class="fas fa-spinner fa-pulse"></i>')
                    $("#idHapus").val(id)
                    $("#detailHapus").html(nama + " (" + netto + ") ")
                    $("#hapus" + id).html('<i class="fas fa-trash"></i>')
                    $("#modalHapus").modal('show')
                }

                function hapus() {
                    $("#hapus").html('<i class="fas fa-spinner fa-pulse"></i> Memproses..')
                    var id = $("#idHapus").val()
                    $.ajax({
                        url: '<?= base_url() ?>/barang/hapus',
                        method: 'post',
                        data: "id=" + id,
                        dataType: 'json',
                        success: function(data) {
                            $("#idHapus").val("")
                            $("#detailHapus").html("")
                            $("#baris" + id).remove()
                            $("#modalHapus").modal('hide')
                            $("#hapus").html('Hapus')
                        }
                    });
                }
            </script>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('sb/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('sb/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('sb/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('sb/js/sb-admin-2.min.js')?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('sb/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('sb/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?= base_url('sb/js/demo/chart-pie-demo.js')?>"></script>
</body>

</html>