<?php
    $id=$_GET['id'];
    //Kết nối đến DB
    $con=mysqli_connect('localhost','root','','baitaplon')
    or die('Lỗi kết nối');
    //Tạo truy vấn xóa
    $sql="DELETE FROM chitietphieunhap WHERE id='$id'";
    $kq=mysqli_query($con,$sql);
    if($kq) echo "<script>alert('Xóa thành công!')</script>";
    else echo "<script>alert('Xóa thất bại!')</script>";
    echo "<script>window.location.href='./chitietphieunhap.php'</script>"
?>