<?php
// 1. Định nghĩa lớp Product (OOP)
class Product
{
    public int    $id;
    public string $name;
    public float  $price;
    public string $category;

    public function __construct($id, $name, $price, $category)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->price    = $price;
        $this->category = $category;
    }
}

// -------------------------------------------------------
// 2. Hàm lọc sản phẩm theo danh mục
// -------------------------------------------------------
function filterProductsByCategory($products, $categoryName)
{
    $result = array();

    foreach ($products as $product) {
        if ($product->category == $categoryName) {
            $result[] = $product;
        }
    }

    return $result;
}

// -------------------------------------------------------
// 3. Hàm áp dụng giảm giá
// -------------------------------------------------------
function applyDiscount($products, $percent)
{
    $result = array();

    foreach ($products as $product) {
        $newProduct           = clone $product;
        $newProduct->price    = $product->price * (1 - $percent / 100);
        $result[]             = $newProduct;
    }

    return $result;
}

// -------------------------------------------------------
// 4. Dữ liệu mẫu – 7 sản phẩm
// -------------------------------------------------------
$products = array(
    new Product(1, "Tao Fuji Nhat",        45000,  "Trai cay"),
    new Product(2, "Chuoi Cavendish",      18000,  "Trai cay"),
    new Product(3, "Ca rot baby Da Lat",   22000,  "Rau cu"),
    new Product(4, "Bong cai xanh",        30000,  "Rau cu"),
    new Product(5, "Thit bo Wagyu 500g",  380000,  "Thit & Hai san"),
    new Product(6, "Ca hoi Na Uy 300g",   210000,  "Thit & Hai san"),
    new Product(7, "Sua tuoi Vinamilk 1L",  32000,  "Do uong"),
);

// -------------------------------------------------------
// 5. Hàm in danh sách sản phẩm
// -------------------------------------------------------
function printProducts($products, $title)
{
    echo "\n=== " . $title . " ===\n";

    if (count($products) == 0) {
        echo "  (Khong co san pham nao)\n";
        return;
    }

    foreach ($products as $p) {
        echo "  [ID: " . $p->id . "] "
            . $p->name . " | "
            . number_format($p->price, 0, '.', ',') . " VND | "
            . $p->category . "\n";
    }
}

// -------------------------------------------------------
// 6. Chạy thử
// -------------------------------------------------------

// Toàn bộ danh sách ban đầu
printProducts($products, "Danh sach san pham ban dau");

// Lọc theo danh mục "Trai cay"
$fruits = filterProductsByCategory($products, "Trai cay");
printProducts($fruits, "Loc theo danh muc: Trai cay");

// Lọc theo danh mục "Thit & Hai san"
$seafood = filterProductsByCategory($products, "Thit & Hai san");
printProducts($seafood, "Loc theo danh muc: Thit & Hai san");

// Giảm giá 10% cho toàn bộ danh sách
$discounted = applyDiscount($products, 10);
printProducts($discounted, "Sau khi giam gia 10%");

// Giảm giá 20% chỉ cho nhóm Rau cu
$veggies           = filterProductsByCategory($products, "Rau cu");
$discountedVeggies = applyDiscount($veggies, 20);
printProducts($discountedVeggies, "Rau cu sau khi giam gia 20%");
