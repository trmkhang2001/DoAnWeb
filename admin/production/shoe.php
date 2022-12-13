<?php
    require_once("../../backend/filterAdmin.php");
    require_once("../../repository/shoeRepository.php");
    require_once("../../repository/categoryRepository.php");
    $shoeRepository = new ShoeRepository();
    $categoryRepository = new CategoryRepository();
    include_once("header.php");
?>
        <div class="right_col" role="main">
        <a class="btn btn-primary" href="addShoe.php" role="button">Thêm Giày</a>
          <table id="tableShoe">
            <tr>
              <th class="text-center" style="min-width:50px">STT</th>
              <th class="text-center" style="min-width:50px">ID</th>
              <th class="text-center" style="min-width:150px">Tên Giày</th>
              <th class="text-center" style="min-width:150px">Giá Giày</th>
              <th class="text-center" style="min-width:50px">Giảm Giá</th>
              <th class="text-center" style="min-width:100px">Kích Cỡ</th>
              <th class="text-center" style="min-width:100px">Màu</th>
              <th class="text-center" style="min-width:100px">Thể Loại</th>
              <th class="text-center" style="min-width:200px">Giới Thiệu</th>
              <th class="text-center" style="min-width:100px"> </th>
              <th class="text-center" style="min-width:100px"> </th>
            </tr>
            <?php
                  $listShoe = $shoeRepository->getAll(null);
                  $i=1;
                  foreach($listShoe as $shoe){
              ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $shoe['shoe_id']?></td>
                <td><?php echo $shoe['shoe_name']?></td>
                <td><?php echo $shoe['price']." VND"?></td>
                <td><?php echo $shoe['sale']."%"?></td>
                <td><?php echo $shoe['size']?></td>
                <td><?php echo $shoe['color']?></td>
                <td><?php echo $shoe['name']?></td>
                <td><?php echo $shoe['review']?></td>
                <td><a class="btn btn-warning" href="updateShoe.php?id=<?php echo $shoe['shoe_id']?>" role="button">Sửa</a></td>
                <td><a class="btn btn-danger" href="deleteShoe.php?id=<?php echo $shoe['shoe_id']?>" role="button" onclick="return confirm('Bạn có muốn xóa không?');">Xóa</a></td>
            </tr>
            <?php
                  }
            ?>
        </table>
        </div>
<?php
include_once("footer.php");
?>