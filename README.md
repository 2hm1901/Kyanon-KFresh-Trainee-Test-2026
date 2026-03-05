# Kyanon KFresh Trainee Test 2026

Bài kiểm tra tuyển dụng Trainee – Kyanon Digital / KFresh (2026).

---

## Cấu trúc thư mục

```
├── Report.md       # Câu 1 – Báo cáo so sánh CMS/E-commerce Framework
├── Solution.php    # Câu 2 – Mã nguồn PHP quản lý sản phẩm (OOP)
└── README.md       # Hướng dẫn này
```

---

## Câu 1 – Báo cáo (Report.md)

Xem file [Report.md](Report.md) để đọc nội dung báo cáo về:
- So sánh kiến trúc Magento vs Drupal.
- Tech Stack thiết yếu (Web Server, Database, Caching).
- Xu hướng Headless CMS và lợi thế trong phát triển hiện đại.

---

## Câu 2 – Chạy file PHP (Solution.php)

### Yêu cầu

- PHP **>= 8.0** (sử dụng typed properties, arrow functions, `str_contains`).

Kiểm tra phiên bản PHP:
```bash
php -v
```

### Cách chạy

```bash
php Solution.php
```

### Kết quả mong đợi

```
=== Danh sách sản phẩm ban đầu ===
  [ID: 1] Táo Fuji Nhật          |     45,000 VND | Trái cây
  [ID: 2] Chuối Cavendish         |     18,000 VND | Trái cây
  ...

=== Lọc theo danh mục: Trái cây ===
  [ID: 1] Táo Fuji Nhật          |     45,000 VND | Trái cây
  [ID: 2] Chuối Cavendish         |     18,000 VND | Trái cây

=== Sau khi giảm giá 10% ===
  [ID: 1] Táo Fuji Nhật          |     40,500 VND | Trái cây
  ...
```

---

## Các bước đã thực hiện

1. Tạo repository `Kyanon-KFresh-Trainee-Test-2026` trên GitHub.
2. Khởi tạo Git local và kết nối remote.
3. Viết báo cáo vào `Report.md`.
4. Viết mã nguồn PHP vào `Solution.php` với thiết kế OOP.
5. Viết `README.md` hướng dẫn sử dụng.
6. Commit và push toàn bộ lên GitHub.
