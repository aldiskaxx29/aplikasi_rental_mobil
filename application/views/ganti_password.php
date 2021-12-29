<?php  ?>
<?php  ?>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/assets_admin') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Ganti Password</h4></div>

              <div class="card-body">
              	<?= $this->session->flashdata('login'); ?>
                <form method="POST" action="">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <?php if (form_error('password1')): ?>
                    		<input id="password" type="password" class="form-control is-invalid" name="password1" tabindex="1"  autofocus>
                    	<?php else: ?>
                    		<input id="password" type="password" class="form-control" name="password1" tabindex="1"  autofocus>
                    <?php endif ?>
                    <?= form_error('password1','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">Konfirmasi Password</label>
                    <?php if (form_error('password2')): ?>
                    		<input id="password" type="password" class="form-control is-invalid" name="password2" tabindex="2" >
                    	<?php else: ?>
                    		<input id="password" type="password" class="form-control" name="password2" tabindex="2" >
                    <?php endif ?>
                    <?= form_error('password1','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Save
                    </button>
                  </div>

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
