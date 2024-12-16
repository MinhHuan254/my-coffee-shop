CREATE DATABASE IF NOT EXISTS CoffeeShop;

USE CoffeeShop;

-- Xóa bảng products nếu đã tồn tại
DROP TABLE IF EXISTS products;

-- Tạo lại bảng products
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255)
);

-- Chèn dữ liệu vào bảng products
INSERT INTO products (name, description, price, image)
VALUES 
('Cà phê Đen', 'Đậm đà hương vị truyền thống', 20000, 'coffee_black.jpg'),
('Cà phê Sữa', 'Thơm ngon và béo ngậy', 25000, 'coffee_milk.jpg'),
('Espresso', 'Hương vị Ý cổ điển', 30000, 'espresso.jpg'),
('Latte', 'Dịu nhẹ và ngọt ngào', 35000, 'latte.jpg');
