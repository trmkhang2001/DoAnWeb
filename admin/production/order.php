<?php
    require_once("../../backend/filterAdmin.php");
    require_once("../../repository/orderRepository.php");

    $orderRepository = new OrderRepository();

    $orderList = $orderRepository->getAll();
    include_once("header.php");
?>
        <div class="right_col" role="main">
          <table id="tableShoe">
            <tr>
              <th class="text-center" style="min-width:50px">STT</th>
              <th class="text-center" style="min-width:150px">Tên Khách Hàng</th>
              <th class="text-center" style="min-width:150px">Địa Chỉ</th>
              <th class="text-center" style="min-width:150px">Tên Giày</th>
              <th class="text-center" style="min-width:50px">Giá Giày</th>
              <th class="text-center" style="min-width:100px">Kích Cỡ</th>
              <th class="text-center" style="min-width:100px">Màu</th>
              <th class="text-center" style="min-width:100px">Ngày Đặt Hàng</th>
              <th class="text-center" style="min-width:100px"> </th>
              <th class="text-center" style="min-width:100px"> </th>
            </tr>
            <?php
                  $i=1;
                  foreach($orderList as $order){
              ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $order['fullname']?></td>
                <td><?php echo $order['address']?></td>
                <td><?php echo $order['name']?></td>
                <td><?php echo ($order['price'] - $order['price']*$order['sale']*0.01)." VND" ?></td>
                <td><?php echo $order['shoe_size']?></td>
                <td><?php echo $order['shoe_color']?></td>
                <td><?php echo $order['date']?></td>
                <td><?php
                    if($order['status'] == 2){
                 ?>
                 <a class="btn btn-warning" href="acceptOrder.php?id=<?php echo $order['cart_id']?>" role="button">Duyệt Đơn</a>
                 <?php
                    }
                ?>
                <?php
                    if($order['status'] == 3){
                 ?>
                 <a class="btn btn-success" href="#" role="button">Đã Duyệt</a>
                 <?php
                    }
                ?>
                 </td>
                <td>
                <?php
                    if($order['status'] == 2){
                 ?>
                  <a class="btn btn-danger" href="deleteOrder.php?id=<?php echo $order['order_id']?>" role="button" onclick="return confirm('Bạn có muốn hủy đơn không?');">Hủy Đơn</a></td>
                 <?php
                    }
                ?>

            </tr>
            <?php
                  }
            ?>
        </table>
        </div>
<?php
include_once("footer.php");
?>