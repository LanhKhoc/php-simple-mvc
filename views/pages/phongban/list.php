<section class="mt-4">
  <div class="container">
    <div class="mb-3 row">
      <div class="col-md-6">
        <?php if($this->data['user_logged']) { ?>
          <a href="<?php echo vendor_url_util::makeURL(['action' => 'create']) ?>" class="btn btn-secondary" title="Thêm phòng ban">
            <span class="mr-1">Thêm</span>
            <i class="fas fa-user-plus"></i>
          </a>
        <?php } ?>
      </div>

      <div class="col-md-6">
        <form
          action="<?php vendor_url_util::makeURL(['controller' => 'phongban', 'action' => 'search']) ?>"
          method="GET"
          class="form-inline float-right js-phongban-search"
        >
          <select name="type" class="form-control mr-2">
            <option value="idpb">Mã phòng ban</option>
            <option value="mota">Tên phòng ban</option>
            <option value="thoigian">Thời gian thành lập</option>
          </select>

          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search" />
            <button type="submit" class="input-group-addon u-cur-pointer"><i class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>

    <table border="1" align="center" class="table table-striped table-bordered table-hover js-phongban-table">
      <thead>
        <tr>
          <th>Mã phòng ban</th>
          <th>Tên phòng ban</th>
          <th>Thời gian thành lập</th>
          <th>Hành động</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($this->data['data'] as $key => $item) { ?>
          <tr>
            <td><?= $item["idpb"] ?></td>
            <td><?= $item["mota"] ?></td>
            <td><?= $item["thoigian"] ?></td>
            <td align="center">
              <a href="<?php echo vendor_url_util::makeURL([
                'controller' => 'nhanvien',
                'params' => ['idpb' => $item['idpb']]
              ]) ?>" class="ml-3" title="Xem nhân viên">
                <i class="fas fa-eye"></i>
              </a>

              <?php if($this->data['user_logged'] === true) { ?>
                <a href="<?php echo vendor_url_util::makeURL([
                'controller' => 'phongban',
                'action' => 'edit',
                'params' => ['idpb' => $item['idpb']]
              ]) ?>" class="ml-3" title="Chỉnh sửa">
                  <i class="fas fa-edit"></i>
                </a>

                <a href="<?php echo vendor_url_util::makeURL([
                'controller' => 'phongban',
                'action' => 'destroy',
                'params' => ['idpb' => $item['idpb']]
              ]) ?>" class="ml-3 js-destroy" title="Xóa">
                  <i class="fas fa-trash-alt"></i>
                </a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>