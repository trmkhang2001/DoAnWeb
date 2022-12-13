<?php
    require_once("../../backend/filterAdmin.php");
    require_once("../../repository/shoeRepository.php");
    require_once("../../repository/categoryRepository.php");
    require_once("../../uploadFile.php");
    $shoeRepository = new ShoeRepository();
    $categoryRepository = new CategoryRepository();
    $uploadFile = new UploadFile();
    include_once("header.php");
?>
        <div class="right_col" role="main">
        <a class="btn btn-primary" href="shoe.php" role="button">Trở Về</a>
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Giày</label>
          <input required minlength="5" maxlength="50" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên giày">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Giá Tiền (VND)</label>
          <input required min="0" max="99999999999" name="price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá tiền">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Giảm Giá (%)</label>
          <input required min="0" max="100" name="sale" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập % giảm giá">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Kích cỡ</label>
          <input required min="1" max="100" name="size" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập kích cỡ">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Màu</label>
          <input required minlength="1" maxlength="50" name="color" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập màu">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Giới Thiệu</label>
          <input required minlength="1" maxlength="500" name="review" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập giới thiệu">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Thể Loại</label>
          <select name="category_id" class="form-control">
              <?php
                $listCategory = $categoryRepository->getAll();
                foreach($listCategory as $category){
              ?>
                <option value="<?php echo $category['id'];?>" ><?php echo $category['name'];?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Chọn ảnh</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <div class="custom-file">
                <input multiple accept="image/png, image/jpeg" name="files[]" type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            </div>
        </div>
        <div>
        </div>

        <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
        <?php
          if(isset($_POST['submit'])){
            $shoeId = $shoeRepository->insert($_POST['name'],$_POST['price'],$_POST['sale'],$_POST['size'],$_POST['color'],$_POST['review'],$_POST['category_id']);
              if(!empty($_FILES['files']['name'][0])){
                  $arrLinkFile = $uploadFile->upload("../../");
                  foreach($arrLinkFile as $linkFile){
                      $shoeRepository->addImage($shoeId, $linkFile);
                  }
              }
            echo "<script>alert('Thêm thành công');window.location.href='shoe.php';</script>";
          }
        ?>
     </form>
        </div>
<?php
include_once("footer.php");
?>