<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('calon_mitra/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <!-- <div class="col-md-3 text-right">
                <form action="<?php echo site_url('calon_mitra/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('calon_mitra'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
        </div>
        <table id="example1" class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
        <th>No</th>
        <th>Desa</th>
        <th>Status</th>
<!--         <th>Gambar</th> -->
        <th>PIC</th>
        <th>Tanggal</th>
        
        <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $start = 0;
            $calon_mitra_data = $this->db->get('calon_mitra')->result();
            foreach ($calon_mitra_data as $calon_mitra)
            {
                ?>
                
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $calon_mitra->desa ?></td>
            <td><?php echo $calon_mitra->status ?> / <?php echo $calon_mitra->status2 ?> /<?php echo $calon_mitra->status3 ?> </td> 
            <td><?php echo $calon_mitra->pic ?></td>
            <td><?php echo $calon_mitra->tanggal ?></td>

            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('calon_mitra/read/'.$calon_mitra->id_calon),'Detail'); 
                echo ' | '; 
                echo anchor(site_url('calon_mitra/update/'.$calon_mitra->id_calon),'<i class="glyphicon glyphicon-edit"></i> Update'); 
                echo ' | '; 
                echo anchor(site_url('calon_mitra/delete/'.$calon_mitra->id_calon),'<i class="glyphicon glyphicon-trash"></i> Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
        
                <?php
            }
            ?>
            </tbody>
        </table>
        