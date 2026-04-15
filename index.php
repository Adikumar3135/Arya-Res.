<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arya Res</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Epunda+Slab:ital,wght@0,300..900;1,300..900&family=Licorice&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Epunda+Slab:ital,wght@0,300..900;1,300..900&family=Licorice&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header class="header">
        <nav>
            <!-- Logo -->
            <h1>Arya Res.</h1>

            <!-- Hamburger Menu Icon -->
            <i class="fa-solid fa-bars" id="mobile-menu"></i>

            <!-- Navigation Links -->
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#occasion">Events</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#booking">Book Table</a></li>
            </ul>

            <!-- Cart -->
            <div class="add-to-cart">
                <a href="cart/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </nav>
    </header>

    <section class="hero-banner" id="home">
        <div class="content">
            <h1>Enjoy Your Healthy Delicious Food</h1>
            <p>We are team of talented designers making websites with Bootstrap</p>
            <div class="btns">
                <a href="#booking"> Book My Table</a>
                <a href="menu.php"> View foods</a>
            </div>
        </div>
        <div class="banner-img">
            <img src="Data/main-img.png" alt="">
        </div>
    </section>

    <section class="about" id="about">
        <h5>About Us</h5>
        <h1>LETS LEARN MORE ABOUT US</h1>
        <div class="about-content">
            <div class="about-img">
                <img src="Data/about-img.jpg" alt="">
            </div>
            <div class="about-text">
                <p>Welcome to Arya Restaurant, where every meal is a celebration of taste, tradition, and togetherness.
                    We believe that great food brings people closer, and that’s exactly what we strive to offer —
                    delicious dishes made with love, fresh ingredients, and authentic flavors.
                </p>
                <p>From the moment you step in, you’ll be greeted with a cozy ambiance, friendly smiles, and the
                    mouth-watering aroma of our signature recipes. Our chefs bring passion to every plate, blending
                    classic cooking techniques with a modern touch to create an unforgettable dining experience.
                </p>
                <p>Whether you’re here for a family dinner, a quick bite with friends, or a special celebration, Arya
                    Restaurant promises a warm atmosphere, exceptional service, and food that makes you smile.
                </p>
                <p>🍽️ Good Food. Good Mood. Great Memories.</p>
            </div>
        </div>
    </section>

    <section class="sales-section">

        <h5>Today's Special</h5>

        <h1>🔥 Exclusive Offers</h1>

        <div class="sales-container">

            <?php

            require "inc/db.php";

            $result = $mysqli->query("SELECT * FROM offers ORDER BY id DESC LIMIT 6");

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    ?>

                    <div class="sales-card">

                        <img src="<?= $row['image'] ?>">

                        <div class="sales-overlay">

                            <h3><?= $row['title'] ?></h3>

                            <a href="menu.php">Order Now</a>

                        </div>

                    </div>

                <?php }

            } else {

                echo "<p class='no-sales'>No offers available today</p>";

            }

            ?>

        </div>

    </section>
    <section class="choose" id="choose">
        <div class="choose-content-main">
            <h1>Why Choose Me</h1>
            <p>At Arya Restaurant, we don’t just serve food — we create experiences you’ll never forget. Here’s why our
                guests love us:
            </p>
        </div>

        <div class="choose-content">
            <h1>🍽️</h1>
            <h3>Authentic Taste</h3>
            <p>We bring you the real flavors of traditional and modern cuisine, prepared with the freshest ingredients
                and a touch of love.
            </p>
        </div>

        <div class="choose-content">
            <h1>👨‍🍳</h1>
            <h3>Expert Chefs</h3>
            <p>Our talented chefs craft each dish with care, passion, and creativity to make every bite unforgettable.
            </p>

        </div>

        <div class="choose-content">
            <h1>⚡</h1>
            <h3>Quick & Friendly Service</h3>
            <p>We value your time. That’s why we serve your favorite meals fast — always with a smile.</p>

        </div>

    </section>

    <section class="status" id="status">
        <div class="status-container">
            <div class="status-con-content">
                <span>200</span>
                <h1>Clients</h1>
            </div>
            <div class="status-con-content">
                <span>20</span>
                <h1>Projects</h1>
            </div>
            <div class="status-con-content">
                <span>24</span>
                <h1>Hours Of Support</h1>
            </div>
            <div class="status-con-content">
                <span>20</span>
                <h1>Worker</h1>
            </div>

        </div>
    </section>

    <section class="menu" id="menu">
        <h5>Our Menu</h5>
        <h1>Check Our Arya Menu</h1>
        <div class="menu-nav">
            <ul>
                <li><a href="menu.php">Click Here!</a></li>
            </ul>
        </div>
    </section>

    <section class="reviews" id="reviews">
        <h5>TESTIMONIALS</h5>
        <h1>What Are They Saying About Us</h1>
        <div class="reviews-box">
            <div class="reviews-wrapper">
                <div class="reviews-content">
                    <div class="reviews-text">
                        <p>“Loved the Spring Rolls — light, crunchy and perfectly seasoned. Service was quick and staff
                            were
                            friendly. Will come back for dinner!”
                        </p>
                        <span>— Riya S.</span>
                    </div>
                    <img src="../Data/reviews.jpg" alt="">
                </div>
                <div class="reviews-content">
                    <div class="reviews-text">
                        <p>“Pancakes were fluffy and the coffee was spot on. Portions are generous. Only reason I didn’t
                            give 5
                            stars: could use more vegan options.”
                        </p>
                        <span>— Meera K.</span>
                    </div>
                    <img src="../Data/reviews.jpg" alt="">
                </div>
                <div class="reviews-content">
                    <div class="reviews-text">
                        <p>“Food tasted nice — the Veggie Burger was tasty — but we waited a long time during peak
                            hours.
                            Worth
                            trying at off-peak times.”
                        </p>
                        <span>— Aditya S.</span>
                    </div>
                    <img src="../Data/reviews.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="occasion" id="occasion">
        <div class="occasion-rawper">
            <div class="occasion-container">
                <div class="occasion-content">
                    <img src="https://m.media-amazon.com/images/I/71iuSVGKS2L._AC_UF1000,1000_QL80_.jpg"
                        alt="Birthday Party">
                    <div class="occasion-content-text">
                        <h1>Birthday Party</h1>
                        <h3>$20</h3>
                        <span class="line"></span>
                        <p>
                            Celebrate your special day in style with <strong>delicious food</strong>, vibrant décor, and
                            joyful vibes.
                            From kids’ fun-filled parties to elegant evening celebrations,
                            we make every birthday <em>unforgettable</em> with taste and happiness.
                        </p>
                    </div>
                </div>

                <div class="occasion-content">
                    <img src="https://cdn.shopify.com/s/files/1/0387/2417/files/bright-birthday-party-bonjour-fete-3_2048x2048.jpg?v=1640818986"
                        alt="Custom Party">
                    <div class="occasion-content-text">
                        <h1>Custom Party</h1>
                        <h3>$200</h3>
                        <span class="line"></span>
                        <p>
                            Bring your imagination to life with a <strong>fully customized celebration</strong> — your
                            theme, your style, your way.
                            From décor to dining, every detail is crafted to match your <em>unique vision</em>
                            perfectly.
                        </p>
                    </div>
                </div>

                <div class="occasion-content">
                    <img src="https://image.cdn.shpy.in/337348/1703693913145_SKU-0786_5.jpg?width=600&format=webp"
                        alt="Private Party">
                    <div class="occasion-content-text">
                        <h1>Private Party</h1>
                        <h3>$300</h3>
                        <span class="line"></span>
                        <p>
                            Enjoy an exclusive gathering in a <strong>cozy, elegant setting</strong> designed for you
                            and
                            your loved ones.
                            Whether it’s a reunion or a private dinner, we promise a <em>relaxed ambiance</em> and
                            exceptional service.
                        </p>
                    </div>
                </div>

                <div class="occasion-content">
                    <img src="https://asparklylifeforme.com/wp-content/uploads/2025/03/Night-Event-Decor-Black-Gold-Wedding-7.webp"
                        alt="Wedding Party">
                    <div class="occasion-content-text">
                        <h1>Wedding Party</h1>
                        <h3>$400</h3>
                        <span class="line"></span>
                        <p>
                            Celebrate <strong>love, laughter, and new beginnings</strong> with a grand wedding feast at
                            our
                            restaurant.
                            From romantic décor to mouthwatering dishes, we make your special day truly <em>magical and
                                memorable</em>.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="booking" id="booking">
        <h5>Book Table</h5>
        <h1>Book Your Stay With Us</h1>
        <div class="book-content">
            <div class="book-content-img">
                <img src="../Data/reservation.jpg" alt="">
            </div>
            <div class="book-content-form">
                <form action="booking_submit.php" method="post">
                    <input type="text" name="name" placeholder="Enter Your Name:" required />
                    <input type="email" name="email" placeholder="Enter Your Email:" required />
                    <input type="number" name="mobile" placeholder="Enter Your Mobile Number:" required />
                    <input type="date" name="date" placeholder="date" required />
                    <input type="time" name="time" placeholder="time" required />
                    <input type="number" name="people" placeholder="No Of People" required />
                    <textarea name="message" id="message" placeholder="Enter Message"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <section class="gallery" id="gallery">

        <?php

        require "inc/db.php";

        $gallery = $mysqli->query(
            "SELECT * FROM gallery ORDER BY id DESC LIMIT 8"
        )->fetch_all(MYSQLI_ASSOC);

        ?>

        <h5>Gallery</h5>

        <h1>View Our Gallery</h1>

        <div class="gallery-wappery">

            <div class="gallery-container">

                <?php foreach ($gallery as $g): ?>

                    <img src="<?= $g['image'] ?>">

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <section class="contact" id="contact">
        <h5>Contact</h5>
        <h1>Need Help? Contact Us</h1>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242457.85022008597!2d77.04383216338817!3d28.527252326450025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew%20Delhi%2C%20Delhi%2C%20India!5e1!3m2!1sen!2sus!4v1760180163669!5m2!1sen!2sus"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-container">
            <div class="contact-content">
                <div class="div-logo">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h2>Address</h2>
                <p><a href="">New Delhi</a></p>
            </div>
            <div class="contact-content">
                <div class="div-logo">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <h2>Call Us</h2>
                <p><a href="">+91 8252074506</a></p>
            </div>
            <div class="contact-content">
                <div class="div-logo">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <h2>Email</h2>
                <p><a href="">adikumar3135@gmail.com</a></p>
            </div>
            <div class="contact-content">
                <div class="div-logo">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <h2>Opening Hours</h2>
                <p><a href="">10:00 AM - 10:00 PM</a></p>
            </div>
        </div>
    </section>

    <footer class="footer" id="footer">
        <div class="footer-container">

            <!-- Footer Logo / About -->
            <div class="footer-content about">
                <h2>ARYA</h2>
                <p>Enjoy your favorite meals in a cozy ambiance with premium service. Book your table today and taste
                    the difference!</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-content links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#booking">Book Table</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-content contact-info">
                <h2>Contact Info</h2>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i> Kahalgaon, Bhagalpur, Bihar, India</li>
                    <li><i class="fa-solid fa-phone"></i> +91 98765 43210</li>
                    <li><i class="fa-solid fa-envelope"></i> info@arya.com</li>
                    <li><i class="fa-regular fa-clock"></i> Mon - Sun: 9 AM - 11 PM</li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 <span>ARYA Restaurant</span> | All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JS -->
    <script src="main.js"></script>
</body>

</html>