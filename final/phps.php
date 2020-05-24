<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/21
 * Time: 9:28
 */

class phps
{
    public $servername = "127.0.0.1";
    public $username = "flower";
    public $password = "flower";
    public $dbname = "wnm608";
    public $db;

    public function __construct()
    {
        #Connect to database
        $this->db = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        $this->db->query("SET NAMES UTF8");
    }

    public function getCateData($categories){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if (!$conn) {
            die("Connect error: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM product where categories = \"$categories\" order by price desc";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        return  $result;
    }

    public function getItemData($id){
        $sql = "select * from product where id = \"$id\"";
        $result = $this->db->query($sql);
        $is =  mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(!$is){
            header('Location:home.php');
        }

        return $is;
    }

    public function adminLogin($user, $password){
        $sql = "select * from admin where user = \"$user\" and psw = \"$password\"";
        $result = $this->db->query($sql);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function getData(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if (!$conn) {
            die("Connect error: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                                <td>'.$row["title"].'</td>
                                <td><img src="'.$row["img"].'"></td>
                                <td>'.$row["categories"].'</td>
                                <td>'.$row["time"].'</td>
                                <td>'.$row["price"].'</td>
                                <td>
                                    <a href="edt.php?id='.(int)$row["id"].'"><button style="background-color: #f66a85;">edt</button></a>
                                    <a href="del.php?id='.(int)$row["id"].'"><button style="background-color: #EB4682">del</button></a>
                                </td>
                            </tr>';
            }
        } else {
            echo "<h1>No Data</h1>";
        }

        mysqli_close($conn);
    }

    public function addProduct(){
        if($_POST){

            $title = $_POST["title"];
            $categories = $_POST["categories"];
            $describes = $_POST["describes"];
            $price = $_POST["price"];

            if(!$title){
                echo "<h1>Please enter a title</h1>";
                header("refresh:1;url=add.php");
                die;
            }

            if($_FILES["img"]["name"]){

                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["img"]["name"]);
                $extension = end($temp);
                if ((($_FILES["img"]["type"] == "image/gif")
                        || ($_FILES["img"]["type"] == "image/jpeg")
                        || ($_FILES["img"]["type"] == "image/jpg")
                        || ($_FILES["img"]["type"] == "image/pjpeg")
                        || ($_FILES["img"]["type"] == "image/x-png")
                        || ($_FILES["img"]["type"] == "image/png"))
                    && ($_FILES["img"]["size"] < 204800)
                    && in_array($extension, $allowedExts))
                {
                    if ($_FILES["img"]["error"] > 0)
                    {
                        echo "<h1>error：: " . $_FILES["file"]["error"] . "</h1><br>";
                    }
                    else
                    {
                        $img = "upload/" . time().".".$extension;
                        move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                    }
                }
                else
                {
                    echo "<h1>Illegal file format</h1>";
                }
            }else{
                echo "<h1>Please upload the picture<h1>";
                header("refresh:1;url=add.php");
                die;
            }

            $sql = "INSERT INTO product ( title, img, categories, describes, price )
                        VALUES
                        ( '".$title."', '".$img."', '".$categories."', '".$describes."', '".$price."' )";

            $result = $this->db->query($sql);

            if ($result) {
                echo "<h1>success</h1>";
            }else{
                echo "<h1>error</h1>";
            }

            header("refresh:1;url=admin.php");
            die;
        }
    }

    public function edtProduct(){
        if($_POST){
            $title = $_POST["title"];
            $categories = $_POST["categories"];
            $describes = $_POST["describes"];
            $id =  $_POST["id"];
            $img =  $_POST["img"];
            $price =  $_POST["price"];

            if(!$title){
                echo "<h1>Please enter a title</h1>";
                header("refresh:1;url=edt.php?id=$id");
                die;
            }

            if($_FILES["img"]["name"]){

                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["img"]["name"]);
                $extension = end($temp);
                if ((($_FILES["img"]["type"] == "image/gif")
                        || ($_FILES["img"]["type"] == "image/jpeg")
                        || ($_FILES["img"]["type"] == "image/jpg")
                        || ($_FILES["img"]["type"] == "image/pjpeg")
                        || ($_FILES["img"]["type"] == "image/x-png")
                        || ($_FILES["img"]["type"] == "image/png"))
                    && ($_FILES["img"]["size"] < 204800)
                    && in_array($extension, $allowedExts))
                {
                    if ($_FILES["img"]["error"] > 0)
                    {
                        echo "<h1>errot：: " . $_FILES["file"]["error"] . "</h1><br>";
                    }
                    else
                    {
                        $img = "upload/" . time().".".$extension;
                        move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                    }
                }
                else
                {
                    echo "<h1>Illegal file format</h1>";
                }
            }

            $sql = "UPDATE product SET title='".$title."', categories='".$categories."', img= '".$img."', describes= '".$describes."', price='".$price."' WHERE id=".$id;

            $result = $this->db->query($sql);

            #判断是否成功
            if ($result) {
                echo "<h1>success</h1>";
            }else{
                echo "<h1>error</h1>";
            }

            header("refresh:1;url=admin.php");
            die;
        }else{
            if(!isset($_GET["id"])){
                header('Location:admin.php');
            }

            $id = $_GET["id"];

            $sql = "select * from product where id = \"$id\"";
            $result = $this->db->query($sql);
            $is =  mysqli_fetch_array($result, MYSQLI_ASSOC);

            if(!$is){
                header('Location:admin.php');
            }

            return $is;
        }
    }

    public function del($id){
        $sql = "DELETE FROM product
	        WHERE id = ".$id;
        $result = $this->db->query($sql);

        if($result){
            echo "<h1>success</h1>";
            header("refresh:1;url=admin.php");
        }else{
            echo "<h1>error</h1>";
            header("refresh:1;url=admin.php");
        }
    }

    public function getRandomProducts(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if (!$conn) {
            die("Connect error: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM product where hot = 1 limit 4";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-xs-6 col-md-3">
                        <a href="product_item.php?id='.$row["id"].'">
                            <div class="image-circle"><img src="'.$row["img"].'" alt=""></div>
                            <figcaption>'.$row["title"].'</figcaption>
                        </a>
                    </div>';
            }
        }

        mysqli_close($conn);
    }

    public function select($categories, $sort){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if (!$conn) {
            die("Connect error: " . mysqli_connect_error());
        }

        if($sort){
            $sort = "asc";
        }else{
            $sort = "desc";
        }

        if($categories){
            $sql = "SELECT * FROM product where categories = \"$categories\" order by price $sort";
        }else{
            $sql = "SELECT * FROM product order by price $sort";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-xs-6 col-md-3 item">
                        <a href="product_item.php?id='.(int)$row["id"].'">
                            <div class="image-circle"><img src="'.$row["img"].'" alt=""></div>
                            <figcaption>'.$row["title"].'&nbsp;&nbsp;$'.$row["price"].'</figcaption>
                        </a>
                    </div>';
            }
        }

        mysqli_close($conn);
    }

}