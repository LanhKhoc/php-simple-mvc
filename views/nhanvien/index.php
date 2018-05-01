<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
?>

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
          action="<?php vendor_url_util::makeURL(['action' => 'search']) ?>"
          method="GET"
          class="form-inline float-right js-phongban-search"
        >
          <select name="type" class="form-control mr-2">
            <option value="idnv">Mã nhân viên</option>
            <option value="hoten">Họ tên</option>
            <option value="diachi">Địa chỉ</option>
          </select>

          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search" />
            <button type="submit" class="input-group-addon u-cur-pointer"><i class="fas fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>

    <table border="1" align="center" class="table table-striped table-bordered table-hover">
      <tr>
        <th>Mã nhân viên</th>
        <th>Họ tên</th>
        <th>IDPB</th>
        <th>Địa chỉ</th>
        <th>Hành động</th>
      </tr>

      <?php foreach ($this->data['data'] as $key => $item) { ?>
        <tr>
          <td><?php echo $item["idnv"] ?></td>
          <td><?php echo $item["hoten"] ?></td>
          <td><?php echo $item["idpb"] ?></td>
          <td><?php echo $item["diachi"] ?></td>
          <td align="center">
            <?php if($this->data['user_logged'] === true) { ?>
              <a href="<?php echo vendor_url_util::makeURL([
                'controller' => 'nhanvien',
                'action' => 'edit',
                'params' => ['idnv' => $item['idnv']]
              ]) ?>" class="text-right ml-3" title="Chỉnh sửa">
                <i class="fas fa-edit"></i>
              </a>
              <a href="<?php echo vendor_url_util::makeURL([
                'controller' => 'nhanvien',
                'action' => 'delete',
                'params' => ['idnv' => $item['idnv']]
              ]) ?>" class="text-right ml-3" title="Xóa">
                <i class="fas fa-trash-alt"></i>
              </a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</section>

<?php include_once("views/layouts/foot.php"); ?>