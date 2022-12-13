<?php
    require_once("../../connect.php");
    class CategoryRepository{
        public function insert($name,$price,$sale,$size,$color,$category_id,$file){
            global $conn;
            $sql = "INSERT INTO shoe(name,price,sale,size,color) VALUES('$name',$price,$sale,$size,'$color')";
            mysqli_query($conn,$sql);
        }
        public function getAll(){
            global $conn;
            $sql = "SELECT * FROM category";
            return mysqli_query($conn,$sql);
        }
    }
?>