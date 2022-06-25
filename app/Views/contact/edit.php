<?= $this->extend('/layout/default') ?>
<?= $this->section('title') ?> 
<title>Update Contact &mdash; Yuk Nikah</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?> 
<section class="section">
          <div class="section-header">
              <div class="section-header-back">
                  <a href="<?= site_url(
                    'contacts'
                  ) ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Update Contact</h1>
          </div>
          <div class="section-body">
            <div class="card">
                  <div class="card-header">
                      <h4>Update Kontak</h4>
                  </div>
                  <div class="card-body p-0">
                      <?php $errors = session()->getFlashdata('errors'); ?>
                      <form action="<?= site_url(
                        'contacts/' . $contact->id_contact
                      ) ?>" method="post" autocomplete="off" >
                        <?= csrf_field() ?>
                         <input type="hidden" name="_method" value="PUT">
                                <div class="card-body col-md-6">
                                    <div class="form-group">
                                        <label>Group</label>
                                        <select name="id_group" class="form-control <?= isset(
                                          $errors['id_group']
                                        )
                                          ? 'is-invalid'
                                          : null ?>" >
                                            <option value="" hidden></option>
                                            <?php foreach ($groups as $key => $value): ?>
                                                <option 
                                                value="<?= $value->id_group ?>" 
                                                <?= old('id_group', $contact->id_group) ==
                                                $value->id_group
                                                  ? 'selected'
                                                  : null ?>><?= $value->name_group ?></option>
                                            <?php endforeach; ?>
                                            <div class="invalid-feedback">
                                        <?= isset($errors['id_group'])
                                          ? $errors['id_group']
                                          : null ?>
                                    </div>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Contact</label>
                                        <input type="text" name="name_contact" value="<?= old(
                                          'name_contact',
                                          $contact->name_contact
                                        ) ?>" class="form-control 
                                        <?= isset($errors['name_contact'])
                                          ? 'is-invalid'
                                          : null ?> " autofocus>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['name_contact'])
                                          ? $errors['name_contact']
                                          : null ?>
                                    </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Alias</label>
                                        <input type="text" name="name_alias" value="<?= $contact->name_alias ?>" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $contact->phone ?>" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?= $contact->email ?>" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Address</label>
                                        <input type="text" name="address" value="<?= $contact->address ?>" class="form-control"></input>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Info Contact</label>
                                        <textarea name="info_contact" class="form-control"><?= $contact->info_contact ?></textarea>
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
