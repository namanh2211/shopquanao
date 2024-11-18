<?php 
include 'header.php';
include 'shop-xuly.php'; // Include file để lấy danh sách sản phẩm và danh mục từ cơ sở dữ liệu
?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                <span class="breadcrumb-item active">Shop List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <h5 class="categories-title mb-3">Categories</h5>
            <div class="bg-light p-4 mb-30">
                <ul class="list-unstyled category-list mb-0">
                    <li class="mb-2">
                        <a href="shop.php" class="text-dark <?php if (!isset($category_id)) echo 'active'; ?>">All Products</a>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li class="mb-2">
                            <a href="shop.php?category_id=<?php echo $category['id']; ?>" 
                               class="<?php echo (isset($category_id) && $category_id == $category['id']) ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($category['category_name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->

        <!-- Product List Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <?php if (isset($products) && count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" 
                                         src="<?php echo (isset($product['image_path']) && !empty($product['image_path'])) ? htmlspecialchars($product['image_path']) : 'img/default.jpg'; ?>" 
                                         alt="<?php echo isset($product['product_name']) ? htmlspecialchars($product['product_name']) : 'Product Image'; ?>">
                                    <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="cart-xuly.php?product_id=<?php echo $product['id']; ?>&selected_size=S&quantity=1"><i class="fa fa-shopping-cart"></i></a>                                        <a class="btn btn-outline-dark btn-square" href="favorite_product-xuly.php?action=add&id=<?php echo $product['id']; ?>"><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="detail.php?id=<?php echo isset($product['id']) ? htmlspecialchars($product['id']) : ''; ?>">
                                        <?php echo isset($product['product_name']) ? htmlspecialchars($product['product_name']) : 'No Name'; ?>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>$<?php echo isset($product['price']) ? number_format($product['price'], 2) : '0.00'; ?></h5>
                                        <h6 class="text-muted ml-2"><del>$<?php echo isset($product['old_price']) ? number_format($product['old_price'], 2) : '0.00'; ?></del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p>Không có sản phẩm nào để hiển thị.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination Start -->
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="shop.php?category_id=<?php echo $category_id; ?>&page=<?php echo $current_page - 1; ?>">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                    <a class="page-link" href="shop.php?category_id=<?php echo $category_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="shop.php?category_id=<?php echo $category_id; ?>&page=<?php echo $current_page + 1; ?>">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Pagination End -->
        </div>
    </div>
</div>
<!-- Shop End -->

<?php include 'footer.php'; ?> 

<!-- Custom CSS for Sidebar -->

<!-- Custom CSS for Sidebar -->
<style>
    /* CSS tùy chỉnh cho phần Categories */
    .categories-title {
        font-weight: 700;
        color: #333;
        text-transform: uppercase;
        padding-bottom: 10px;
        border-bottom: 2px solid #ffc107;
    }

    .category-list a {
        display: block;
        color: #555;
        padding: 10px 15px;
        text-decoration: none;
        font-size: 16px;
        transition: background 0.3s, color 0.3s;
        border-radius: 5px;
    }

    .category-list a:hover {
        background-color: #ffc107;
        color: #fff;
    }

    .category-list a.active {
        background-color: #ffc107;
        color: #fff;
    }
</style>
