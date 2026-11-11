# CIS 344 - Fall 2026 - Homework 3
**Project:** Homework 3  PHP Web Application (Separate Header & Footer)  
**Theme:** Saffron & Spice - South Asian Kitchen & Chai House  
**Author:** Rasel Ali  

---

## Project Overview
This project demonstrates modular web development in PHP by separating common layout elements into reusable `header.php` and `footer.php` template files. Both main content pages (`index.php` and `menu.php`) integrate these files using PHP's `include()` function to maintain a consistent design and navigation structure across the site.

## Key Features
* **Modular PHP Architecture:** Uses `include('header.php')` and `include('footer.php')` on all pages, along with dynamic `<title>` tags and active navigation link highlighting.
* **Dynamic Chef's Daily Special (`index.php`):** Uses PHP's `date("l")` function and an associative array to automatically display a featured South Asian dish based on the current day of the week.
* **Interactive Menu & Category Filter (`menu.php`):** Stores dishes in a structured PHP array and lets users filter dishes by category (*Biryani & Mains*, *Vegetarian*, *Street Chaat & Breads*, *Chai & Desserts*) via `$_GET` query parameters.
  **I added this price calculator** is because I think people in general like transparency with prices so this helps them figure out what to get and saves time and energy in a real life situation.
* **Quick Takeout Order Simulator (`menu.php`):** Processes user input via `$_POST` to dynamically calculate item subtotals, add-ons, NYC sales tax (8.875%), and an estimated pickup time without requiring external database setup.
* **Modular CSS (`css/`):** Organizes stylesheets into dedicated files for base layout, header, footer, and menu components.

---

## File Structure
```text
CIS-344-Fall-2026-hw3/
├── css/
│   ├── style.css       # Global styles, typography, buttons, and homepage layout
│   ├── header.css      # Top announcement bar, brand logo, and navigation styles
│   ├── footer.css      # 3-column footer layout and copyright bar styles
│   └── menu.css        # Menu grid cards, filter pills, and order receipt styles
├── header.php          # Reusable top template (HTML head, logo, navigation bar)
├── footer.php          # Reusable bottom template (hours, location, dynamic year)
├── index.php           # Main landing page (hero banner, dynamic daily special)
├── menu.php            # Second content page (filterable menu & $_POST order simulator)
└── README.md           # Project documentation
