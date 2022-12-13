<?php
    require_once(__DIR__."../../connect.php");
    class ShoeRepository{
        public function insert($name,$price,$sale,$size,$color,$review,$category_id){
            global $conn;
            $sql = "INSERT INTO shoe(name,price,sale,size,color,review,category_id) VALUES('$name',$price,$sale,'$size','$color','$review',$category_id)";
            mysqli_query($conn,$sql);
            return mysqli_insert_id($conn);
        }
        public function getAll($limit){
            global $conn;
            $sql = "SELECT s.id as shoe_id, s.name as shoe_name, s.*, c.* FROM shoe s JOIN category c on c.id=s.category_id ORDER BY s.id DESC ";
            if($limit != null)
                $sql.="limit 0,".$limit;
            return mysqli_query($conn,$sql);
        }
        public function getById($id){
            global $conn;
            $sql = "SELECT s.id as shoe_id, s.name as shoe_name, s.*, c.* FROM shoe s JOIN category c on c.id=s.category_id and s.id=$id";
            return mysqli_query($conn,$sql);
        }
        public function deleteById($id){
            global $conn;
            $sql = "DELETE FROM shoe WHERE id=$id";
            mysqli_query($conn,$sql);
        }
        public function update($id,$name,$price,$sale,$size,$color,$review,$category_id){
            global $conn;
            $sql = "UPDATE shoe set name='$name', price=$price, sale=$sale, size='$size', color='$color',review='$review',category_id=$category_id WHERE id=$id";
            mysqli_query($conn,$sql);
        }
        public function countShoeByCategoryName($name){
            global $conn;
            $sql = "SELECT * FROM shoe s JOIN category c on c.id=s.category_id";
            if($name != '')
                $sql = "SELECT * FROM shoe s JOIN category c on c.id=s.category_id and c.name='$name'";
            return mysqli_query($conn,$sql)->num_rows;
        }
        public function addImage($id,$linkImage){
            global $conn;
            $sql = "INSERT INTO shoe_image(shoe_id,link_image) VALUES($id,'$linkImage')";
            mysqli_query($conn,$sql);
        }
        public function getImage($id){
            global $conn;
            $sql = "SELECT link_image FROM `shoe_image` WHERE shoe_id=$id";
            return mysqli_query($conn,$sql);
        }
        public function deleteImage($id){
            global $conn;
            $sql = "DELETE FROM shoe_image WHERE id=$id";
            mysqli_query($conn,$sql);
        }
    }
?>