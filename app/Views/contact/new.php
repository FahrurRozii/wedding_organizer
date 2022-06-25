<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Tambah Contact &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
              <div class="section-header-back">
                  <a href="<?= site_url(
                    'contacts'
                  ) ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah Contact</h1>
          </div>
          <div class="section-body">
            <div class="card">
                  <div class="card-header">
                      <h4>Tambah Contact</h4>
                  </div>
                  <div class="card-body p-0">
                      <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?= site_url('contacts') ?>" method="post" autocomplete="off" >
                        <?= csrf_field() ?>
                                <div class="card-body col-md-6">
                                    <div class="form-group">
                                        <label>Group</label>
                                        <select name="id_group" class="form-control <?= isset(
                                          $errors['id_group']
                                        )
                                          ? 'is-invalid'
                                          : null ?>">
                                            <option value="" hidden></option>
                                            <?php foreach ($groups as $key => $value): ?>
                                                <option value="<?= $value->id_group ?>" 
                                                <?= old('id_group') == $value->id_group
                                                  ? 'selected'
                                                  : null ?> >
                                                <?= $value->name_group ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                         <div class="invalid-feedback">
                                        <?= isset($errors['id_group'])
                                          ? $errors['id_group']
                                          : null ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Contact</label>
                                        <input type="text" name="name_contact" value="<?= old(
                                          'name_contact'
                                        ) ?>" class="form-control 
                                        <?= isset($errors['name_contact'])
                                          ? 'is-invalid'
                                          : null ?>" autofocus>
                                          <div class="invalid-feedback">
                                        <?= isset($errors['name_contact'])
                                          ? $errors['name_contact']
                                          : null ?>
                                    </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Alias</label>
                                        <input type="text" name="name_alias" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Info Contact</label>
                                        <textarea name="info_contact" class="form-control"></textarea>
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
