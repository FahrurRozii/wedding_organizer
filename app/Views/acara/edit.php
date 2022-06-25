<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Update Data Acara &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
              <div class="section-header-back">
                  <a href="<?= site_url(
                    'acara'
                  ) ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Update Acara</h1>
          </div>
          <div class="section-body">
            <div class="card">
                  <div class="card-header">
                      <h4>Update Data Acara</h4>
                  </div>
                  <div class="card-body p-0">
                      <?php $validation = \Config\Services::validation(); ?>
                      <form action="<?= site_url(
                        'acara/' . $acara->id_acara
                      ) ?>" method="post" autocomplete="off" >
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                                <div class="card-body col-md-6">
                                    <div class="form-group">
                                        <label>Nama Acara</label>
                                        <input type="text" name="name_acara" class="form-control <?= $validation->hasError(
                                          'name_acara'
                                        )
                                          ? 'is-invalid'
                                          : null ?>" 
                                        value="<?= old('name_acara', $acara->name_acara) ?>" 
                                         autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('name_acara') ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Acara</label>
                                        <input type="date" name="date_acara" class="form-control <?= $validation->hasError(
                                          'date_acara'
                                        )
                                          ? 'is-invalid'
                                          : null ?>" 
                                        value="<?= old('date_acara', $acara->date_acara) ?>" 
                                         >
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('date_acara') ?>
                                    </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Info</label>
                                        <textarea class="form-control" name="info_acara"><?= $acara->info_acara ?></textarea>
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
