<?php
  require_once("repository/shoeRepository.php");
  $shoeRepository = new ShoeRepository();
  include_once("header.php");
?>
    <main class="ps-main">
      <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100" id="all-product">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="SẢN PHẨM">TẤT CẢ SẢN PHẨM</h3>
            <ul class="ps-masonry__filter">
              <li class="current"><a href="#" data-filter="*">All <sup><?php  echo $shoeRepository->countShoeByCategoryName('');?></sup></a></li>
              <li><a href="#" data-filter=".nike">Nike <sup><?php  echo $shoeRepository->countShoeByCategoryName('nike');?></sup></a></li>
              <li><a href="#" data-filter=".adidas">Adidas <sup><?php  echo $shoeRepository->countShoeByCategoryName('adidas');?></sup></a></li>
              <li><a href="#" data-filter=".men">Men <sup><?php  echo $shoeRepository->countShoeByCategoryName('men');?></sup></a></li>
              <li><a href="#" data-filter=".women">Women <sup><?php  echo $shoeRepository->countShoeByCategoryName('women');?></sup></a></li>
              <li><a href="#" data-filter=".kids">Kids <sup><?php  echo $shoeRepository->countShoeByCategoryName('kids');?></sup></a></li>
            </ul>
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>

                <?php
                    $checkNew = false;
                    $listShoe = $shoeRepository->getAll(12);
                    foreach($listShoe as $shoe){
                ?>
                <div class="grid-item <?php echo $shoe['name']?>">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                        <?php
                          if(!$checkNew){
                            echo '<div class="ps-badge"><span>New</span></div>';
                            $checkNew = true;
                          }
                          if($shoe['sale']>0){
                            echo '<div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-'.$shoe['sale'].' %</span></div>';
                          }
                         ?>

                        <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                        <?php
                          $arrLinkImage = $shoeRepository->getImage($shoe['shoe_id']);
                          if($arrLinkImage->num_rows > 0){
                            echo '<img id="imageShoe" src="'.$arrLinkImage->fetch_assoc()['link_image'].'" alt="">';
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
                          </div>
                          <select class="ps-rating ps-shoe__rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                          </select>
                        </div>
                        <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#"><?php echo $shoe['shoe_name'] ?></a>
                          <p class="ps-shoe__categories"><a href="#"><?php echo $shoe['name'] ?></a></p>
                          <span class="ps-shoe__price">
                            <?php
                              if($shoe['sale'] > 0){
                                echo '<del>'.$shoe['price'].' VND</del>';
                              }
                             ?>
                             <?php
                                echo ($shoe['price'] - $shoe['price']*$shoe['sale']*0.01)." VND";
                             ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="TOP GIẢM GIÁ">GIẢM GIÁ</h3>
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