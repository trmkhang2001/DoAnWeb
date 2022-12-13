<?php
  require_once("backend/auth.php");
  require_once("repository/shoeRepository.php");
  require_once("repository/cartRepository.php");

  $cartRepository = new CartRepository();
  $shoeRepository = new ShoeRepository();
  $shoe = ($shoeRepository->getById($_GET["id"]))->fetch_assoc();
  $listShoe = $shoeRepository->getAll(10);
  $arrLinkImage = $shoeRepository->getImage($_GET["id"]);


  if(isset($_POST["submit_cart"])){
    $user_id = Auth::loginWithCookie()['id'];
    if($cartRepository->findByUserIdAndShoeIdAndStatus($user_id,$_GET["id"],1)->num_rows==0)
      $cartRepository->insert($user_id,$_GET["id"],$_POST["choose_color"],$_POST["choose_size"],1);
    header("Location: cart.php");
  }
  include_once("header.php");
?>
    <main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                       <?php
                          foreach($arrLinkImage as $linkImage){
                        ?>
                          <div class="item"><img id="imageShoeMini" src="<?php echo $linkImage['link_image'] ?>" alt=""></div>
                        <?php
                          }
                        ?>
                  </div>
                </div>
                <div class="ps-product__image">
                    <?php
                      foreach($arrLinkImage as $linkImage){
                    ?>
                      <div class="item"><img id="shoeImageZoom" class="zoom" src="<?php echo $linkImage['link_image'] ?>" alt="" data-zoom-image="<?php echo $linkImage['link_image'] ?>"></div>
                    <?php
                      }
                    ?>
                </div>
              </div>
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img src="images/shoe-detail/1.jpg" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="images/shoe-detail/1.jpg" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
              </div>
              <div class="ps-product__info">
                <div class="ps-product__rating">
                  <select class="ps-rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                  </select><a href="#">(Đọc 8 đánh giá)</a>
                </div>
                <h1><?php echo $shoe['shoe_name'] ?></h1>
                <p class="ps-product__category"><a href="#"><?php echo $shoe['name'] ?></a></p>
                <h3 class="ps-product__price">
                  <?php
                    echo ($shoe['price'] - $shoe['price']*$shoe['sale']*0.01);
                  ?> VND<del><br><?php echo $shoe['price'] ?> VND</del></h3>
                <div class="ps-product__block ps-product__quickview">
                  <h4>Thông tin</h4>
                  <p><?php echo substr($shoe['review'],0,100); ?></p>
                </div>
                <form action="" method="POST">
                <div class="ps-product__block ps-product__size">
                  <h4>Chọm Màu</h4>
                  <select name="choose_color" class="ps-select selectpicker">
                  <?php
                      $arrColor = explode(",",$shoe['color']);
                      foreach($arrColor as $color){
                  ?>
                    <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="ps-product__block ps-product__size">
                  <h4>Chọn Size</h4>
                  <select name="choose_size" class="ps-select selectpicker">
                  <?php
                      $arrSize = explode(",",$shoe['size']);
                      foreach($arrSize as $size){
                  ?>
                    <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="ps-product__shopping">
                <!-- <a class="ps-btn mb-10" href="cart.php?id=">Add to cart<i class="ps-icon-next"></i></a> -->
                <button name="submit_cart" class="ps-btn mb-10">Thêm vào giỏ hàng<i class="ps-icon-next"></i></button>
                  <div class="ps-product__actions"><a class="mr-10" href="whishlist.php"><i class="ps-icon-heart"></i></a><a href="compare.php"><i class="ps-icon-share"></i></a></div>
                </div>
                </form>

              </div>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Thông tin</a></li>
                  <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Đánh giá</a></li>
                </ul>
              </div>
              <div class="tab-content mb-60">
                <div class="tab-pane active" role="tabpanel" id="tab_01">
                  <p><?php echo $shoe['review']; ?></p>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab_02">
                  <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                  <div class="ps-review">
                    <div class="ps-review__thumbnail"><img src="images/user/1.jpg" alt=""></div>
                    <div class="ps-review__content">
                      <header>
                        <select class="ps-rating">
                          <option value="1">1</option>
                          <option value="1">2</option>
                          <option value="1">3</option>
                          <option value="1">4</option>
                          <option value="5">5</option>
                        </select>
                        <p>By<a href=""> Alena Studio</a> - November 25, 2017</p>
                      </header>
                      <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder. Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake. Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie.</p>
                    </div>
                  </div>
                  <form class="ps-product__review" action="_action" method="post">
                    <h4>Thêm đánh giá</h4>
                    <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Tên:<span>*</span></label>
                              <input class="form-control" type="text" placeholder="">
                            </div>
                            <div class="form-group">
                              <label>Email:<span>*</span></label>
                              <input class="form-control" type="email" placeholder="">
                            </div>
                            <div class="form-group">
                              <label>Your rating<span></span></label>
                              <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Bình luận:</label>
                              <textarea class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                              <button class="ps-btn ps-btn--sm">Xác nhận<i class="ps-icon-next"></i></button>
                            </div>
                          </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="NỔI BẬT">CÓ THỂ BẠN THÍCH</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
          <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <?php
                foreach($listShoe as $shoe){
                  if($shoe['sale']>0){
              ?>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div>
                    <?php
                        echo '<div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-'.$shoe['sale'].' %</span></div>';
                    ?>
                    <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                    <?php
                          $arrLinkImage = $shoeRepository->getImage($shoe['shoe_id']);
                          if($arrLinkImage->num_rows > 0){
                            echo '<img id="imageShoe2" src="'.$arrLinkImage->fetch_assoc()['link_image'].'" alt="">';
                          }
                          else{
                            echo '<img src="images/shoe/1.jpg" alt="">';
                          }
                        ?>
                    <a class="ps-shoe__overlay" href="product-detail.php?id=<?php echo $shoe['shoe_id'] ?>"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal">
                          <?php
                            foreach($arrLinkImage as $linkImage){
                          ?>
                              <img id="imageShoeMini" src="<?php echo $linkImage['link_image'] ?>" alt="">
                          <?php
                            }
                          ?>
                          <!-- <?php
                          $arrLinkImage = $shoeRepository->getImage($shoe['shoe_id']);
                          if($arrLinkImage->num_rows > 0){
                            echo '<img id="imageShoe" src="'.$arrLinkImage->fetch_assoc()['link_image'].'" alt="">';
                          }
                          else{
                            echo '<img src="images/shoe/1.jpg" alt="">';
                          }
                        ?> -->
                      </div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.php"><?php echo $shoe['shoe_name'] ?></a>
                      <p class="ps-shoe__categories"><a href="#"><?php echo $shoe['name'] ?></a></p><span class="ps-shoe__price">
                        <del><?php echo $shoe['price']?> VND</del>
                        <?php
                          echo ($shoe['price'] - $shoe['price']*$shoe['sale']*0.01)." VND";
                        ?></span>
                    </div>
                  </div>
                </div>
              </div>
                <?php
                  }
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
<?php
include_once("footer.php");
?>