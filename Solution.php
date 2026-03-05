<?php
// 1. Định nghĩa lớp Product (OOP)
class Product
{
    public int    $id;
    public string $name;
    public float  $price;
    public string $category;

    public function __construct(int $id, string $name, float $price, string $category)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->price    = $price;
        $this->category = $category;
    }

    /** Trả về bản sao sản phẩm với giá mới sau khi giảm. */
    public function withDiscountedPrice(float $percent): self
    {
        $clone        = clone $this;
        $clone->price = round($this->price * (1 - $percent / 100), 2);
        return $clone;
    }

    public function __toString(): string
    {
        return sprintf(
            "[ID: %d] %-25s | %10s VND | %s",
            $this->id,
            $this->name,
            number_format($this->price, 0, '.', ','),
            $this->category
        );
    }
}

// 2. Hàm lọc sản phẩm theo danh mục
function filterProductsByCategory(array $products, string $categoryName): array
{
    return array_values(
        array_filter(
            $products,
            fn(Product $p) => strcasecmp($p->category, $categoryName) === 0
        )
    );
}

// 3. Hàm áp dụng giảm giá
function applyDiscount(array $products, float $percent): array
{
    if ($percent < 0 || $percent > 100) {
        throw new InvalidArgumentException("Phần trăm giảm giá phải nằm trong khoảng 0 – 100.");
    }

    return array_map(
        fn(Product $p) => $p->withDiscountedPrice($percent),
        $products
    );
}

// 4. Dữ liệu mẫu
$products = [
    new Product(1, "Táo Fuji Nhật",          45000,  "Trái cây"),
    new Product(2, "Chuối Cavendish",         18000,  "Trái cây"),
    new Product(3, "Cà rốt baby Đà Lạt",     22000,  "Rau củ"),
    new Product(4, "Bông cải xanh",           30000,  "Rau củ"),
    new Product(5, "Thịt bò Wagyu (500g)",   380000, "Thịt & Hải sản"),
    new Product(6, "Cá hồi Na Uy (300g)",    210000, "Thịt & Hải sản"),
    new Product(7, "Sữa tươi Vinamilk 1L",    32000,  "Đồ uống"),
];

// 5. Demo
function printProducts(array $products, string $title): void
{
    echo "\n=== $title ===\n";
    if (empty($products)) {
        echo "  (Không có sản phẩm nào)\n";
        return;
    }
    foreach ($products as $p) {
        echo "  $p\n";
    }
}

// Toàn bộ danh sách ban đầu
printProducts($products, "Danh sách sản phẩm ban đầu");

// Lọc theo danh mục "Trái cây"
$fruits = filterProductsByCategory($products, "Trái cây");
printProducts($fruits, "Lọc theo danh mục: Trái cây");

// Lọc theo danh mục "Thịt & Hải sản"
$seafood = filterProductsByCategory($products, "Thịt & Hải sản");
printProducts($seafood, "Lọc theo danh mục: Thịt & Hải sản");

// Giảm giá 10% cho toàn bộ danh sách
$discounted = applyDiscount($products, 10);
printProducts($discounted, "Sau khi giảm giá 10%");

// Giảm giá 20% chỉ cho nhóm Rau củ
$veggies           = filterProductsByCategory($products, "Rau củ");
$discountedVeggies = applyDiscount($veggies, 20);
printProducts($discountedVeggies, "Rau củ sau khi giảm giá 20%");
