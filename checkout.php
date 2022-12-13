<?php

  require_once("backend/authWithCookie.php");
  require_once("backend/auth.php");
  require_once("repository/cartRepository.php");
  require_once("repository/shoeRepository.php");
  require_once("repository/orderRepository.php");
  $cartRepository = new CartRepository();
  $shoeRepository = new ShoeRepository();
  $orderRepository = new OrderRepository();

  $infoUser = Auth::loginWithCookie();

  include_once("header.php");
?>
    <main class="ps-main">
      <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <form class="ps-checkout__form" action="" method="post">
            <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Chi tiết hóa đơn</h3>
                            <div class="form-group form-group--inline">
                              <label>Họ tên người nhận:<span>*</span>
                              </label>
                              <input readonly value="<?php echo $infoUser['fullname'] ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Email: <span>*</span>
                              </label>
                              <input readonly value="<?php echo $infoUser['email'] ?>" class="form-control" type="email">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Số điện thoại: <span>*</span>
                              </label>
                              <input readonly value="<?php echo $infoUser['phone'] ?>" class="form-control" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Địa chỉ nhận hàng<span>*</span>
                              </label>
                              <input readonly value="<?php echo $infoUser['address'] ?>" class="form-control" type="text">
                            </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>Hóa đơn của bạn</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Sản phẩm</th>
                              <th class="text-uppercase">Tổng</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $cartList = $cartRepository->findByUserIdAndStatus($infoUser['id'],1);
                              foreach($cartList as $cart){
                                $shoe = $shoeRepository->getById($cart['shoe_id'])->fetch_assoc();
                            ?>
                            <tr>
                              <td><?php echo $shoe['shoe_name'] ?></td>
                              <td><?php echo $shoe['price'] - $shoe['price']*$shoe['sale']*0.01 ?></td>
                            </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>

                      <footer>
                        <h3>Phương thức thanh toán</h3>
                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" id="rdo01" name="payment" checked>
                            <label for="rdo01">Thanh toán khi nhận hàng</label>
                            <p>Bạn được kiểm tra hàng trước khi thanh toán.</p>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02">
                            <label for="rdo02">Paypal</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                          </ul>
                            <button name="submit_payment" class="ps-btn ps-btn--fullwidth">Thanh toán hóa đơn<i class="ps-icon-next"></i></button>
                          <?php
                            if(isset($_POST['submit_payment'])){
                              foreach($cartList as $cart){
                                $shoe = $shoeRepository->getById($cart['shoe_id'])->fetch_assoc();
                                $orderRepository->insert($cart['id']);
                                $cartRepository->updateStatusByUserIdAndShoeId($infoUser['id'],$shoe['shoe_id'],2);
                              }
                              echo "<script>alert('Đặt hàng thành công');
                                window.location.href='index.php';
                                </script>";
                            }
                          ?>
                        </div>
                      </footer>
                    </div>
                    <div class="ps-shipping">
                      <h3>MIỄN PHÍ VẬN CHUYỂN</h3>
                      <p>ĐƠN HÀNG CỦA BẠN ĐỦ ĐIỀU KIỆN ĐỂ ĐƯỢC MIỄN PHÍ VẬN CHUYỂN<br> <a href="#"> ĐĂNG NHẬP </a> ĐỂ ĐƯỢC MIỄN PHÍ VẬN CHUYỂN TRÊN MỌI ĐƠN HÀNG</p>
                    </div>
                  </div>
            </div>
          </form>
        </div>
      </div>
<?php
 include_once("footer.php");
?>