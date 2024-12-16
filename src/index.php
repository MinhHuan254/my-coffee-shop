<?php
$host = 'mysql-coffee';  // Tên dịch vụ MySQL trong docker-compose.yml
$username = 'user';
$password = 'password';
$database = 'CoffeeShop';

$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy dữ liệu sản phẩm từ bảng 'products'
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Kiểm tra lỗi trong truy vấn
if (!$result) {
    die("Truy vấn thất bại: " . $conn->error . " SQL: " . $sql);
}

// Kiểm tra nếu có dữ liệu trả về
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh Menu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Thanh Menu */
    header {
      background-color: #333;
      color: white;
      padding: 10px 0;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .logo a {
      font-size: 24px;
      color: white;
      text-decoration: none;
    }

    .search-bar input {
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .search-bar button {
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 6px;
    }

    .user-options a {
      color: white;
      margin-left: 10px;
      text-decoration: none;
    }

    /* Thanh Menu */
    .menu {
      background-color: #444;
      padding: 10px 0;
      text-align: center;
    }

    .menu a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropbtn {
      color: white;
      padding: 10px;
      background-color: #444;
      border: none;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 160px;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #575757;
    }

    /* Phần nội dung sản phẩm */
    .product-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Căn giữa các sản phẩm */
      gap: 20px;
      padding: 20px;
    }

    .product-card {
      width: 200px;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: scale(1.05);
    }

    .product-img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }

    .product-info {
      padding: 10px;
    }

    .product-name {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product-description {
      font-size: 14px;
      color: #666;
      margin-bottom: 10px;
    }

    .product-price {
      color: #e74c3c;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .buy-btn {
      background-color: #3498db;
      color: white;
      width: 100%;
      padding: 10px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .buy-btn:hover {
      background-color: #2980b9;
    }

    /* Thay đổi phần h1 cho title "Sản phẩm bán chạy" */
    main h1 {
      text-align: center;
      font-size: 36px;
      margin-bottom: 20px;
      color: #333;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px 0;
    }
  </style>
</head>
<body>

  <!-- Thanh Menu -->
  <header>
    <div class="navbar">
      <div class="logo">
        <a href="#">Logo</a>
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="user-options">
        <a href="#" class="login-register">Đăng nhập / Đăng ký</a>
        <a href="#" title="Giỏ hàng" class="cart">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-quantity">0</span>
        </a>
      </div>
    </div>
  </header>

  <div class="menu">
    <div class="dropdown">
        <a href="#" class="dropbtn">Danh Mục Sản Phẩm</a>
        <div class="dropdown-content">
            <a href="#"><i class="fas fa-coffee"></i> Cà phê đóng gói</a>
            <a href="#"><i class="fas fa-cogs"></i> Vật phẩm bán lẻ</a>
            <a href="#"><i class="fas fa-tools"></i> Máy móc thiết bị</a>
            <a href="#"><i class="fas fa-wrench"></i> Công cụ dụng cụ</a>
        </div>
    </div>
    
    <a href="#">Câu Chuyện Thương Hiệu</a>
    <a href="#">Nhượng Quyền</a>
    <a href="#">Sản Phẩm</a>
    <a href="#">Khuyến Mãi</a>
    <a href="#">Tin Tức</a>
    <a href="#">Cửa Hàng</a>
    <a href="#">Tuyển Dụng</a>
  </div>

  <!-- Phần nội dung sản phẩm -->
  <main>
    <h1>Sản phẩm bán chạy</h1>
    <div class="product-container">
    <?php if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="images/<?php echo !empty($row['image']) ? htmlspecialchars($row['image']) : 'default.jpg'; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="product-img">
                <div class="product-info">
                    <h2 class="product-name"><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p class="product-description"><?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="product-price"><?php echo number_format($row['price'], 0, ',', '.'); ?> VND</div>
                    <button class="buy-btn">Mua ngay</button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php else: ?>
        <p>Hiện tại không có sản phẩm nào.</p>
    <?php endif; ?>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2024 Thanh Menu</p>
    </div>
  </footer>

  <script src="scripts.js"></script>
</body>
</html>

<?php
$conn->close();
?>
