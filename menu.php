<?php
/**
 * this menu.php file will create Interactive menu page with PHP category filtering ($_GET)
 * and a self-processing Quick Takeout Order Simulator ($_POST). costumer love tarnsfeacery pricing
 * I also Used PHP include() to attach header.php and footer.php.
 */

// 1. Set the dynamic title for header.php
$pageTitle = "Menu & Quick Order";

// 2. Include the reusable header file
include('header.php');

// 3. Define our South Asian menu items in a PHP associative array
$menuItems = [
    [
        "id" => "hyderabadi_biryani",
        "name" => "Hyderabadi Chicken Dum Biryani",
        "category" => "Biryani & Mains",
        "price" => 15.95,
        "spice" => "Medium-Spicy",
        "desc" => "Long-grain basmati rice layered with saffron, mint, fried onions, and spiced bone-in chicken, served with cool cucumber raita."
    ],
    [
        "id" => "kacchi_lamb_biryani",
        "name" => "Dhaka Kacchi Lamb Biryani",
        "category" => "Biryani & Mains",
        "price" => 18.50,
        "spice" => "Spicy",
        "desc" => "Tender yogurt-marinated lamb cooked raw beneath fragrant basmati rice with roasted baby potatoes and shahi garam masala."
    ],
    [
        "id" => "chicken_tikka_masala",
        "name" => "Charcoal Chicken Tikka Masala",
        "category" => "Biryani & Mains",
        "price" => 16.25,
        "spice" => "Medium",
        "desc" => "Clay-oven roasted chicken breast chunks simmered in a rich tomato, roasted garlic, and fenugreek cream sauce."
    ],
    [
        "id" => "chana_masala",
        "name" => "Punjabi Chana Masala (Vegan)",
        "category" => "Vegetarian",
        "price" => 13.50,
        "spice" => "Medium",
        "desc" => "Slow-simmered chickpeas tossed with tangy dried mango powder (amchur), ginger juliennes, and fresh coriander."
    ],
    [
        "id" => "saag_paneer",
        "name" => "Palak Saag Paneer",
        "category" => "Vegetarian",
        "price" => 14.75,
        "spice" => "Mild",
        "desc" => "Golden pan-seared paneer cheese cubes folded into creamed mustard greens and spinach tempered with cumin seeds."
    ],
    [
        "id" => "samosa_chaat",
        "name" => "Old Delhi Samosa Chaat",
        "category" => "Street Chaat & Breads",
        "price" => 8.95,
        "spice" => "Medium",
        "desc" => "Two crispy potato samosas crushed and topped with spiced chickpeas, sweet tamarind chutney, mint yogurt, and crunchy sev."
    ],
    [
        "id" => "garlic_naan",
        "name" => "Tandoori Garlic & Cilantro Naan",
        "category" => "Street Chaat & Breads",
        "price" => 4.25,
        "spice" => "Mild",
        "desc" => "Hand-stretched leavened flatbread baked on the walls of our clay tandoor and brushed with roasted garlic ghee."
    ],
    [
        "id" => "karak_chai",
        "name" => "Cardamom Karak Masala Chai",
        "category" => "Chai & Desserts",
        "price" => 3.95,
        "spice" => "Mild",
        "desc" => "Strong Assam black tea boiled slow with evaporated milk, crushed green cardamom pods, and fresh ginger."
    ],
    [
        "id" => "mango_lassi",
        "name" => "Alphonso Mango Lassi",
        "category" => "Chai & Desserts",
        "price" => 5.50,
        "spice" => "Mild",
        "desc" => "Chilled sweet yogurt smoothie blended with rich Alphonso mango pulp and a pinch of ground cardamom."
    ]
];

// 4. Handle Category Filter from URL query string (e.g., menu.php?category=Vegetarian)
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'All';

// 5. Handle Quick Takeout Order Form Submission ($_POST) - No Database Required!
$orderReceipt = null;
$orderError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_order'])) {
    $customerName = trim($_POST['customer_name'] ?? '');
    $selectedDishId = $_POST['dish_id'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);
    $spicePref = $_POST['spice_pref'] ?? 'Medium';
    $addNaan = isset($_POST['add_naan']);

    // and 6. Find the chosen dish in our PHP array
    $chosenDish = null;
    foreach ($menuItems as $item) {
        if ($item['id'] === $selectedDishId) {
            $chosenDish = $item;
            break;
        }
    }

    if (empty($customerName) || !$chosenDish || $quantity < 1) {
        $orderError = "Please enter your name, select a valid dish, and choose a quantity of at least 1.";
    } else {
        // Calculate totals (including NYC 8.875% sales tax)
        $itemSubtotal = $chosenDish['price'] * $quantity;
        $naanCost = $addNaan ? (4.25 * $quantity) : 0.00;
        $subtotal = $itemSubtotal + $naanCost;
        $tax = $subtotal * 0.08875;
        $grandTotal = $subtotal + $tax;

        // Build receipt array to display on screen
        $orderReceipt = [
            "order_number" => "SS-" . rand(1000, 9999),
            "customer"     => $customerName,
            "dish_name"    => $chosenDish['name'],
            "unit_price"   => $chosenDish['price'],
            "quantity"     => $quantity,
            "spice_pref"   => $spicePref,
            "add_naan"     => $addNaan,
            "naan_cost"    => $naanCost,
            "subtotal"     => $subtotal,
            "tax"          => $tax,
            "total"        => $grandTotal,
            "pickup_time"  => date("g:i A", strtotime("+25 minutes"))
        ];
    }
}
?>

<div class="container section-block">
    <div class="page-header">
        <h1>Our South Asian Menu</h1>
        <p>Filter by category below or scroll down to test our instant PHP Takeout Order Simulator.</p>
    </div>

    <!-- Category Filter Bar ($_GET links) -->
    <div class="filter-bar">
        <?php
        $categories = ['All', 'Biryani & Mains', 'Vegetarian', 'Street Chaat & Breads', 'Chai & Desserts'];
        foreach ($categories as $cat):
            $activeClass = ($selectedCategory === $cat) ? 'btn-filter active' : 'btn-filter';
        ?>
            <a href="menu.php?category=<?php echo urlencode($cat); ?>" class="<?php echo $activeClass; ?>">
                <?php echo htmlspecialchars($cat); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Dynamic Menu Grid -->
    <div class="menu-grid">
        <?php foreach ($menuItems as $item): ?>
            <?php
            // Only display items matching the selected category (or all if 'All' is selected)
            if ($selectedCategory !== 'All' && $item['category'] !== $selectedCategory) {
                continue;
            }
            ?>
            <div class="menu-card">
                <div class="menu-card-top">
                    <span class="category-pill"><?php echo htmlspecialchars($item['category']); ?></span>
                    <span class="spice-pill">Spice: <?php echo htmlspecialchars($item['spice']); ?></span>
                </div>
                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                <p><?php echo htmlspecialchars($item['desc']); ?></p>
                <div class="menu-card-bottom">
                    <span class="dish-price">$<?php echo number_format($item['price'], 2); ?></span>
                    <a href="#order-form" class="text-link">Select in Order Form &darr;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr class="section-divider">

    <!-- Quick Takeout Order Simulator ($_POST) - No Database Required -->
    <section id="order-form" class="order-section">
        <div class="order-grid">
            <!-- Left side is The Order Form -->
            <div class="order-form-box">
                <h2>Quick Takeout Order Simulator</h2>
                <p>Place a test order below! PHP will calculate <code>
                </code> and generate an instant pickup receipt example on the right.</p>

                <?php if (!empty($orderError)): ?>
                    <div class="alert-error"><?php echo htmlspecialchars($orderError); ?></div>
                <?php endif; ?>

                <form action="menu.php#order-form" method="POST" class="takeout-form">
                    <div class="form-group">
                        <label for="customer_name">Your Name for Pickup:</label>
                        <input type="text" id="customer_name" name="customer_name" placeholder="e.g., John Doe" required>
                    </div>

                    <div class="form-group">
                        <label for="dish_id">Choose Your Dish:</label>
                        <select id="dish_id" name="dish_id" required>
                            <?php foreach ($menuItems as $item): ?>
                                <option value="<?php echo htmlspecialchars($item['id']); ?>">
                                    <?php echo htmlspecialchars($item['name']); ?> ($<?php echo number_format($item['price'], 2); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="20" required>
                        </div>

                        <div class="form-group">
                            <label for="spice_pref">Custom Spice Level:</label>
                            <select id="spice_pref" name="spice_pref">
                                <option value="Mild">Mild (Light Spice)</option>
                                <option value="Medium" selected>Medium (Traditional)</option>
                                <option value="Spicy">Spicy (Desi Hot)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group checkbox-group">
                        <label>
                            <input type="checkbox" name="add_naan" value="1">
                            Add Fresh Tandoori Garlic Naan (+$4.25 per order)
                        </label>
                    </div>

                    <button type="submit" name="submit_order" class="btn btn-primary btn-full">
                        Calculate &amp; Place Takeout Order
                    </button>
                </form>
            </div>

            <!-- Right Side Dynamic PHP Receipt Output -->
            <div class="receipt-box">
                <?php if ($orderReceipt): ?>
                    <div class="receipt-card active-receipt">
                        <span class="receipt-badge">&#10003; Order Confirmed</span>
                        <h3>Takeout Receipt #<?php echo htmlspecialchars($orderReceipt['order_number']); ?></h3>
                        <p class="receipt-sub">Prepared for: <strong><?php echo htmlspecialchars($orderReceipt['customer']); ?></strong></p>
                        <hr>
                        <ul class="receipt-lines">
                            <li>
                                <span><?php echo $orderReceipt['quantity']; ?>x <?php echo htmlspecialchars($orderReceipt['dish_name']); ?></span>
                                <strong>$<?php echo number_format($orderReceipt['unit_price'] * $orderReceipt['quantity'], 2); ?></strong>
                            </li>
                            <li>
                                <span>Spice Level Requested:</span>
                                <strong><?php echo htmlspecialchars($orderReceipt['spice_pref']); ?></strong>
                            </li>
                            <?php if ($orderReceipt['add_naan']): ?>
                                <li>
                                    <span><?php echo $orderReceipt['quantity']; ?>x Add-on Garlic Naan</span>
                                    <strong>$<?php echo number_format($orderReceipt['naan_cost'], 2); ?></strong>
                                </li>
                            <?php endif; ?>
                            <li class="receipt-divider">
                                <span>Subtotal:</span>
                                <span>$<?php echo number_format($orderReceipt['subtotal'], 2); ?></span>
                            </li>
                            <li>
                                <span>NYC Sales Tax (8.875%):</span>
                                <span>$<?php echo number_format($orderReceipt['tax'], 2); ?></span>
                            </li>
                            <li class="receipt-total">
                                <span>Total Due at Pickup:</span>
                                <strong>$<?php echo number_format($orderReceipt['total'], 2); ?></strong>
                            </li>
                        </ul>
                        <div class="pickup-estimate">
                            Estimated Ready Time: <strong><?php echo htmlspecialchars($orderReceipt['pickup_time']); ?></strong>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="receipt-card placeholder-receipt">
                        <h3>Your Live Order Summary</h3>
                        <p>Fill out the form on the left and click <strong>"Calculate &amp; Place Takeout Order"</strong> to see PHP dynamically calculate your subtotal, NYC tax, and estimated pickup time right here.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php
// this include the reusable footer file just like every page
include('footer.php');
?>