
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminstyle.css">
    <title>add product</title>
</head>
<?php

    session_start();
    if(!isset($_SESSION['admin'])){
        header('Location:home.php');
    }

    include "./phps.php";

    $phps = new phps();
    $phps->addProduct();
?>

<body>
    <div class="admin-head">
        <div>
            <h3>Product Manage</h3>
            <a href="admin_logout.php">Logout</a>
        </div>
    </div>
    
    <div class="admin-box">
        <h3>Add in</h3>

        <form role="form" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">title</label>
                <input type="text" class="form-control" name="title" 
                    placeholder="Please enter a title" style="width:500px">
            </div>
            <div class="form-group">
                <label for="inputfile">picture</label>
                <input type="file" id="inputfile" name="img">
            </div>
            
            <div class="form-group">

            <label for="name">categories</label>
            <select class="form-control" style="width:200px" name="categories">
                    <option value="Flowers">Flowers</option>
                    <option value="Flowerbox">Flowerbox</option>
                    <option value="Flowergift">Flowergift</option>
                    <option value="Spical flower design">Spical flower design</option>
            </select>
            </div>

            <div class="form-group">
                <label for="name">price</label>
                <input type="number"  min='0.00' step='0.01' class="form-control" name="price"
                       placeholder="Please enter a title" style="width:200px">
            </div>

            <label for="inputfile">describe</label>
            
            <div id="editor">
                
            </div>
            <textarea name="describes" id="content" hidden></textarea>

            <br>    
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</body>

<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="./js/wangEditor.min.js"></script>
<script type="text/javascript">
    var E = window.wangEditor
    var editor = new E('#editor')
    var $content = $('#content')
    editor.customConfig.onchange = function (html) {
        $content.val(html)
    }
    editor.create()

    $content.val(editor.txt.html());
</script>
</html>