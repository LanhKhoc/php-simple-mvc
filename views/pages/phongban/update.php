<section>
  <div class="container">
    <form action="<?php echo vendor_url_util::makeURL(['action' => 'update']) ?>" method="POST" class="form mt-5">
      <input type="hidden" name="old_idpb" value="<?= $this->data['remember']['idpb'] ?>" />

      <div class="form-group row">
        <label for="example-text-input" class="offset-2 col-2 col-form-label text-center">Mã phòng ban</label>
        <div class="col-6">
          <input class="form-control" type="text" name="idpb" value="<?php echo $this->data['remember']['idpb'] ?>" required />
          <div class="form-text text-danger"><?php echo $this->data['error']['idpb'] ?></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="offset-2 col-2 col-form-label text-center">Tên phòng ban</label>
        <div class="col-6">
          <input class="form-control" type="text" name="mota" value="<?php echo $this->data['remember']['mota'] ?>" required />
          <div class="form-text text-danger"><?php echo $this->data['error']['mota'] ?></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="offset-2 col-2 col-form-label text-center">Thời gian thành lập</label>
        <div class="col-6">
          <input class="form-control" type="date" name="thoigian" value="<?php if ($this->data['remember']['thoigian'] != '') { echo $this->data['remember']['thoigian']; } else echo date('Y-m-d'); ?>" required
          />
          <div class="form-text text-danger"><?php echo $this->data['error']['thoigian'] ?></div>
        </div>
      </div>
      <div class="form-group row text-center">
        <div class="offset-4 col-6">
          <input type="submit" value="Save" name="submit" class="btn btn-primary u-cur-pointer" />
          <input type="reset" value="Reset" class="btn btn-danger u-cur-pointer" />
          <a href="<?php echo vendor_url_util::makeURL(['action' => 'index']); ?>" class="btn btn-success">Back To Home</a>
        </div>
      </div>
    </form>
  </div>
</section>