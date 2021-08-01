 <a href="<?= base_url('guru/tugas/add'); ?>" class="btn btn-primary mb-1"><i class="fa fa-plus"></i> Tambah Tugas</a>
 <table class="table table-striped">
   <tr>
     <th>No</th>
     <th>Nama Tugas</th>
     <th>Status</th>
     <th>Aksi</th>
   </tr>

   <?php $no = 1;
    foreach ($tugas as $row) { ?>
     <tr>
       <td><?= $no++; ?></td>
       <td><a href="" class="link"><b><?= $row->nama_tugas; ?></b></a></td>
       <td>
         <?= $row->is_active == 1 ? '<span class="text-success">Aktif</span>' : '<span class="text-danger">Tidak Aktif</span>'; ?>

       </td>
       <td>
         <div class="btn-group">
           <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
             Pilihan
           </button>
           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
             <?php if ($row->is_active == 0) { ?>
               <li><a class="dropdown-item" href="<?= base_url('guru/tugas/is_active/' . $row->id_tug_tugas . '/1'); ?>"><i class="fa fa-power-off"></i> Aktifkan</a></li>
             <?php } else { ?>
               <li><a class="dropdown-item" href="<?= base_url('guru/tugas/is_active/' . $row->id_tug_tugas . '/0'); ?>"><i class="fa fa-power-off"></i> Nonaktifkan</a></li>
             <?php } ?>
             <li><a class="dropdown-item" href="<?= base_url('guru/tugas/edit/' . $row->id_tug_tugas); ?>"><i class="fa fa-edit"></i> Edit</a></li>
             <li><a class="dropdown-item tombol-hapus" href="<?= base_url('guru/tugas/delete/' . $row->id_tug_tugas); ?>"><i class="fa fa-trash"></i> Hapus</a></li>
           </ul>
         </div>
       </td>
     </tr>
   <?php } ?>
 </table>


 <div class="row">
   <div class="col-md-12">
     <div class="text-center">
       <?= $pagination ?>
     </div>
   </div>
 </div>