<?php
  require_once("backend/authWithCookie.php");
  require_once("backend/auth.php");
  require_once("repository/cartRepository.php");
  require_once("repository/shoeRepository.php");

  $cartRepository = new CartRepository();
  $shoeRepository = new ShoeRepository();

  $infoUser = Auth::loginWithCookie();
  $cartList = $cartList = $cartRepository->findByUserIdAndStatus($infoUser['id'],1);
  include_once("header.php");

?>
    <main class="ps-main">
      <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
            <form method="post">
            <table class="table ps-cart__table">
              <thead>
                <tr>
                <th>Tất cả sản phẩm</th>
                  <th>Giá<th>
                  <th>Giảm giá<th>
                  <th>Size<th>
                  <th>Màu<th>
                  <!-- <th>Quantity</th> -->
                  <th>Tổng</th>
                </tr>
              </thead>
              <tbody>
                <input id="cartSize" style="display: none;" value="<?php echo $cartList->num_rows ?>" type="number">
                <?php
                  $count = 0;
                  foreach($cartList as $cart){
                    $shoe = $shoeRepository->getById($cart['shoe_id'])->fetch_assoc();
                    $arrLinkImage = $shoeRepository->getImage($shoe['shoe_id']);
                    if($arrLinkImage->num_rows > 0){
                        $shoe_image= $arrLinkImage->fetch_assoc()['link_image'];
                    }
                    else{
                        $shoe_image= "images/product/cart-preview/1.jpg";
                    }
                ?>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail.php?id=<?php echo $cart['shoe_id'] ?>"><img width="100" class="mr-15" src="<?php echo $shoe_image ?>" alt=""> <?php echo $shoe['shoe_name'] ?></a></td>
                  <td><span><?php echo $shoe['price'] ?></span> VND</td>
                  <td> </td>
                  <td><span id="price<?php echo $count ?>"><?php echo $shoe['price'] - $shoe['price']*$shoe['sale']*0.01 ?></span> VND <span><?php echo "(-".$shoe['sale']."%) "; ?></span></td>
                  <td> </td>
                  <td><span><?php echo $cart['shoe_size'] ?></span></td>
                  <td> </td>
                  <td><span><?php echo $cart['shoe_color'] ?></span></td>
                  <td> </td>
                  <td><span id="total<?php echo $count ?>"><?php echo $shoe['price'] - $shoe['price']*$shoe['sale']*0.01 ?></span> VND</td>
                  <td>
                    <a href="deleteCart.php?userId=<?php echo $infoUser['id'] ?>&shoeId=<?php echo $shoe['shoe_id'] ?>"><div class="ps-remove"></div></a>
                  </td>
                </tr>
                <?php
                    $count++;
                  }
                ?>
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__promotion">
              </div>
              <div class="ps-cart__total">
                <h3>Tổng phải trả : <span id="totalPrice"></span></h3>
                <a href="checkout.php" class="ps-btn">Thanh toán<i class="ps-icon-next"></i></a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
    <script>
      function eventMinus(i){
        var price = document.getElementById("price"+i.toString()).innerText;
        // var quantity = document.getElementById("quantity"+i.toString());
        if(parseInt(quantity.value)>1){
          quantity.value = parseInt(quantity.value)-1;
          // document.getElementById("total"+i.toString()).innerText = parseFloat(price)*parseInt(quantity.value);
          document.getElementById("total"+i.toString()).innerText = parseFloat(price);
          totalPrice();
        }


      }
      function plusMinus(i){
        var price = document.getElementById("price"+i.toString()).innerText;
        // var quantity = document.getElementById("quantity"+i.toString());
        if(parseInt(quantity.value)<100){
          quantity.value = parseInt(quantity.value)+1;
          // document.getElementById("total"+i.toString()).innerText = parseFloat(price)*parseInt(quantity.value);
          document.getElementById("total"+i.toString()).innerText = parseFloat(price);
          totalPrice();
        }

      }
      function totalPrice(){
        var cartSize = document.getElementById("cartSize").value;
        var sum = 0;
        for(var i=0;i<cartSize;i++){
          var price = document.getElementById("total"+i.toString()).innerText;
          sum+= parseInt(price);
        }
        document.getElementById("totalPrice").innerText = sum+" VND";
      }


      function calculator(i){
        document.getElementById("minus"+i.toString()).onclick = ()=>{
          eventMinus(i);
        }
        document.getElementById("plus"+i.toString()).onclick = ()=>{
          plusMinus(i);
        }
      }

      // var cartSize = document.getElementById("cartSize").value;
      // for(var i=0;i<cartSize;i++){
      //   calculator(i);
      // }

      totalPrice();

    </script>
<?php
include_once("footer.php");
?>