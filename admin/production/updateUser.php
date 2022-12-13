<?php
    require_once("../../backend/filterAdmin.php");
    require_once("../../repository/userRepository.php");
    $userRepository = new UserRepository();
    $userInfo = $userRepository->getById($_GET['id']);
    include_once("header.php");
?>
        <div class="right_col" role="main">
        <a class="btn btn-primary" href="user.php" role="button">Trở Về</a>
        <form method="POST" action="">
        <div class="form-group">
          <label for="exampleInputEmail1">Họ Tên</label>
          <input required value="<?php echo $userInfo['fullname']?>" minlength="5" maxlength="50" name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên giày">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input required value="<?php echo $userInfo['email']?>" minlength="5" maxlength="50" name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá tiền">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">SDT</label>
          <input required value="<?php echo $userInfo['phone']?>" minlength="0" maxlength="10" name="phone" type="number" class="form-control" id="exampleInputPassword1" placeholder="Nhập giá tiền">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Quyền</label>
          <select name="role" class="form-control">
          <option <?php if($userInfo['role']==0) echo "selected" ?> value="0" >USER</option>
          <option <?php if($userInfo['role']==1) echo "selected" ?> value="1" >ADMIN</option>
        </select>
        </div>
        <div>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Cập Nhật</button>
        <?php
          if(isset($_POST['submit'])){
              $userRepository->updateById($_GET['id'],$_POST['fullname'],$_POST['email'],$_POST['phone'],$_POST['role']);
              echo "<script>alert('Cập nhật thành công');window.location.href='user.php';</script>";
          }
        ?>
     </form>
        </div>
<?php
include_once("footer.php");
?>
