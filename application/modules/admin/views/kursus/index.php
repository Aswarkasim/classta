<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>



<div class="row">
    <div class="col-md-7">


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Manajemen Kursus</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <p>
                    <?php include('add.php')
                    ?>
                </p>

                <table class="table DataTable">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="targetData">
                        <?php $no = 1;
                        foreach ($kursus as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= base_url('admin/simulasi/index/' . $row->id_kursus); ?>"><b><?= $row->nama_kursus ?></b></a></td>

                                <td>
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ModalEdit<?= $row->id_kursus ?>">
                                        <i class="fa fa-edit"></i>Edit
                                    </button>

                                    <a href="<?= base_url($tombol['delete'] . $row->id_kursus) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <?php include('edit.php')
                                ?>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
        </div>

    </div>
</div>