<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              session();
              $validation = \Config\Services::validation();
              ?>
              <?php echo form_open('Wilayah/InsertData') ?>

              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                <label>Nama Wilayah</label>
                <input name="nama_wilayah" value="<?= old('nama_wilayah') ?> " class="form-control">
                <p class="text-danger"><?= $validation->hasError('nama_wilayah') ? $validation->getError('nama_wilayah') : '' ?></p>
                  </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                <label>Warna Wilayah</label>
                <input name="warna" value="<?= old('warna') ?> " class="form-control my-colorpicker1">
                <p class="text-danger"><?= $validation->hasError('warna') ? $validation->getError('warna') : '' ?></p>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label>GeoJSON</label>
                <p class="text-danger"><?= $validation->hasError('geojson') ? $validation->getError('geojson') : '' ?></p>
                <textarea name="geojson" class="form-control" rows="15"><?= old('geojson') ?></textarea>
                    </div>


              <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
              <a href="<?= base_url('Wilayah') ?> "class="btn btn-success btn-flat" >Kembali</a>

              <script>
                 //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()
              </script>
 





              <?php echo form_close() ?>

        </div>
    </div>
</div>