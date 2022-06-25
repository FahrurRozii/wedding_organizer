<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Data Group &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
            <h1>Group</h1>
            <div class="section-header-button">
              <a href="<?= site_url('groups') ?>" class="btn btn-secondary">Back</a>
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
                      <h4>Data Group Kontak - Trash</h4>
                      <div class="card-header-action">
                        <a href="<?= site_url(
                          'groups/restore'
                        ) ?>" class="btn btn-info">Restore All</a>
                         <form action="<?= site_url(
                           'groups/deleted/'
                         ) ?>" method="post" class="d-inline" id="delAll-1">
                            <?= csrf_field() ?> 
                            <button class="btn btn-danger btn-sm" data-confirm="Hapus semua Data ? |Apakah Anda yakin hapus semua data ?" data-confirm-yes="submitDelAll(1)">Delete All</button>
                          </form>
                      </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody><tr>
                          <th>No</th>
                          <th>Nama Group</th>
                          <th>Info</th>
                          <th class="text-center">Action</th>
                        </tr>
                        <?php foreach ($groups as $key => $value): ?>
                        <tr>
                          <td><?= $key + 1 ?></td>
                          <td><?= $value->name_group ?></td>
                          <td><?= $value->info_group ?></td>
                          <td class="text-center" style="width:15%">
                            <a href="<?= site_url(
                              'groups/restore/' . $value->id_group
                            ) ?>" class="btn btn-info btn-sm">Restore</a>
                            <form action="<?= site_url(
                              'groups/deleted/' . $value->id_group
                            ) ?>" method="post" class="d-inline" id="del-<?= $value->id_group ?>">
                            <?= csrf_field() ?> 
                            <button class="btn btn-danger btn-sm" data-confirm="Hapus Data permanent? |Apakah Anda yakin hapus data permanent ?" data-confirm-yes="submitDel(<?= $value->id_group ?>)">Delete Permanently</button>
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
