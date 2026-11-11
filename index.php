<?php
/** my main landing page featuring dynamic Chef's Daily Special and restaurant story.
 * Uses PHP include() to attach header.php and footer.php.
 */

// 1. Set the dynamic title for header.php
$pageTitle = "Home";

// 2. Include the reusable header file
include('header.php');

// 3. Dynamic PHP logic: Determine Chef's Daily Special based on the day of the week
$dayOfWeek = date("l"); // e.g., Monday, Tuesday, etc.

$dailySpecials = [
    "Monday"    => ["dish" => "Karachi Beef Nihari", "price" => "$17.95", "desc" => "Slow-simmered overnight beef shank stew garnished with fresh ginger, cilantro, and green chilies."],
    "Tuesday"   => ["dish" => "Hyderabadi Chicken Dum Biryani", "price" => "$15.95", "desc" => "Aromatic aged basmati rice layered with spiced chicken, caramelized onions, and saffron milk, sealed and slow-cooked."],
    "Wednesday" => ["dish" => "Smoky Tandoori Lamb Chops", "price" => "$21.95", "desc" => "Tender rack of lamb marinated in hung yogurt, Kashmiri chili, and roasted cumin, char-grilled in our clay oven."],
    "Thursday"  => ["dish" => "Old Delhi Butter Chicken & Garlic Naan", "price" => "$16.50", "desc" => "Charcoal-roasted chicken tikka simmered in a velvety fenugreek and heirloom tomato cream sauce."],
    "Friday"    => ["dish" => "Shahi Kacchi Goat Biryani", "price" => "$18.95", "desc" => "Weekend special! Traditional Dhaka-style biryani with tender marinated goat, baby potatoes, and toasted whole spices."],
    "Saturday"  => ["dish" => "Grand Royal Thali Platter", "price" => "$22.95", "desc" => "A feast featuring 2 curries, dal makhani, seekh kebab, raita, basmati rice, garlic naan, and warm gulab jamun."],
    "Sunday"    => ["dish" => "Halwa Puri & Chana Masala Feast", "price" => "$14.50", "desc" => "Fluffy golden fried bread served with spiced chickpea curry, tangy potato bhaji, and sweet cardamom semolina halwa."]
];

// Pick today's special (fallback to Tuesday if needed)
$todaysSpecial = isset($dailySpecials[$dayOfWeek]) ? $dailySpecials[$dayOfWeek] : $dailySpecials["Tuesday"];
?>

<!-- Hero Banner Section -->
<section class="hero">
    <div class="container hero-content">
        <span class="badge">Welcome to Saffron &amp; Spice</span>
        <h1>Bold Spices, Slow-Cooked Tradition</h1>
        <p>From fragrant saffron-infused Dum Biryani to smoky clay-oven Tandoori and freshly brewed Masala Chai, every dish is crafted from scratch using whole, freshly ground spices.</p>
        <div class="hero-buttons">
            <a href="menu.php" class="btn btn-primary">Explore Menu &amp; Order</a>
            <a href="#specials" class="btn btn-secondary">View Today's Special</a>
        </div>
    </div>
</section>

<!This dynamic php section is for Chef's Special of the Day Section -->
<section id="specials" class="container section-block">
    <div class="special-banner">
        <div class="special-text">
            <span class="day-tag">&#9733; <?php echo htmlspecialchars($dayOfWeek); ?> Chef's Special</span>
            <h2><?php echo htmlspecialchars($todaysSpecial['dish']); ?></h2>
            <p><?php echo htmlspecialchars($todaysSpecial['desc']); ?></p>
        </div>
        <div class="special-price-box">
            <span class="price-label">Special Price</span>
            <span class="price-amount"><?php echo htmlspecialchars($todaysSpecial['price']); ?></span>
            <a href="menu.php#order-form" class="btn btn-primary">Order Takeout</a>
        </div>
    </div>
</section>

<!-- Restaurant Highlights Grid -->
<section class="container section-block">
    <h2 class="section-title">What Makes Our Kitchen Special</h2>
    <div class="card-grid">
        <div class="info-card">
            <h3>Authentic Dum Pukht Cooking</h3>
            <p>Our biryanis are sealed in heavy-bottomed handis so the saffron steam locks in every layer of spice and tenderness.</p>
        </div>
        <div class="info-card">
            <h3>Traditional Clay Tandoor</h3>
            <p>Fired up to 800&deg;F, our clay oven blisters garlic naan to perfection and gives our kebabs an unmistakable smoky char.</p>
        </div>
        <div class="info-card">
            <h3>House-Ground Masala &amp; Chai</h3>
            <p>We roast and grind green cardamom, cinnamon, cloves, and black pepper daily for our curries and signature Karak Chai.</p>
        </div>
    </div>
</section>

<?php
// 4. Include the reusable footer file
include('footer.php');
?>