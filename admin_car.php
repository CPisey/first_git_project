<?php
$con = new mysqli("localhost", "root", "", "php_test");
if (isset($_POST['tsave'])) {
    $id = $_POST['txt-id'];
    $name = $_POST['txt-name'];
    $qty = $_POST['txt-qty'];
    $price = $_POST['txt-price'];
    $model = $_POST['txt-model'];
    $stock = $_POST['txt-stock'];
    $status = $_POST['txt-status'];
    $od = $_POST['txt-od'];
    $img = "1.JPG";
    $sql = "INSERT INTO car VALUES($id, '$name', $qty, $price, '$model', $stock, $status, $od, '$img')";
    $con->query($sql);
}
$sql = "SELECT ID FROM car ORDER BY ID DESC";
$result = $con->query($sql);
$count = $result->num_rows;
if ($count == 0) {
    $getAutoID = 1;
} else {
    $col = $result->fetch_array();
    $getAutoID = $col[0] + 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/admin_car.css">
    </body>
</head>

<body>
    <form action="admin_car.php" class="frm-data" method="post" enctype="multipart/form">
        <label for="id">ID</label>
        <input type="text" name="txt-id" id="id" class="form-control" value="<?php echo $getAutoID ?>" placeholder="Enter ID">
        <label for="name">Name</label>
        <input type="text" name="txt-name" id="name" class="form-control" placeholder="Enter Name">
        <label for="qty">Quantity</label>
        <input type="text" name="txt-qty" id="qty" class="form-control" placeholder="Enter Quantity">
        <label for="price">Price</label>
        <input type="text" name="txt-price" id="price" class="form-control" placeholder="Enter Price">
        <label for="model">Model</label>
        <input type="text" name="txt-model" id="model" class="form-control" placeholder="Enter Model">
        <label for="stock">Stock(1=in stock , 0=out stock)</label>
        <select name="txt-stock" id="stock" class="form-control">
            <option value="1">1</option>
            <option value="0">0</option>
            <option value="2">2</option>
        </select>
        <label for="status">status(1=show, 0=hide)</label>
        <select name="txt-status" id="status" class="form-control">
            <option value="1">1</option>
            <option value="0">0</option>
        </select>
        <label for="od">OD</label>
        <input type="text" name="txt-od" id="od" class="form-control" value="<?php echo $getAutoID ?>" placeholder="Enter OD">
        <label for="">Update photo</label><br>
        <input type="file" name="tfile" id="file"><br><br>
        <input type="submit" name="tsave" value="Save" class="btn btn-primary">
    </form>
    <div class="container-fluid mt-3">
        <table class="table table-bordered table-hover tbl-data">

            <tr>
                <th width="60px">ID</th>
                <th width="150px">Name</th>
                <th width="140px">Quantity</th>
                <th width="140px">Price</th>
                <th width="140px">Model</th>
                <th width="100px">Stock</th>
                <th width="100px">status</th>
                <th width="70px">OD</th>
                <th width="90px">Photo</th>
                <th width="90px">Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM car ORDER BY ID DESC";
            $result = $con->query($sql);
            while ($col = $result->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $col[0] ?></td>
                    <td><?php echo $col[1] ?></td>
                    <td><?php echo $col[2] ?></td>
                    <td><?php echo $col[3] ?></td>
                    <td><?php echo $col[4] ?></td>
                    <td><?php echo $col[5] ?></td>
                    <td><?php echo $col[6] ?></td>
                    <td><?php echo $col[7] ?></td>
                    <td>
                        <img src="../Move_image/1.JPG" alt="">
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>