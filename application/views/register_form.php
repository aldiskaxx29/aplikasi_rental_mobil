<?php  ?>

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('assets/assets_admin/') ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form action="" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Name</label>
                      <?php if (form_error('nama')): ?>
                          <input id="nama" type="text" class="form-control is-invalid" name="nama">
                        <?php else: ?>
                          <input id="nama" type="text" class="form-control" name="nama" autofocus value="<?= set_value('nama'); ?>">
                      <?php endif ?>
                      <?= form_error('nama','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <?php if (form_error('email')): ?>
                          <input id="email" type="email" class="form-control is-invalid" name="email">
                        <?php else: ?>
                          <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>"selected>
                      <?php endif ?>
                      <?= form_error('email','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <?php if (form_error('alamat')): ?>
                        <input id="alamat" type="text" class="form-control is-invalid" name="alamat">
                      <?php else: ?>
                        <input id="alamat" type="text" class="form-control" name="alamat" value="<?= set_value('alamat'); ?>">
                    <?php endif ?>
                    <?= form_error('alamat','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option value=" ">-- Pilihan --</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                      </select>
                       <?= form_error('gender','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="tlp">No Telepon</label>
                      <?php if (form_error('tlp')): ?>
                          <input id="tlp" type="text" name="tlp" class="form-control is-invalid">
                        <?php else: ?>
                          <input id="tlp" type="text" name="tlp" class="form-control" value="<?= set_value('tlp'); ?>">
                      <?php endif ?>
                      <?= form_error('tlp','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="ktp">No KTP</label>
                    <?php if (form_error('ktp')): ?>
                        <input id="ktp" type="text" name="ktp" class="form-control is-invalid">
                      <?php else: ?>
                        <input id="ktp" type="text" name="ktp" class="form-control" value="<?= set_value('ktp'); ?>">
                    <?php endif ?>
                    <?= form_error('ktp','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <?php if (form_error('password1')): ?>
                          <input id="password" type="password" class="form-control is-invalid" name="password1">
                        <?php else: ?>
                          <input id="password" type="password" class="form-control" name="password1">
                      <?php endif ?>
                      <?= form_error('password1','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <?php if (form_error('password2')): ?>
                          <input id="password2" type="password" class="form-control is-invalid" name="password2">
                        <?php else: ?>
                          <input id="password2" type="password" class="form-control" name="password2">
                      <?php endif ?>
                      <?= form_error('password2','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>