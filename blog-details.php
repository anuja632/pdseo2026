<?php
$postsFile = __DIR__ . '/data/posts.json';
$posts = [];
if (file_exists($postsFile)) {
    $json = file_get_contents($postsFile);
    $posts = json_decode($json, true) ?: [];
}

// Get the post index from the URL
$postIndex = isset($_GET['id']) ? (int)$_GET['id'] : null;
$post = null;

// Get the post using the index
if ($postIndex !== null && isset($posts[$postIndex])) {
    $post = $posts[$postIndex];
    $post['id'] = $postIndex; // Add the index as ID for consistency
}

// If post not found, redirect to blog page
if (!$post) {
    header('Location: blog.php');
    exit;
}

// Get next and previous posts for navigation
$prevPost = null;
$nextPost = null;
$currentIndex = array_search($postIndex, array_keys($posts));
$postKeys = array_keys($posts);

if ($currentIndex !== false) {
    // Previous post (newer post)
    if (isset($postKeys[$currentIndex - 1])) {
        $prevIndex = $postKeys[$currentIndex - 1];
        $prevPost = $posts[$prevIndex];
        $prevPost['id'] = $prevIndex;
    }
    
    // Next post (older post)
    if (isset($postKeys[$currentIndex + 1])) {
        $nextIndex = $postKeys[$currentIndex + 1];
        $nextPost = $posts[$nextIndex];
        $nextPost['id'] = $nextIndex;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Same head content as blog.php -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title'] ?? 'Blog Post'); ?> | Puzzle Diplomats</title>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="./assets/css/style.css" rel="stylesheet">
   <link href="/assets/images/PD-Fav.png" type="image/png" rel="icon">
   <meta name="robots" content="index,follow">
    <style>
        .blog-header {
            padding: 100px 0 50px;
            background-color: #f8f9fa;
        }
        .blog-content {
            padding: 50px 0;
            line-height: 1.8;
        }
        .blog-post img {
            width: 100%;
            max-width: 100%;
            /* height: 250px; */
            object-fit: cover;
            margin: 15px 0 30px;
            border-radius: 8px;
        }
        .back-to-blog {
            margin-bottom: 30px;
            display: inline-flex;
            align-items: center;
            color: #0066cc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .back-to-blog:hover {
            color: #004d99;
        }
        
        .blog-navigation .btn {
            min-width: 150px;
            text-align: center;
        }
        
        .blog-navigation .btn i {
            transition: transform 0.3s;
        }
        
        .blog-navigation .btn:hover i.fa-arrow-right {
            transform: translateX(3px);
        }
        
        .blog-navigation .btn:hover i.fa-arrow-left {
            transform: translateX(-3px);
        }
        .back-to-blog:hover {
            text-decoration: underline;
        }
        .back-to-blog i {
            margin-right: 8px;
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

    <!-- Blog Post Content -->
    <div class="container">
        <a href="blog.php" class="back-to-blog mb-4">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>
        
        <!-- Navigation Buttons -->
        <div class="blog-navigation d-flex justify-content-between mb-4">
            <?php if ($prevPost): ?>
                <a href="blog-details.php?id=<?php echo $prevPost['id']; ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i> Newer Post
                </a>
            <?php else: ?>
                <span></span> <!-- Empty span for flex spacing -->
            <?php endif; ?>
            
            <?php if ($nextPost): ?>
                <a href="blog-details.php?id=<?php echo $nextPost['id']; ?>" class="btn btn-outline-primary">
                    Older Post <i class="fas fa-arrow-right ms-2"></i>
                </a>
            <?php endif; ?>
        </div>
        
        <article class="blog-post">
            <header class="blog-header text-center mb-5">
                <div class="container">
                    <?php if (!empty($post['category'])): ?>
                        <span class="badge cta-btn mb-3"><?php echo htmlspecialchars($post['category']); ?></span>
                    <?php endif; ?>
                    <h1 class="display-4 fw-bold"><?php echo htmlspecialchars($post['title']); ?></h1>
                    <?php if (!empty($post['date'])): ?>
                        <p class="text-muted">Published on <?php echo htmlspecialchars($post['date']); ?></p>
                    <?php endif; ?>
                </div>
            </header>

            <div class="row justify-content-center">
                <div class="col-12">
                    <?php if (!empty($post['image'])): ?>
                        <div style="width: 100%; max-height: 500px; background-color: #f5f5f5; border-radius: 8px; overflow: hidden; margin: 20px 0;">
                            <img src="<?php echo htmlspecialchars($post['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                 class="img-fluid"
                                 loading="eager"
                                 width="1200"
                                 height="630"
                                 decoding="async"
                                 fetchpriority="high"
                                 style="width: 100%; height: 100%; object-fit: cover; display: block;"
                                 onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAwIiBoZWlnaHQ9IjYzMCIgdmlld0JveD0iMCAwIDEyMDAgNjMwIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjVmNWY1Ii8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIyNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBhdmFpbGFibGU8L3RleHQ+PC9zdmc+';"
                                 onload="this.style.opacity='1'"
                                 style="opacity:1;transition:opacity 0.1s">
                        </div>
                        <?php if (!empty($post['image_caption'])): ?>
                            <p class="text-muted text-center small mt-2"><?php echo htmlspecialchars($post['image_caption']); ?></p>
                        <?php endif; ?>
                        <style>
                            @media (max-width: 768px) {
                                .image-container {
                                    max-height: 300px !important;
                                }
                            }
                        </style>
                    <?php else: ?>
                        <div class="bg-light rounded mb-4 d-flex align-items-center justify-content-center" style="height: 300px;">
                            <span class="text-muted">No Image Available</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="blog-content">
                        <?php 
                        // Replace newlines with <br> tags and ensure HTML is properly escaped
                        $content = nl2br(htmlspecialchars($post['content'] ?? $post['excerpt']));
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
        </article>
        
        <!-- Navigation Buttons at Bottom -->
        <div class="blog-navigation d-flex justify-content-between mt-5 pt-4 border-top">
            <?php if ($prevPost): ?>
                <a href="blog-details.php?id=<?php echo $prevPost['id']; ?>" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i> Newer: <?php echo htmlspecialchars($prevPost['title']); ?>
                </a>
            <?php else: ?>
                <span></span> <!-- Empty span for flex spacing -->
            <?php endif; ?>
            
            <?php if ($nextPost): ?>
                <a href="blog-details.php?id=<?php echo $nextPost['id']; ?>" class="btn btn-outline-primary">
                    Older: <?php echo htmlspecialchars($nextPost['title']); ?> <i class="fas fa-arrow-right ms-2"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add any necessary JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            // Your JavaScript code here
        });
    </script>
</body>
</html>
