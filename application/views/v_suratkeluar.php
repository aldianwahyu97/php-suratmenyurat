<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <title>Sistem Informasi Surat Menyurat</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('/assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('/assets/css/sb-admin.css')?>" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Sistem Informasi Surat Menyurat</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a href="<?php echo base_url(); ?>index.php/Welcome/beranda" class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item active">
        <a href="<?php echo base_url(); ?>index.php/Welcome/suratmasuk" class="nav-link" href="index.html">
          <i class="fas fa-box"></i>
          <!-- <span class="glyphicon glyphicon-envelope">Surat Masuk</span> -->
          <span>Surat Masuk</span>
        </a>
      </li>

      <li class="nav-item active">
        <a href="<?php echo base_url(); ?>index.php/Welcome/suratkeluar" class="nav-link" href="index.html">
          <i class="fas fa-box"></i>
          <span>Surat Keluar</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
      <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Surat Keluar</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tgl Surat</th>
                    <th>No.Agenda</th>
                    <th>No.Surat</th>
                    <th>Dari</th>
                    <th>Hal</th>
                    <th>Informasi</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tgl Surat</th>
                    <th>No.Agenda</th>
                    <th>No.Surat</th>
                    <th>Dari</th>
                    <th>Hal</th>
                    <th>Informasi</th>
                    <th>Pilihan</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach($surat_keluar as $sk){ 
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $sk->tgl_surat ?></td>
                      <td><?php echo $sk->no_agenda ?></td>
                      <td><?php echo $sk->no_surat ?></td>
                      <td><?php echo $sk->dari ?></td>
                      <td><?php echo $sk->prihal ?></td>
                      <td><?php echo $sk->informasi ?></td>
                      <td align="center">
                            <?php //echo anchor('crud/edit/'.$u->id,'Edit'); ?>
                            <?php //echo anchor('crud/hapus/'.$u->id,'Hapus'); ?>
                            <button class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $sk->no;?>">Edit</button> <br><br>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $sk->no;?>">Hapus</button>
                      </td>
                    </tr>

                    <!-- Modal Hapus-->
                    <div id="ModalHapus<?php echo $sk->no ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Hapus Surat <?php echo $sk->no_surat ?></h4>
                              </div>
                              <div class="modal-body">
                              <form action="<?php echo base_url(); ?>index.php/Welcome/hapus_suratkeluar" method="POST"> 
                                  <div class="form-group">
                                    <label for="agenda">Hapus Nomor Surat:</label>
                                    <input type="text" name="no_surat" class="form-control" value="<?php echo $sk->no_surat?>">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                              </div>
                            </div>
                          </div>
                      </div>

                    <!--Modal Edit-->
                    <div id="ModalEdit<?php echo $sk->no;?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title">Edit Surat Keluar No.<?php echo $sk->no_surat;?></h4>
                          </div>
                          <div class="modal-body">
                              <form action="<?php echo base_url(); ?>index.php/Welcome/update_suratkeluar" method="POST"> 
                                <div class="form-group">
                                    <label for="agenda">Nomor Agenda:</label>
                                    <input type="text" name="no_agenda" class="form-control" value="<?php echo $sk->no_agenda ?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat:</label>
                                    <input type="text" name="no_surat" class="form-control" value="<?php echo $sk->no_surat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dari">Dari:</label>
                                    <input type="text" name="dari" class="form-control" value="<?php echo $sk->dari ?>">
                                </div>
                                <div class="form-group">
                                    <label for="hal">Prihal:</label>
                                    <input type="text" name="prihal" class="form-control" value="<?php echo $sk->prihal ?>">
                                </div>
                                <div class="form-group">
                                    <label for="informasi">Informasi:</label> <br>
                                    <input type="text" name="informasi" class="form-control" value="<?php echo $sk->informasi ?>">
                                    <!-- <textarea name="informasi" id="" cols="100" rows="10"></textarea> -->
                                </div>
                                <div class="form-group">
                                    <label for="file">Scan Surat:</label> <br>
                                    <input type="file" class="form-control" id="file">
                                    <!-- <textarea name="informasi" id="" cols="100" rows="10"></textarea> -->
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    <?php } ?>

                  <!-- <tr>
                    <td>1</td>
                    <td>22-09-2019</td>
                    <td>01</td>
                    <td>001/UNRAM/DPR/III/2019</td>
                    <td>DPR</td>
                    <td>Undangan Rapat Koordinasi Kementerian</td>
                    <td>Undangan Rapat Koordinasi Kementerian</td>
                    <td align="center">
                        <button class="btn btn-success" width="80%">Edit</button> <br><br>
                        <button class="btn btn-danger" width="80%">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>22-09-2019</td>
                    <td>01</td>
                    <td>001/UNRAM/DPR/III/2019</td>
                    <td>DPR</td>
                    <td>Undangan Rapat Koordinasi Kementerian</td>
                    <td>Undangan Rapat Koordinasi Kementerian</td>
                    <td align="center">
                        <button class="btn btn-success" width="80%">Edit</button> <br><br>
                        <button class="btn btn-danger" width="80%">Hapus</button>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <hr>

            <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Input Surat Masuk</div>
            <div class="card-body">
                    <form action="<?php echo base_url(); ?>index.php/Welcome/tambah_suratkeluar" method="POST"> 
                            <div class="form-group">
                                <label for="agenda">Nomor Agenda:</label>
                                <input type="text" name="no_agenda" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat:</label>
                                <input type="text" name="no_surat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dari">Dari:</label>
                                <input type="text" name="dari" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="hal">Prihal:</label>
                                <input type="text" name="prihal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="informasi">Informasi:</label> <br>
                                <input type="text" name="informasi" class="form-control">
                                <!-- <textarea name="informasi" id="" cols="100" rows="10"></textarea> -->
                            </div>
                            <div class="form-group">
                                <label for="file">Scan Surat:</label> <br>
                                <input type="file" class="form-control" id="file">
                                <!-- <textarea name="informasi" id="" cols="100" rows="10"></textarea> -->
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#preview').attr('src', e.target.result);
			}

	
			reader.readAsDataURL(input.files[0]);
		}
		}

		$("#img").change(function() {
			readURL(this);
		});
	</script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('/assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('/assets/vendor/chart.js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('/assets/vendor/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?php echo base_url('/assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('/assets/js/sb-admin.min.js')?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('/assets/js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('/assets/js/demo/chart-area-demo.js')?>"></script>

</body>

</html>
