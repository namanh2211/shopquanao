<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Initialize session if it's not started
}

include 'database.php'; // Connect to the database

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    $_SESSION['error_message'] = "Please log in to add products to your cart.";
    header('Location: login.php');
    exit;
}

// Check if the form is submitted with the required data
if (isset($_GET['product_id']) && isset($_GET['selected_size']) && isset($_GET['quantity'])) {
    $product_id = intval($_GET['product_id']);
    $selected_size = htmlspecialchars($_GET['selected_size']);
    $quantity = intval($_GET['quantity']);

    // Validate quantity
    if ($quantity <= 0) {
        echo "Invalid quantity.";
        exit;
    }

    // Query the product details from the database
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add product to the cart
        $cart_item = [
            'id' => $product['id'],
            'name' => $product['product_name'],
            'price' => $product['price'],
            'size' => $selected_size,
            'quantity' => $quantity,
            'image' => $product['image_path']
        ];

        // Check if the product is already in the cart
        $exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id && $item['size'] == $selected_size) {
                $item['quantity'] += $quantity; // Add quantity if the product is already in the cart
                $exists = true;
                break;
            }
        }

        // If the product is not in the cart, add it
        if (!$exists) {
            $_SESSION['cart'][] = $cart_item;
        }

        // Redirect to the cart page
        header('Location: cart.php');
        exit;
    } else {
        echo "Product does not exist.";
        exit;
    }
} else {
    echo "Invalid data.";
    exit;
}
