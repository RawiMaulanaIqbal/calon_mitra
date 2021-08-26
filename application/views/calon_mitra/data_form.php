<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        
        <div class="col-md-6">
            <label for="varchar">Kode Calon Mitra <?php echo form_error('kode_calon_mitra') ?></label>
            <?php 
                $uri = $this->uri->segment(2);
                 $cek = $this->db->get('calon_mitra')->num_rows();
                 if ($cek == 0) {
                   $data = '0001';
                 } else {
                    $this->db->order_by('id_calon', 'DESC');
                   $cekdb = $this->db->get('calon_mitra')->row();
                   $data = $cekdb->kode_calon_mitra;
                   $no_urut = (int)substr($data, 0, 4);
                    $no_urut++;

                    $char = "";
                    $data = $char . sprintf("%04s", $no_urut);
                 }
                 
                  ?>
            <input type="text" class="form-control" name="kode_calon_mitra" id="kode_calon_mitra" placeholder="Kode Calon Mitra" value="<?php if ($uri == 'create') { echo $data; } else { echo $kode_calon_mitra; } ?>" />
        </div>

        <div class="col-md-6">
            <label for="varchar">Tanggal<?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal"  value="<?php echo date('Y-m-d'); ?>"  />
        </div>

        <div class="col-md-6">
            <label for="varchar">Desa<?php echo form_error('desa') ?></label>
            <input type="text" class="form-control" name="desa" id="desa" placeholder="Desa"<?php echo $esa; ?> />
        </div>
           
        
        <div class="col-md-6">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" <?php echo $kecamatan; ?> />
        </div>

        <div class="col-md-6">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" <?php echo $kabupaten; ?> />
        </div>
        
        <div class="col-md-6">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" <?php echo $provinsi; ?>/>
        </div>

          <div class="col-md-6">
            <label for="varchar">User <?php echo form_error('user') ?></label>
            <input type="text" class="form-control" name="user" id="user" placeholder="User" <?php echo $user; ?>/>
        </div>
        
        <div class="col-md-6">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Handphone" <?php echo $no_hp; ?> />
        </div>

         <div class="col-md-6">
             <label for="varchar">Nama PIC <?php echo form_error('pic') ?></label>
                  <select class="form-control" name="pic" id="pic" >
                  <?php foreach($this->db->get_where('user')->result_array() as $l){ ?>
                  <option value="<?php echo $l['nama']; ?>"><?php echo $l['nama']; ?>   </option>
                  <?php } ?>
                </select> 
         </div>

        <div class="col-md-6">
            <label for="varchar">Apakah Sudah Tersosialisasi <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status">
                <option value="">-</option>
                <option value="sosialisasi">Sosialisis</font></option>
                <option value="belum_sosialisasi">Belum Sosialisasi</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="varchar">Apakah Sudah Tertarik <?php echo form_error('status2') ?></label>
            <select class="form-control" name="status2" id="status2">
                <option value="">-</option>
                <option value="tertarik">Tertarik</option>
                <option value="belum_tertarik">Belum Tertarik</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="varchar">Apakah Sudah Deal <?php echo form_error('status3') ?></label>
            <select class="form-control" name="status3" id="status3">
                <option value="">-</option>
                <option value="deal">Deal</option>
                <option value="hampir_deal">Hampir Deal</option>
                <option value="tidak_deal">Tidak Deal</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="keterangan">Tindak Lanjut <?php echo form_error('tindak_lanjut') ?></label>
            <textarea class="form-control" rows="3" name="tindak_lanjut" id="tindak_lanjut" placeholder="Tindak Lanjut"><?php echo $tindak_lanjut; ?></textarea>
        </div>
        <div class="col-md-6">
            <label for="catatan">Catatan <?php echo form_error('janji') ?></label>
            <textarea class="form-control" rows="3" name="janji" id="janji" placeholder="Catatan"><?php echo $janji; ?></textarea>
        </div>

        <div class="col-md-12">
        <input type="hidden" name="id_calon" <?php echo $id_calon; ?> /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('calon_mitra') ?>" class="btn btn-default">Cancel</a>
        </div>        
    </form>

