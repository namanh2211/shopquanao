<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                <span class="breadcrumb-item active">Favorite Product</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Wishlist Table Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0 w-100">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <tr>
                        <td class="align-middle">
                            <img src="img/product-<?php echo $i; ?>.jpg" alt="Product Image" style="width: 50px;">
                            Product Name
                        </td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">$150</td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Wishlist Table End -->

<?php include 'footer.php'; ?>
