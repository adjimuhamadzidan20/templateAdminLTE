  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User & Admin</h3><br>
              <button type="button" class="btn mt-1 text-light" data-toggle="modal" data-target="#modal-default" style="background-color: #130f40;"> 
                <i class="fa fa-plus mr-1"></i> Tambah User
              </button>
              <a href="page/user/print_user.php" target="_blank">
                <button type="button" class="btn mt-1 text-light" style="background-color: #130f40;">
                  <i class="fas fa-file-pdf mr-1"></i> Print PDF
                </button>
              </a>
              <a href="page/user/print_user_excel.php">
                <button type="button" class="btn text-light mt-1" style="background-color: #130f40;">
                  <i class="fas fa-file-excel mr-1"></i> Print Excel
                </button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>QR Code</th>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                    $no = 0;
                    $sql = $mysqli->query("SELECT * FROM tb_user");
                    while ($data = mysqli_fetch_assoc($sql)) :
                    $no++;
                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td>
                      <?php  
                        $kode = 'PT. Admin'. $data['id_user'] .' - '. $data['nama_user'] .'';
                        require_once('asset/phpqrcode/qrlib.php');
                        QRcode::png("$kode","Kode ". $no .".png","M", 2,2); 
                      ?>

                      <img src="Kode <?= $no ?>.png" alt="">
                    </td>
                    <td><?= $data['id_user']; ?></td>
                    <td><?= $data['nama_user']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['status']; ?></td>
                    <td>
                      <center>
                        <a href="index.php?page=edit_user&kode=<?php echo $data['id_user']; ?>">
                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="index.php?page=delete_user&kode=<?php echo $data['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapusnya?');">
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                      </center>
                    </td>
                  </tr>
                  <?php 
                    endwhile;
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Create By</b> Adji Muhamad Zidan -
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- modal form tambah data -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Tambah User / Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="index.php?page=create_user">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">ID User</label>
                <input type="Text" class="form-control" placeholder="Masukan ID" name="id">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama User</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <input type="Text" class="form-control" placeholder="Masukan Status" name="status">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn text-light" style="background-color: #130f40;">Simpan Data</button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->