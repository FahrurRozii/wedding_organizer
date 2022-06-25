<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Tambah Group &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
              <div class="section-header-back">
                  <a href="<?= site_url(
                    'Groups'
                  ) ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah Group</h1>
          </div>
          <div class="section-body">
            <div class="card">
                  <div class="card-header">
                      <h4>Tambah Group Kontak</h4>
                  </div>
                  <div class="card-body p-0">
                    <?php $validation = \Config\Services::validation(); ?>
                      <form action="<?= site_url('groups') ?>" method="post" autocomplete="off" >
                        <?= csrf_field() ?>
                                <div class="card-body col-md-6">
                                    <div class="form-group">
                                        <label>Nama Group</label>
                                        <input type="text" name="name_group" class="form-control <?= $validation->hasError(
                                          'name_group'
                                        )
                                          ? 'is-invalid'
                                          : null ?>" 
                                        value="<?= old('name_group') ?>" autofocus>
                                        <div class="invalid-feedback">
                                        <?= $validation->getError('name_group') ?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Info</label>
                                        <textarea name="info_group" class="form-control"></textarea>
                                    </div>
                                    <div class="card-footer text-right ">
                                    <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
<?= $this->endSection() ?>
