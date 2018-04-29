<section>
  <div class="container">
    <form action="<?php echo vendor_url_util::makeURL(['action' => 'store']) ?>" method="POST" class="form mt-5">
      <div class="form-group row">
        <label for="example-text-input" class="offset-2 col-2 col-form-label text-center">Mã phòng ban</label>
        <div class="col-6">
          <input class="form-control" type="text" name="idpb" />
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="offset-2 col-2 col-form-label text-center">Tên phòng ban</label>
        <div class="col-6">
          <input class="form-control" type="text" name="mota" />
        </div>
      </div>
      <div class="form-group row text-center">
        <input type="submit" value="Save" name="submit" class="btn btn-primary" />
      </div>
    </form>
  </div>
</section>