<?php
/**
 * footer.php this Reusable site footer included at 
 * the bottom of every main content page.
 */
?>
    </main> <!-- End of .main-content opened in header.php -->

    <!-- Shared Site Footer -->
    <footer id="footer-info" class="site-footer">
        <div class="container footer-grid">
            <!-- Column 1: About -->
            <div class="footer-col">
                <h3>Saffron &amp; Spice Kitchen</h3>
                <p>Bringing traditional South Asian 
                slow-cooked biryanis, smoky tandoori kebabs, and 
                street-style chaat to the heart of Bronx.</p>
            </div>

            <!-- Column 2 display Dining Hours -->
            <div class="footer-col">
                <h3>Kitchen Hours</h3>
                <ul class="footer-list">
                    <li><strong>Mon – Thu:</strong> 11:30 AM – 10:00 PM</li>
                    <li><strong>Fri – Sat:</strong> 11:00 AM – 11:30 PM</li>
                    <li><strong>Sunday:</strong> 12:00 PM – 9:30 PM</li>
                    <li><strong>NOTE:</strong> Please check google map for Holiday Hours and Closure.</li>
                </ul>
            </div>

            <!-- Column 3 it shows the Contact & Location -->
            <div class="footer-col">
                <h3>Visit or Call</h3>
                <p>1029 Small Street, Bronx , NY</p>
                <p>Phone: (718) 555-0194</p>
                <p>Email: hello@saffronandspice.local</p>
            </div>
        </div>

        <div class="footer-bottom">
            <!-- PHP date('Y') dynamically prints the current year so no need to manual edit-->
            <p>&copy; <?php echo date("Y"); ?> Saffron &amp; Spice South Asian Kitchen.(All Rights Reserved).</p>
        </div>
    </footer>

</body>
</html>