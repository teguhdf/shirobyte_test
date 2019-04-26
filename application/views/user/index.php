<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>users/tambah" class="btn btn-primary">Tambah
                Data User</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md">
            <h3>Daftar Users</h3>
            <?php if (empty($user)) : ?>
                <div class="alert alert-danger" role="alert">
                    data user tidak ditemukan.
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        <?php foreach ($user as $usr) : ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $usr['nama']; ?></td>
                                <td><?= $usr['email']; ?></td>
                                <td><?= $usr['gender']; ?></td>
                                <td><?= $usr['noTlp']; ?></td>
                                <td><?= $usr['pekerjaan']; ?></td>
                                <td><img src="<?php echo base_url().'assets/gambar/'.$usr['photo'] ?>"/ width="40" height="40"></td>
                                <td><a href="<?php echo base_url() . 'users/hapus/' . $usr['id']; ?>" class="btn btn-danger btn-sm  tombol-hapus"><span class="fa fa-close"></span> Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
