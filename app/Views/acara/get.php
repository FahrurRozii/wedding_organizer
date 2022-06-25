<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Data Acara &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
            <h1>Acara</h1>
            <div class="section-header-button">
              <a href="<?= site_url('/acara/add') ?>" class="btn btn-primary">Add New</a>
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
                      <h4>Data Acara</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="table1">
                        <thead>
                          <tr>
                          <th>No</th>
                          <th>Nama Acara</th>
                          <th>Tanggal Acara</th>
                          <th>Info</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($acara as $key => $value): ?>
                        <tr>
                          <td><?= $key + 1 ?></td>
                          <td><?= $value->name_acara ?></td>
                          <td><?= date('d/m/y', strtotime($value->date_acara)) ?></td>
                          <td><?= $value->info_acara ?></td>
                          <td class="text-center" style="width:15%">
                            <a href="<?= site_url(
                              'acara/edit/' . $value->id_acara
                            ) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt "></i></a>
                            <form action="<?= site_url(
                              'acara/' . $value->id_acara
                            ) ?>" method="post" class="d-inline" id="del-<?= $value->id_acara ?>">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">  
                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data ? |Apakah Anda yakin ?" data-confirm-yes="submitDel(<?= $value->id_acara ?>)">
                              <i class="fas fa-trash "></i>
                            </button>
                          </form>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody></table>
                    </div>
                  </div>
                </div>
          </div>
        </section>
<?= $this->endSection() ?>
