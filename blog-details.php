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
    <!-- Navigation (same as blog.php) -->
    <nav class="navbar navbar-expand-lg fixed-top" id="custom-navbar">
        <div class="container-fluid">
            <div class="logo-section">
                <a href="index.html">
                    <img src="./assets/images/logo.png" alt="Logo">
                </a>
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="d-none d-lg-flex align-items-center pe-4">
                <a href="contact.html" class="register-btn">REGISTER NOW →</a>
            </div>
        </div>
    </nav>

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

    <!-- Footer (same as blog.php) -->
    <footer class="footer-section text-white mt-5">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo mb-3">
                        <img src="./assets/images/logo.png" alt="Puzzle Diplomats Logo" class="img-fluid" />
                    </div>
                    <p>We help real estate brands grow with strategy, creative content, and performance marketing — turning your projects into profitable success stories.</p>
                    <div class="social-links mt-3">
                        <a href="https://www.facebook.com/profile.php?id=61566677074509" target="_blank" class="me-2"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/puzzle-diplomats-digitalmarketing/" target="_blank" class="me-2"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/puzzlediplomatsmarketing/" target="_blank" class="me-2"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://wa.me/917094858696" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="service.html">Services</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Our Solutions</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="service.html">Brand Strategy</a></li>
                        <li><a href="service.html">Content & Creative</a></li>
                        <li><a href="service.html">Lead Generation</a></li>
                        <li><a href="service.html">Performance Marketing</a></li>
                        <li><a href="service.html">Web Development</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Get In Touch</h5>
                    <ul class="list-unstyled footer-contact">
                        <li class="mb-2"><i class="fa-solid fa-location-dot me-2"></i> Bangalore, Dubai</li>
                        <li class="mb-2"><i class="fa-solid fa-envelope me-2"></i> puzzle@diplomats.co.in</li>
                        <li><i class="fa-solid fa-phone me-2"></i> +91 70948 58696</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <div class="row text-center">
                <div class="col-12">
                    <p class="mb-0 small">&copy; 2025 Puzzle Diplomats. All Rights Reserved. Empowering Real Estate Growth from Bangalore.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add any necessary JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            // Your JavaScript code here
        });
    </script>
</body>
</html>
