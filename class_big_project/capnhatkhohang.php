<?php
    //Kết nối đến DB
    $con=mysqli_connect('localhost','root','','baitaplon')
    or die('Lỗi kết nối');
    //Tạo và thực hiện truy vấn
    $sql="SELECT*FROM khohang";
    $data=mysqli_query($con,$sql);
    //xu ly button luu
    $makh='';$msp='';$tsp='';$dvt='';$tk='';
    if(isset($_POST['btnluu']))
    { 
        $makh = $_POST['txtkhohang'];
        $msp=$_POST['txtmasp'];
        $tsp=$_POST['txttensp'];
        $dvt=$_POST['txtdvt'];
        $tk=$_POST['intTonkho'];
        //kiem tra ma loai rong
        if($makh==''||$msp==''||$tsp==''||$dvt==''||$tk=='')
            echo "<script>alert('Phải nhập đủ dữ liệu')</script>";
        else{
             //kiemtra trung khoa chinh(maloai)
            $sql1="SELECT * FROM khohang WHERE Masp='$msp'";
            $dt=mysqli_query($con, $sql1);
            $sql2="SELECT * FROM khohang WHERE Tensp='$tsp'";
            $dt2=mysqli_query($con, $sql2);
            if(mysqli_num_rows($dt)>0)
                echo "<script>alert('Trùng mã sản phẩm ')</script>";
            else if(mysqli_num_rows($dt2)>0){
                echo "<script>alert('Trùng tên sản phẩm ')</script>";
            }
            else{
                 // tao cau lenh truy van chen du lieu vao bang loaisach
                $sql="INSERT INTO khohang VALUE('$makh', '$msp','$tsp','$dvt','$tk')";
                $kq=mysqli_query($con,$sql);
                if($kq) 
                {
                    echo "<script>alert('Thêm mới thành công!')</script>";
                    header("location: Dulieukhohang.php");
                    exit;
                }
                else echo "<script>alert('Thêm mới thất bại!')</script>";
            }
        }
    }
        //dong ket noi
        mysqli_close($con);
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dữ liệu kho hàng | Quản lý kho hàng</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/stackpath.bootstrapcdn.com_bootstrap_4.1.1_css_bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/maxcdn.bootstrapcdn.com_bootstrap_4.0.0_css_bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;700&display=swap">
</head>
<style>
    .menu-item{
        display: flow-root;
    }

    .submenu {
        display: none;
        z-index: 1;
    }

    .submenu.show {
        display: block;
    }
    i{
        margin-right: 4px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <img src="./assets/img/pastel-leaves-aesthetic-pattern-gjtnfutk6zibt3d5.jpg" alt="" class="nav-img">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <div class="logo_dashboard">
                <img src="./assets/img/bear_logo.png" alt="" class="logo-img_dashboard">
                <h3 class="logo-text">GOURP</h3>
            </div>
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ml-auto navbar-nav1">
            <li class="nav-item nav-item1">
                <img src="https://kynguyenlamdep.com/wp-content/uploads/2022/06/avatar-cute-meo-con-than-chet-700x695.jpg" alt="avatar-cute-meo-con-than-chet" class="header__navbar-user-img">
                <div class="nav-link nav-name menu-item" style="padding-right: 32px;">
                    Admin
                    <i class="fa-solid fa-sort-down"></i>
                    <ul class="header__navbar-user-menu submenu">
                        <li class="header__navbar-user-item">
                            <a href="./Suataikhoan.php">Tài khoản của tôi</a>
                        </li>
                        <li class="header__navbar-user-item header__navbar-user-item--separate">
                            <a href="./index.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>

            </li> 
         </ul>
    </nav>

    <div class="grid">
        <div class="grid__column-1_5">
            <div class="right_menu">
                <div class="right_menu-list">
                    <h3 class="right_menu-text">Menu</h3>
                    <div class="right_menu-item">
                        <a href="./Home.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-newspaper"></i>
                                Trang chủ
                            </div>
                            <!-- <span class="dash_board-notice">3</span> -->
                        </a>
                    </div>

                    <div class="right_menu-item--label">Thiết lập dữ liệu</div>

                    <div class="right_menu-item menu-item">
                        <div class="right_menu-item--left">
                            <i class="fa-solid fa-database"></i>
                            Quản lý danh mục
                        </div>
                        <div class="submenu">
                            <a href="./Loaihang.php" class="right_menu-item--link">
                                <div class="right_menu-item--container">
                                    <div class="right_menu-item--right">
                                        <i class="fa-solid fa-circle-notch"></i>
                                        Loại hàng
                                    </div>
                                </div>
                            </a>
                            <a href="./Donvi.php" class="right_menu-item--link">
                                <div class="right_menu-item--container">
                                    <div class="right_menu-item--right">
                                        <i class="fa-solid fa-circle-notch"></i>
                                        Đơn vị tính
                                    </div>
                                </div>
                            </a>
                            <a href="./Nhacungcap.php" class="right_menu-item--link">
                                <div class="right_menu-item--container">
                                    <div class="right_menu-item--right">
                                        <i class="fa-solid fa-circle-notch"></i>
                                        Nhà cung cấp    
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./Sanpham.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-cubes"></i>
                                Sản phẩm
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./Khachhang.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-users"></i>
                                Khách hàng
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./Nhanvien.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-user-tie"></i>
                                Nhân viên
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item--label">Dữ liệu nhập xuất</div>

                    <div class="right_menu-item menu-item">
                        <a href="./phieunhap.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-download"></i>
                                Phiếu nhập
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./chitietphieunhap.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-file-export"></i>
                                Chi tiết phiếu nhập
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./phieuxuat.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-chart-pie"></i>
                                Phiếu xuất
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item">
                        <a href="./chitietphieuxuat.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-receipt"></i>
                                Chi tiết phiếu xuất
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item menu-item active">
                        <a href="./Dulieukhohang.php" class="right_menu-item--link">
                            <div class="right_menu-item--left small-active">
                                <i class="fa-solid fa-warehouse"></i>
                                Dữ liệu kho hàng
                            </div>
                        </a>
                    </div>

                    <div class="right_menu-item--label">Báo cáo thống kê</div>
                    
                    <div class="right_menu-item menu-item">
                        <a href="./TKdoanhthu.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-chart-area"></i>
                                Thống kê doanh thu
                            </div>
                        </a>
                    </div>
                    
                    <div class="right_menu-item menu-item">
                        <a href="./Thanhtoan.php" class="right_menu-item--link">
                            <div class="right_menu-item--left">
                                <i class="fa-solid fa-rectangle-list"></i>
                                Hóa đơn
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="grid__column-10_5">
            <div class="content">
                <form method="post" action=""> 
                    <table>
                        <table>
                            <tr>
                                <td>
                                    <h5 class="ttitle">Cập nhật dữ liệu kho hàng</h5>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="col1">Mã kho hàng</td>
                                <td class="col2">
                                    <input class="form-control" type="text" name='txtkhohang' value="<?php echo $makh ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Mã sản phẩm</td>
                                <td class="col2">
                                    <!-- <input class="form-control" type="text" name='txtmasp' value="<?php echo $msp ?>"> -->
                                    <select name="txtmasp">
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "baitaplon");

                                            // Truy vấn cơ sở dữ liệu để lấy các giá trị từ thuộc tính "makh" trong bảng "sanpham"
                                            $sql = "SELECT Masp FROM qlchitietsp";
                                            $result = mysqli_query($conn, $sql);

                                            // Kiểm tra và hiển thị các giá trị trong combobox
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['Masp'] . "'>" . $row['Masp'] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Tên sản phẩm</td>
                                <td class="col2">
                                    <!-- <input class="form-control" type="text" name='txttensp' value="<?php echo $tsp ?>"> -->
                                    <select name="txttensp">
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "baitaplon");

                                            // Truy vấn cơ sở dữ liệu để lấy các giá trị từ thuộc tính "makh" trong bảng "sanpham"
                                            $sql = "SELECT Tensp FROM qlchitietsp";
                                            $result = mysqli_query($conn, $sql);

                                            // Kiểm tra và hiển thị các giá trị trong combobox
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['Tensp'] . "'>" . $row['Tensp'] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Đơn vị tính</td>
                                <td class="col2">
                                    <!-- <input class="form-control" type="text" name='txtdvt' value="<?php echo $dvt ?>"> -->
                                    <select name="txtdvt">
                                        <?php
                                            $conn = mysqli_connect("localhost", "root", "", "baitaplon");

                                            // Truy vấn cơ sở dữ liệu để lấy các giá trị từ thuộc tính "makh" trong bảng "sanpham"
                                            $sql = "SELECT Dvt FROM qldonvitinh";
                                            $result = mysqli_query($conn, $sql);

                                            // Kiểm tra và hiển thị các giá trị trong combobox
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['Dvt'] . "'>" . $row['Dvt'] . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Tồn kho</td>
                                <td class="col2">
                                    <input class="form-control" type="int" name='intTonkho' value="<?php echo $tk ?>">
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="col1"></td>
                                <td class="col2">
                                    <input class="btn btn-dark" type="submit" name="btnluu" value="Lưu" style="width: 100px;">
                                </td>
                            </tr>
                        </table>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="footer-text">© 2023 - Bản quyền thuộc về Công ty QNA</p>
    </div>

    <script>
        // Lấy danh sách tất cả các menu cấp 1
        var menuItems = document.getElementsByClassName('menu-item');

        // Duyệt qua từng menu cấp 1 và thiết lập sự kiện click
        for (var i = 0; i < menuItems.length; i++) {
        var menuItem = menuItems[i];
        menuItem.addEventListener('click', function() {
            // Tìm submenu tương ứng với menu cấp 1 được nhấn
            var submenu = this.querySelector('.submenu');

            // Kiểm tra nếu submenu đã được hiển thị, thì ẩn đi, ngược lại thì hiển thị
            if (submenu.classList.contains('show')) {
            submenu.classList.remove('show');
            } else {
            submenu.classList.add('show');
            }
        });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>