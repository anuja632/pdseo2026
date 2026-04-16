<?php
$postsFile = __DIR__ . '/data/posts.json';
$posts = [];
if (file_exists($postsFile)) {
    $json = file_get_contents($postsFile);
    $posts = json_decode($json, true) ?: [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <!--Gtag for googleAds -->
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17145412681"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-17145412681');
</script>
    <!-- Google tag (gtag.js) Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2CK2HZB8MD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2CK2HZB8MD');
</script>
<!--microsoft clarity-->
 <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "ru1tdgtgbp");
</script>
<meta name="robots" content="index,follow">
<link rel="canonical" href="https://www.puzzlediplomats.com/blog.php">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blogs | Puzzle Diplomats Insights on Real Estate Marketing & Technology</title>
  <meta name="description" content="Puzzle Diplomats — Coimbatore's trusted real estate marketing experts. Generate quality leads, boost property visibility & grow your sales. Get started today!">
  <link href="https://fonts.googleapis.com/css2?family=Sofia+Pro:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Volkgarie:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="./assets/css/style.css" rel="stylesheet">
  <link href="/assets/images/PD-Fav.png" type="image/png" rel="icon">
  <style>
    /* Fixed image dimensions for blog cards */
    .blog-card .card-img-top {
      width: 100%;
      height: 350px;
      object-fit: cover;
      object-position: center;
      background-color: #f5f5f5; /* Fallback background */
    }
    
    /* Default image if none provided */
    .blog-card .card-img-top[src=""] {
      content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 600" fill="%23e0e0e0"><rect width="100%" height="100%"/><text x="50%" y="50%" font-family="Arial" font-size="24" text-anchor="middle" dominant-baseline="middle" fill="%23999">No Image</text></svg>');
    }
    
    /* Read More functionality */
    .blog-excerpt {
      position: relative;
      max-height: 4.5em; /* 3 lines (1.5em line-height * 3) */
      overflow: hidden;
      margin-bottom: 1.5em;
      line-height: 1.5em;
    }
    
    .blog-excerpt:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 1.5em;
      background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
      pointer-events: none;
    }
    
    .blog-excerpt.expanded {
      max-height: none;
    }
    
    .blog-excerpt.expanded:after {
      display: none;
    }
    
    .read-more {
      color: #0066cc;
      text-decoration: none;
      font-weight: 500;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      margin-top: 5px;
    }
    
    .read-more:hover {
      text-decoration: underline;
    }
    
    .read-more i {
      margin-left: 5px;
      transition: transform 0.3s;
    }
    
    .read-more.expanded i {
      transform: rotate(90deg);
    }
  </style>
    <!-- Google tag (gtag.js) Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2CK2HZB8MD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2CK2HZB8MD');
</script>
<!--microsoft clarity-->
 <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "ru1tdgtgbp");
</script>
</head>
<body>
 <nav class="navbar navbar-expand-lg fixed-top " id="custom-navbar">
  <div class="container-fluid">

    <!-- White angled logo section -->
    <div class="logo-section">
      <img src="./assets/images/logo.png" alt="Logo">
    </div>

    <!-- Mobile toggle button -->
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desktop nav links -->
    <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
            <!-- SERVICES MOBILE -->


        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
    Services
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="socialmarketing.html">Social Media Marketing</a></li>
    <li><a class="dropdown-item" href="websitedevelopment.html">Website Design & Development</a></li>
    <li><a class="dropdown-item" href="logodesign.html">Logo Designing</a></li>
    <li><a class="dropdown-item" href="seo.html">SEO</a></li>
    <li><a class="dropdown-item" href="emailmarketing.html">Email Marketing</a></li>
    <li><a class="dropdown-item" href="whatsappmarketing.html">Whatsapp Marketing</a></li>
    <li><a class="dropdown-item" href="salescrmservice.html">Sales CRM Service</a></li>
  </ul>
</li>
      </li>
        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
      </ul>
    </div>

    <!-- Register button for desktop -->
    <div class="d-none d-lg-flex align-items-center pe-4">
         <a href="contact.html" class="register-btn  wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
        REGISTER NOW →
      </a>
    </div>
  </div>
</nav>


<!-- ===== OFFCANVAS MOBILE MENU ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
  
  <!-- Header -->
  <div class="offcanvas-header border-bottom">
    <img src="./assets/images/logo.png" alt="Logo" style="height:40px;">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <!-- Body -->
  <div class="offcanvas-body">

    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fa-solid fa-house me-2"></i> Home
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="about.html">
          <i class="fa-solid fa-user me-2"></i> About Us
        </a>
      </li>

      <!-- SERVICES DROPDOWN -->
      <li class="nav-item">
        <a class="nav-link d-flex  align-items-center"
           data-bs-toggle="collapse"
           href="#mobileServices">
           
          <span>
            <i class="fa-solid fa-briefcase me-2"></i> Services
          </span>

          <i class="fa-solid fa-chevron-down"></i>
        </a>

        <div class="collapse ps-3" id="mobileServices">
          <ul class="list-unstyled">

            <li><a class="nav-link" href="socialmarketing.html">Social Media Marketing</a></li>

            <li><a class="nav-link" href="websitedevelopment.html">Website Design & Development</a></li>

            <li><a class="nav-link" href="whatsappmarketing.html">WhatsApp Marketing</a></li>

            <li><a class="nav-link" href="seo.html">SEO</a></li>

            <li><a class="nav-link" href="salescrmservice.html">Sales CRM Service</a></li>

            <li><a class="nav-link" href="emailmarketing.html">Email Marketing</a></li>

            <li><a class="nav-link" href="logodesign.html">Logo Designing</a></li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="blog.php">
          <i class="fa-solid fa-blog me-2"></i> Blog
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="contact.html">
          <i class="fa-solid fa-envelope me-2"></i> Contact Us
        </a>
      </li>

    </ul>

    <!-- CTA Button -->
    <div class="mt-4 text-center">
      <a href="contact.html" class="register-btn w-100">
        REGISTER NOW →
      </a>
    </div>

  </div>
</div>
  <section class="about-banner blog-banner">
    <div class="container">
      <h1>Insights that move <span>real estate</span> forward.</h1>
      <p>Stay updated with strategies, market trends, and growth ideas from Puzzle Diplomats.</p>
    </div>
  </section>

  <section class="py-5 blog-list-section">
    <div class="container">
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <h2 class="section-title" id="latestArticlesHeading">Latest Articles</h2>
        </div>
      </div>

      <div class="row g-4">
        <?php if (empty($posts)): ?>
          <div class="col-12 text-center text-muted">No blog posts yet. Please add posts from the admin panel.</div>
        <?php else: ?>
          <?php 
          // Reverse the array to show newest first and get array keys
          $reversedPosts = array_reverse($posts, true);
          foreach ($reversedPosts as $index => $post): 
            // Use the index as the post ID if no ID is set
            $postId = $index;
            // Ensure the post is an array
            $post = is_array($post) ? $post : [];
          ?>
            <div class="col-md-4">
              <div class="card h-100 blog-card">
                <?php if (!empty($post['image'])): ?>
                    <div style="width: 100%; height: 350px; background-color: #f5f5f5; border-radius: 8px; overflow: hidden;">
                        <img src="<?php echo htmlspecialchars($post['image']); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($post['title']); ?>"
                             loading="lazy"
                             width="400"
                             height="250"
                             decoding="async"
                             style="width: 100%; height: 100%; object-fit: cover; display: block;"
                             onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MDAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgNDAwIDI1MCI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0iI2Y1ZjVmNSIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTQiIGZpbGw9IiM5OTkiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGR5PSIuM2VtIj5JbWFnZSBub3QgYXZhaWxhYmxlPC90ZXh0Pjwvc3ZnPg==';">
                    </div>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                  <?php if (!empty($post['category'])): ?>
                    <span class="badge cta-btn mb-2"><?php echo htmlspecialchars($post['category']); ?></span>
                  <?php endif; ?>
                  <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                  <div class="blog-content">
                    <p class="card-text small flex-grow-1 blog-excerpt">
                      <?php echo nl2br(htmlspecialchars($post['excerpt'])); ?>
                    </p>
                    <a href="blog-details.php?id=<?php echo urlencode($index); ?>" class="read-more">
                      <span>Read More</span>
                      <i class="fas fa-arrow-right"></i>
                    </a>
                  </div>
                  <?php if (!empty($post['date'])): ?>
                    <p class="text-muted small mb-1">Published: <?php echo htmlspecialchars($post['date']); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
<style>/* Phone Links */
.footer-contact a {
  color: #ddd !important;
  text-decoration: none;
}

.footer-contact a:hover {
  color: #00c6ff;
}
</style>
<!-- ===== Footer Section Start ===== -->
<footer class="footer-section text-white">
  <div class="container g-5">
    <div class="row g-4">

      <!-- Brand Info -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo mb-3">
          <img src="./assets/images/logo.png" alt="Puzzle Diplomats Logo" class="img-fluid">
        </div>
        <p>
          We help real estate brands grow with strategy, creative content, and performance marketing —
          turning your projects into profitable success stories.
        </p>

        <div class="social-links mt-3">
          <a href="https://www.facebook.com/people/Puzzle-Diplomats/" target="_blank">
            <i class="fa-brands fa-facebook-f"></i>
          </a>

          <a href="https://www.linkedin.com/company/puzzlediplomats" target="_blank">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>

          <a href="https://www.instagram.com/puzzlediplomatsads/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
          </a>

          <a href="https://wa.me/917094858696" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h5 class="fw-bold mb-3">Quick Links</h5>
        <ul class="list-unstyled footer-links">

          <li class="mb-2">
            <a href="index.html"><i class="fa-solid fa-house me-2"></i> Home</a>
          </li>

          <li class="mb-2">
            <a href="about.html"><i class="fa-solid fa-user me-2"></i> About</a>
          </li>

          <!-- <li class="mb-2">
            <a href="service.html"><i class="fa-solid fa-briefcase me-2"></i> Services</a>
          </li> -->

          <li class="mb-2">
            <a href="blog.php"><i class="fa-solid fa-blog me-2"></i> Blog</a>
          </li>

          <li>
            <a href="contact.html"><i class="fa-solid fa-envelope me-2"></i> Contact</a>
          </li>

        </ul>
      </div>

      <!-- Services -->
      <div class="col-lg-3 col-md-6">
        <h5 class="fw-bold mb-3">Services</h5>
        <ul class="list-unstyled footer-links">

          <li class="mb-2">
            <a href="socialmarketing.html">
              <i class="fa-solid fa-bullhorn me-2"></i> Social Media Marketing
            </a>
          </li>

          <li class="mb-2">
            <a href="websitedevelopment.html">
              <i class="fa-solid fa-code me-2"></i> Website Development
            </a>
          </li>

          <li class="mb-2">
            <a href="whatsappmarketing.html">
              <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Marketing
            </a>
          </li>

          <li class="mb-2">
            <a href="seo.html">
              <i class="fa-solid fa-chart-line me-2"></i> SEO
            </a>
          </li>

          <li class="mb-2">
            <a href="salescrmservice.html">
              <i class="fa-solid fa-database me-2"></i> Sales CRM
            </a>
          </li>

          <li class="mb-2">
            <a href="emailmarketing.html">
              <i class="fa-solid fa-envelope-open-text me-2"></i> Email Marketing
            </a>
          </li>

        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-4 col-md-6">
        <h5 class="fw-bold mb-3">Get In Touch</h5>
        <ul class="list-unstyled footer-contact">

          <li class="mb-2">
            <i class="fa-solid fa-building me-2"></i>
            <strong>Head Office:</strong> Coimbatore
          </li>

          <li class="mb-2">
            <i class="fa-solid fa-map-location-dot me-2"></i>
            <strong>Branches:</strong> Bangalore, Chennai, Dubai
          </li>

          <li class="mb-2">
            <i class="fa-solid fa-envelope me-2"></i>
            manager@puzzlediplomats.com
          </li>

          <li class="mb-2">
            <i class="fa-solid fa-phone me-2"></i>
            <strong>India:</strong><a href="tel:+917094858696" class="d-block">+91 7094858696</a>
            
            <a href="tel:+918778915403" class="d-block">+91 8778915403</a>
          </li>

          <li>
            <i class="fa-solid fa-globe me-2"></i>
            <strong>UAE:</strong>
            <a href="tel:+971504092758">+971 50 409 2758</a>
          </li>

        </ul>
      </div>

    </div>

    <hr class="my-4">

    <div class="row text-center">
      <div class="col-12">
        <p class="mb-0 small">
          &copy; 2026  Puzzle Diplomats. All Rights Reserved. Empowering Real Estate Growth from Coimbatore.
        </p>
      </div>
    </div>

  </div>
</footer>
<!-- ===== Footer Section End ===== -->


  <div class="floating-icons">
    <a href="tel:+917094858696" class="float-btn phone-btn" title="Call Now">
      <i class="fa-solid fa-phone"></i>
    </a>
    <a href="https://wa.me/917094858696?text=Hello%20Puzzle%20Diplomats%2C%20I%20want%20to%20inquire%20about%20your%20services." target="_blank" class="float-btn whatsapp-btn" title="Chat on WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
    </a>
    <button class="float-btn scroll-top-btn" id="scrollTopBtn" title="Go to top">
      <i class="fa-solid fa-arrow-up"></i>
    </button>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script>
    new WOW({ boxClass: 'wow', animateClass: 'animate__animated', offset: 0, mobile: true, live: true }).init();

    // Hide the "Latest Articles" heading once it reaches the fixed navbar
    document.addEventListener('scroll', function () {
      const heading = document.getElementById('latestArticlesHeading');
      const navbar = document.getElementById('custom-navbar');
      if (!heading || !navbar) return;

      const headingRect = heading.getBoundingClientRect();
      const navRect = navbar.getBoundingClientRect();
      const navBottom = navRect.bottom;

      if (headingRect.top < navBottom) {
        heading.style.display = 'none';
      } else {
        heading.style.display = 'block';
      }
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./assets/js/script.js"></script>
  <script src="./assets/js/slide.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Function to handle read more/less toggle
    function toggleReadMore(button) {
      const excerpt = button.previousElementSibling;
      const isExpanded = excerpt.classList.toggle('expanded');
      const arrow = button.querySelector('i');
      
      if (isExpanded) {
        button.querySelector('span').textContent = 'Read Less';
        button.classList.add('expanded');
      } else {
        button.querySelector('span').textContent = 'Read More';
        button.classList.remove('expanded');
        
        // Scroll to show the read more button when collapsing
        button.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    }
    
    // Hide read more buttons for content that doesn't need them
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.blog-excerpt').forEach(excerpt => {
        const content = excerpt.parentElement;
        const readMoreBtn = excerpt.nextElementSibling;
        
        // Only show read more if content overflows
        if (excerpt.scrollHeight <= excerpt.clientHeight) {
          readMoreBtn.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>
