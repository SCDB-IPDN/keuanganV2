<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="<?php echo base_url('BeritaEksternal');?>">BeritaEksternal</a></li>
  </ol>
  <h1 class="page-header">Berita Eksternal</h1>
  <div class="row">
    <div class="col-xl-12">
      <div class="panel panel-inverse">
        <div class="panel-heading">
          <h4 class="panel-title"> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah" data-whatever="@getbootstrap">Tambah</button>
          </h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>

        <div class="card-body">
              <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <?php echo $this->session->flashdata('notifberita') ?>
                                    <form method="POST" action="<?php echo base_url() ?>BeritaEksternal/uploadaja" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">UNGGAH FILE EXCEL nya Yaa</label>
                                            <span class="ml-2">
                                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Format yang diupload .xlsx" data-placement="top" data-content=""></i>
                                            </span>
                                            <input for="struk" type="file" name="struk" class="form-control">
                                        </div>

                                        <button id="struk" type="submit" class="btn btn-success">UPLOAD Filenya Ya</button>
                                    </form>
                                </div>
                </div>
           </div>

        <?php if($this->session->flashdata('error') != NULL){ ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Notif!</strong> <?php echo $this->session->flashdata('error') ?>
        </div>
        <?php } ?>

        <div class="panel-body">
          <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th class="text-nowrap">No</th>
                <th class="text-nowrap">Nama Media</th>
                <th class="text-nowrap">Judul</th>
                <th class="text-nowrap">Link</th>
                <th class="text-nowrap">Tanggal</th>
                <th class="text-nowrap">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $no =0 ;
                foreach($data as $row){
                $no++;    
            ?>
              <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->NamaMedia; ?></td>
              <td><?php echo $row->Judul; ?></td>
              <td> <a href="<?php echo $row->Link?>"> <?php echo $row->Link?></a></td>
              <!-- <a href="tanggal"> tanggal</a> -->
              <td><?php echo $row->Tanggal; ?></td>
              <td>
                <button type="button" class="btn btn-primary" 
                data-toggle="modal" data-target="#edit<?php echo 
                $row->Id?>"><i class="fas fa-edit"></i></button>
                
                <button type="button" class="btn btn-danger" 
                data-toggle="modal" data-target="#Hapus<?php echo 
                $row->Id?>"><i class="fas fa-trash"></i></button>
              </td>
              
              </tr>
              <!--Modal EDIT-->
              </div>
              <div class="modal fade" Id="edit<?php echo 
                $row->Id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="BeritaEksternal/edit_beritaeksternal">
                       <input type="hidden" name="Id" value="<?php echo $row->Id;?>">

                        <div class="form-group">
                          <label for="NamaMedia" class="col-form-label">Nama Berita Eksternal:</label>
                          <input type="text" class="form-control" id="NamaMedia" name="NamaMedia" value="<?php echo $row->NamaMedia;?>"required>
                        </div>

                        <div class="form-group">
                          <label for="Judul" class="col-form-label">Judul:</label>
                           <input type="text" class="form-control" id="Judul" name="Judul" value="<?php echo $row->Judul;?>"required>
                        </div>

                        <div class="form-group">
                          <label for="Link" class="col-form-label">Link:</label>
                          <input type="text" class="form-control" id="Link" name="Link" value="<?php echo $row->Link;?>"required>
                        </div>

                        <div class="form-group">
                          <label for="Tanggal" class="col-form-label">Tanggal:</label>
                          <input type="text" class="form-control" id="Tanggal" name="Tanggal" value="<?php echo $row->Tanggal;?>"required>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div> 
                      </form>
                    </div>
                   </div>
                </div>
              </div>
                        

              <!--Modal Hapus-->
              <div class="modal fade" Id="Hapus<?php echo $row->Id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Yakin Nih Akan Hapus Data <?php echo $row->Judul;?></h10>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post"action="BeritaEksternal/hapus_BeritaEksternal">
                          <input type="hidden" name="Id" value="<?php echo $row->Id;?>">

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </div> 
                        </form>
                      </div>
                    </div>  
                  </div>
                </div>

              </div>
            </div>
          </div>

        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- end panel-body -->
</div>
<!-- end panel -->
</div>
<!-- end col-10 -->
</div>
  
              <!--Model Tambah--> 
              </div>
              <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Berita Eksternal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post"action="BeritaEksternal/tambah_beritaeksternal">

                        <div class="form-group">
                          <label for="NamaMedia" class="col-form-label">Nama Media:</label>
                          <input type="text" class="form-control" id="NamaMedia" name="NamaMedia" required>
                        </div>

                        <div class="form-group">
                          <label for="Judul" class="col-form-label">Judul:</label>
                          <input type="text" class="form-control" id="Judul" name="Judul" required>
                        </div>

                        <div class="form-group">
                          <label for="Link" class="col-form-label">Link:</label>
                          <input type="text" class="form-control" id="Link" name="Link" required>
                        </div>

                        <div class="form-group">
                          <label for="Tanggal" class="col-form-label">Tanggal:</label>
                          <input type="text" class="form-control" id="Tanggal" name="Tanggal" required>
                        </div>

                        <!-- <div class="form-group">
                          <label class="col-form-label">JenisBarang:</label>
                          <select name="JenisBarang" class="form-control">
                                <option value="">Pilih . . .</option>
                                <option value="Baru">Baru</option>
                                <option value="Peremajaan">Peremajaan</option>
                          </select>
                        </div>         -->

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>     
                      
                      </form>
                    </div>
      
      </div>
    </div>
  </div>
</div>
