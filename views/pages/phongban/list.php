<section class="p-phongban">
  <table border="1" align="center">
    <tr>
      <th>Ma Phong Ban</th>
      <th>Ten Phong Ban</th>
      <th>Thoi Gian Thanh Lap</th>
      <th>Xem Nhan Vien Phong Ban</th>
    </tr>

    <?php foreach ($this->data as $key => $item) { ?>
      <tr>
        <td><?php echo $item["idpb"] ?></td>
        <td><?php echo $item["mota"] ?></td>
        <td><?php echo $item["thoigian"] ?></td>
        <td><a href="/?route=nhanvien/index&idpb=<?php echo $item["idpb"] ?>">XEM</a></td>
      </tr>
    <?php } ?>
  </table>
</section>