<section class="c-log-reg">
  <div class="container">
    <div class="c-log-reg__form-center">

      <form action="<?php echo vendor_url_util::makeURL(['controller' => 'login', 'action' => 'check']) ?>" method="POST" class="form w-100">
        <?php if($this->error != '') { ?>
          <div class="offset-xl-3 col-xl-6 p-0">
            <div class="alert alert-danger">
              <strong>Danger: </strong>
              <?php echo $this->error; ?>
            </div>
          </div>
        <?php } ?>

        <div class ="form-group row">
          <label class="offset-xl-3 col-xl-2 text-center text-white">Username</label>
          <div class="col-xl-4">
            <input type="text" class="form-control" name="username" />
          </div>
        </div>
        <div class ="form-group row">
          <label class="offset-xl-3 col-xl-2 text-center text-white">Password</label>
          <div class="col-xl-4">
            <input type="password" class="form-control" name="password" />
          </div>
        </div>
        <div class ="form-group row">
          <div class="offset-xl-5 col-xl-4 text-center">
            <button type="submit" class="btn btn-primary u-cur-pointer">Login</button>
            <a href="<?php echo vendor_url_util::makeURL(['controller' => 'register']) ?>" class="btn btn-success">Register</a>
            <a href="<?php echo vendor_url_util::makeURL(['controller' => 'phongban']) ?>" class="btn btn-info">Go To Home</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>