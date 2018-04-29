<section class="mt-4">
  <div class="container">
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