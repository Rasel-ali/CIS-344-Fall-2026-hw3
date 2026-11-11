<?php
/**  this reusable site header included at the top of every main content page.
 * my inspo and referance from the uCertify Chapter 5 Modular PHP with include() */

// Fallback or backcup page title if a content page doesn't set $pageTitle before including header.php
if (!isset($pageTitle)) {
    $pageTitle = "Authentic South Asian Kitchen";
}

// Detect current filename so we can highlight the active link in the navigation bar
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saffron &amp; Spice | <?php echo htmlspecialchars($pageTitle); ?></title>
    
    <!-- I am spliting the CSS Files so that it's not one long file
     so it's style.css for index, and for the other pages I created individual css file for them -->
    <link rel="stylesheet" href="css/style.css">  <!-- for the Base & Home (index.php) styles -->
    <link rel="stylesheet" href="css/header.css"> <!-- Header & Navigation styles -->
    <link rel="stylesheet" href="css/footer.css"> <!-- Footer styles -->
    
    <?php if ($currentPage == 'menu.php'): ?>
        <!-- Only load menu.css when on the Menu page -->
        <link rel="stylesheet" href="css/menu.css">
    <?php endif; ?>
</head>
<body>

    <!-- Top Announcement Bar, Halal sign an imporant thing for muslims costumer so they are sure what they are getting
     an imporant message a lot of costumer for this restaurant will look for this sign so it's good to have it right on top too -->
    <div class="top-bar">
        <span>100% Zabihah Halal Certified &bull; Fresh Clay-Oven Naan &amp; Dum Biryani Daily</span>
    </div>

    <!-- Shared Site Header & Navigation -->
    <header class="site-header">
        <div class="container header-flex">
            <div class="brand">
                <a href="index.php" class="logo">Saffron <span>&amp;</span> Spice</a>
                <p class="tagline">South Asian Kitchen &amp; Chai House</p>
            </div>

            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="menu.php" class="<?php echo ($currentPage == 'menu.php') ? 'active' : ''; ?>">
                            Menu &amp; Quick Order
                        </a>
                    </li>
                    <li>
                        <a href="#footer-info">Hours &amp; Location</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Wrapper (Closed inside footer.php) -->
    <main class="main-content">