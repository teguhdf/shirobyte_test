<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user" name="password1" id="password1">
                            <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password2">Repeat Password</label>
                            <input type="password" class="form-control form-control-user" name="password2">
                        </div>
                        <div class="form-group">
                            <label for="noTlp">No Telepon</label>
                            <input type="text" name="noTlp" class="form-control" id="noTlp">
                            <small class="form-text text-danger"><?= form_error('noTlp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" name="gender" value="pria">Pria</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="wanita">Wanita</label>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select class="form-control" id="pekerjaan" name="pekerjaan">
                                <option value="karyawan swasta">Karyawan swasta</option>
                                <option value="pegawai negri">Pegawai negri</option>
                                <option value="belum bekerja">Belum bekerja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="berkas" />
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>