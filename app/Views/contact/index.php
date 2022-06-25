<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Data Contacts &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
            <h1>Contacts</h1>
            <div class="section-header-button">
              <a href="<?= site_url('/contacts/new') ?>" class="btn btn-primary">Add New</a>
            </div>
          </div>
          <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">x</button>
              <b>Succes</b>
                <?= session()->getFlashdata('success') ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">x</button>
              <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
          </div>
          <?php endif; ?>
          <div class="section-body">
            <div class="card">
                  <div class="card-header">
                      <h4>Data Kontak Saya</h4>
                  </div>
                  <div class="card-header">
                    <form action="" method="get" autocomplate="off">
                      <div class="float-left">
                        <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control" style="width:155pt;" placeholder="keyword pencarian">
                      </div>
                      <div class="float-right ml-2">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        <?php
                        $request = \Config\Services::request();
                        $keyword = $request->getGet('keyword');
                        if ($keyword != '') {
                          $param = '?keyword=' . $keyword;
                        } else {
                          $param = '';
                        }
                        ?>
                        <a href="<?= site_url(
                          'contacts/export' . $param
                        ) ?>" class="btn btn-primary">
                          <i class="fas fa-download"></i>
                          Export Excel
                        </a>
                            <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-togle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-file-upload"></i><div class="Import Excel">
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="<?=base_url('contacts-example-import.xlsx')?>">
                                  <i class="fas fa-file-excel"></i> Download example
                                </a>
                                  <a class="dropdown-item has-icon" href="" data-toggle="modal" data-target="#modal-import-contact">
                                    <i class="fas fa-file-import"></i> Upload File Excel
                                </a>
                              </div>
                            </div>
                  <div class="modal fade" tabindex="-1" role="dialog" id="modal-import-contact">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Import Contact</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?site_url('contacts/import')?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <label>File Excel</label>
                          <div class="custom-file">
                          <?=csrf_field() ?>
                            <input type="file" name="file_excel" class="custom-file-input" accept=".xls, .xlsx" id="file_excel" required>
                            <label for="file_excel" class="custom-file-label"><i>Pilih File</i></label>

                          </div>
                        </div>
                        <div class="modal-foother bg-whitesmoke br">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                      </div>
                    </form>
                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                          <th>No</th>
                          <th>Nama Kontak</th>
                          <th>Alias</th>
                          <th>Telepon</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Info</th>
                          <th>Group</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + 10 * ($page - 1);
                        foreach ($contacts as $key => $value): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $value->name_contact ?></td>
                          <td><?= $value->name_alias ?></td>
                          <td><?= $value->phone ?></td>
                          <td><?= $value->email ?></td>
                          <td><?= $value->address ?></td>
                          <td><?= $value->info_contact ?></td>
                          <td><?= $value->name_group ?></td>
                          <td class="text-center" style="width:15%">
                            <a href="<?= site_url(
                              'contacts/' . $value->id_contact . '/edit'
                            ) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                            <form action="<?= site_url(
                              'contacts/' . $value->id_contact
                            ) ?>" method="post" class="d-inline" id="del-<?= $value->id_contact ?>">
                            <?= csrf_field() ?> 
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data ? |Apakah Anda yakin ?" data-confirm-yes="submitDel(<?= $value->id_contact ?>)">
                              <i class="fas fa-trash "></i>
                            </button>
                          </form>
                          </td>
                        </tr>
                        <?php endforeach;
                        ?>
                      </tbody>
                    </table>
                    <div class="float-left">
                      <i>Showing <?= 1 + 10 * ($page - 1) ?> to <?= $no - 1 ?> of 
                      <?= $pager->getTotal() ?> entries</i>
                    </div>
                    <div class="float-right">
                      <?= $pager->links('default', 'pagination') ?>                    
                    </div>
                  </div>
                </div>
          </div>
          <div class="BottomNavigation_bottomNav__3b511 "><div class="BottomNavigation_bottomNav_inner__m_w6b"><div class="BottomNavigation_bottomNav_item__n5DFX"><div class="BottomNavigation_bottomNav_icon__1kDGm BottomNavigation_bottomNav_icon__swap__2M8ob"><img src="/icons/icon-home.svg" alt="icon-home"><img src="/icons/icon-home-fill.svg" alt="icon-home"></div><div class="BottomNavigation_bottomNav_label__3rZZF"><span>Beranda</span></div></div><div class="BottomNavigation_bottomNav_item__n5DFX"><div class="BottomNavigation_bottomNav_icon__1kDGm"><img src="/icons/icon-search.svg" alt="icon-search"></div><div class="BottomNavigation_bottomNav_label__3rZZF"><span>Cari</span></div></div><div class="BottomNavigation_bottomNav_item__n5DFX"><div class="BottomNavigation_bottomNav_icon__1kDGm BottomNavigation_bottomNav_icon__swap__2M8ob"><img src="/icons/icon-categories.svg" alt="icon-categories"><img src="/icons/icon-categories-fill.svg" alt="icon-categories"></div><div class="BottomNavigation_bottomNav_label__3rZZF"><span>Kategori</span></div></div><div class="BottomNavigation_bottomNav_item__n5DFX"><div class="Announcements_headerAnnouncements__2lO4D"><div class="Announcements_headerAnnouncements_item__19tdN">Dapatkan voucher senilai Rp 50.000 untuk pendaftar baru</div></div><div class="BottomNavigation_bottomNav_icon__1kDGm BottomNavigation_bottomNav_icon__swap__2M8ob"><img src="/icons/icon-user.svg" alt="icon-user"><img src="/icons/icon-user-fill.svg" alt="icon-user"></div><div class="BottomNavigation_bottomNav_label__3rZZF"><span>Akun Saya</span></div></div></div></div>
        </section>
<?= $this->endSection() ?>
