<section class="c-header">
  <div class="container clearfix">
    <div class="float-left">
      <ul class="o-navbar u-clearfix">
        <li class="o-navbar__logo">
        <a href="<?php echo vendor_url_util::makeURL(['controller' => 'phongban']) ?>" class="h2 text-info">
          <i class="fab fa-angellist"></i>
        </a>
        </li>
        <li class="o-navbar__item <?php if(isset($this->data['phongban'])) echo 'o-navbar__item--active'; ?>">
          <a href="<?php echo vendor_url_util::makeURL(['controller' => 'phongban']) ?>">Quản lý phòng ban</a>
        </li>
        <li class="o-navbar__item <?php if(isset($this->data['nhanvien'])) echo 'o-navbar__item--active'; ?>">
          <a href="<?php echo vendor_url_util::makeURL(['controller' => 'nhanvien']) ?>">Quản lý nhân viên</a>
        </li>
      </ul>
    </div>

    <div class="float-right">
      <?php if($this->data['user_logged'] === true) { ?>
        <span class="text-warning mr-3">Hello, <strong><?php echo $_COOKIE["user_info"] ?></strong></span>
        <a href="<?php echo vendor_url_util::makeURL(['controller' => 'logout']) ?>" class="btn btn-danger">Logout</a>
      <?php } else { ?>
        <a href="<?php echo vendor_url_util::makeURL(['controller' => 'login']) ?>" class="btn btn-success">Login</a>
        <a href="<?php echo vendor_url_util::makeURL(['controller' => 'register']) ?>" class="btn btn-primary">Register</a>
      <?php } ?>
    </div>
  </div>
</section>