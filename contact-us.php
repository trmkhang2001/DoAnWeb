<?php
 include_once("header.php");
?>
    <main class="ps-main">
      <div class="ps-contact ps-section pb-80">
        <div id="contact-map" data-address="New York, NY" data-title="Sky Store!" data-zoom="17"></div>
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  <div class="ps-section__header mb-50">
                    <h2 class="ps-section__title" data-mask="Contact">- Get in touch</h2>
                    <form class="ps-contact__form" action="" method="post">
                      <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                              <div class="form-group">
                                <label>Name <sub>*</sub></label>
                                <input name="name" class="form-control" type="text" placeholder="">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                              <div class="form-group">
                                <label>Email <sub>*</sub></label>
                                <input name="email" class="form-control" type="email" placeholder="">
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                              <div class="form-group mb-25">
                                <label>Your Message <sub>*</sub></label>
                                <textarea name="content" class="form-control" rows="6"></textarea>
                              </div>
                              <div class="form-group">
                                <button name="send_email" class="ps-btn">Send Message<i class="ps-icon-next"></i></button>
                              </div>
                            </div>
                      </div>
                      <?php
                        if(isset($_POST['send_email']))
                          $sendEmail->send($_POST['name'],$_POST['email'],"Xin Chào",$_POST['content']);
                      ?>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  <div class="ps-section__content">
                    <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="ps-contact__block" data-mh="contact-block">
                              <header>
                                <h3>USA <span> San Francisco</span></h3>
                              </header>
                              <footer>
                                <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                                <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                              </footer>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="ps-contact__block" data-mh="contact-block">
                              <header>
                                <h3>Ireland  <span> Dublin</span></h3>
                              </header>
                              <footer>
                                <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                                <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                              </footer>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="ps-contact__block" data-mh="contact-block">
                              <header>
                                <h3>Brazil <span> São Paulo</span></h3>
                              </header>
                              <footer>
                                <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                                <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                              </footer>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="ps-contact__block" data-mh="contact-block">
                              <header>
                                <h3>Philippines <span> Quezon City</span></h3>
                              </header>
                              <footer>
                                <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                                <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                                <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                              </footer>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
<?php
include_once("footer.php");
?>