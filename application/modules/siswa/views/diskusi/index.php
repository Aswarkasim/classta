<p><b><?= $topik->topik; ?></b></p>
<p><?= $topik->deskripsi; ?></p>

<p class="text-danger" id="pesan"></p>



<!-- <button type="button" onclick="postComment()" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#ModalKomentarGuru">
  <i class="fa fa-comments"></i> Komentar
</button> -->

<hr>
<div id="comment" class="px-3 py-2" style="height: 300px; overflow: auto;">

</div>
<hr>
<br>

<textarea name="isi_komentar" class="form-control" cols="20" rows="5"></textarea>
<button type="button" onclick="postComment()" class="btn btn-primary my-4">
  <i class="fa fa-comments"></i> Komentari
</button>


<script type="text/javascript">
  $('document').ready(function() {
    setInterval(function() {
      readComment(id_dis_topik)
    }, 1000)
  })


  var id_dis_topik = '<?= $topik->id_dis_topik; ?>'
  var id_user = '<?= $this->session->userdata('id_user'); ?>'
  readComment(id_dis_topik)

  function readComment(id_topik) {
    $.ajax({
      type: 'POST',
      url: '<?= base_url('siswa/diskusi/readComment/'); ?>' + id_topik,
      dataType: 'json',
      success: function(data) {
        // console.log(data);


        // Auto ke bawah
        // $("#comment").scrollTop($("#comment")[0].scrollHeight);

        var baris = ''
        var barisUserLain = ''

        for (var i = 0; i < data.length; i++) {

          if (id_user != data[i].id_user) {
            baris += '<div class="row"><div class="col-md-12"><span class="float-end bg-light shadow-sm rounded mt-2 px-4 py-3" style="max-width: 80%;"><b >' + data[i].namalengkap + '</b><br>' + data[i].isi_komentar + '<br ></span><span class"clear-fix"></span></div></div>'
          } else {
            baris += '<div class="row"><div class="col-md-12"><span class="float-start bg-info shadow-sm rounded mt-3 px-4 py-3" style="max-width: 80%;">' + data[i].isi_komentar + '</span></span><span class"clear-fix"></span></div></div>'
          }
        }
        console.log(data)
        $('#comment').html(baris)
      }
    })
  }

  function postComment() {


    var isi_komentar = $("[name='isi_komentar']").val()

    $.ajax({
      type: 'POST',
      data: 'id_dis_topik=' + id_dis_topik + '&id_user=' + id_user + '&isi_komentar=' + isi_komentar,
      url: '<?= base_url('siswa/diskusi/postKomentar') ?>',
      dataType: 'json',
      success: function(result) {

        $("#pesan").html(result.pesan)

        readComment(id_dis_topik)
        // $("#ModalKomentarGuru").modal("hide")
        $("[name = 'isi_komentar']").val('');
        $("#comment").scrollTop($("#comment")[0].scrollHeight);

      }
    })
  }
</script>