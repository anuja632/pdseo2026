<?php
session_start();
if (empty($_SESSION['is_admin'])) {
    header('Location: login.php');
    exit;
}

$postsFile = __DIR__ . '/data/posts.json';
if (!file_exists(dirname($postsFile))) {
    mkdir(dirname($postsFile), 0777, true);
}
if (!file_exists($postsFile)) {
    file_put_contents($postsFile, '[]');
}

function getPosts($file) {
    $json = file_get_contents($file);
    return json_decode($json, true) ?: [];
}

function savePosts($file, $posts) {
    file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $posts = getPosts($postsFile);

    if ($action === 'save') {
        $id = $_POST['id'] !== '' ? (int)$_POST['id'] : null;
        $existing = ($id !== null && isset($posts[$id])) ? $posts[$id] : null;

        $uploadDir = __DIR__ . '/assets/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imagePath = $existing['image'] ?? '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $origName = basename($_FILES['image']['name']);
            $ext = pathinfo($origName, PATHINFO_EXTENSION);
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '', pathinfo($origName, PATHINFO_FILENAME)) . ($ext ? '.' . $ext : '');
            $destPath = $uploadDir . '/' . $fileName;
            if (move_uploaded_file($tmpName, $destPath)) {
                $imagePath = 'assets/uploads/' . $fileName;
            }
        }

        $payload = [
            'title' => trim($_POST['title'] ?? ''),
            'category' => trim($_POST['category'] ?? ''),
            'image' => $imagePath,
            'excerpt' => trim($_POST['excerpt'] ?? ''),
        ];

        if ($id !== null && isset($posts[$id])) {
            $payload['date'] = $existing['date'] ?? date('Y-m-d');
            $posts[$id] = $payload;
        } else {
            $payload['date'] = date('Y-m-d');
            $posts[] = $payload;
        }
        savePosts($postsFile, $posts);
        header('Location: admin.php');
        exit;
    } elseif ($action === 'delete') {
        $id = (int)($_POST['id'] ?? -1);
        if (isset($posts[$id])) {
            array_splice($posts, $id, 1);
            savePosts($postsFile, $posts);
        }
        header('Location: admin.php');
        exit;
    } elseif ($action === 'logout') {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}

$posts = getPosts($postsFile);
$editIndex = isset($_GET['edit']) ? (int)$_GET['edit'] : null;
$editPost = ($editIndex !== null && isset($posts[$editIndex])) ? $posts[$editIndex] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Puzzle Diplomats - Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Sofia+Pro:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Volkgarie:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="./assets/css/style.css" rel="stylesheet">
  <style>
    body { background: #f5f7fb; }
    .admin-header { background:#0b1f23; color:#fff; padding:14px 20px; display:flex; align-items:center; justify-content:space-between; }
    .admin-header .brand { display:flex; align-items:center; gap:10px; }
    .admin-header img { height:40px; }
    .logout-btn { border-radius:999px; padding:8px 18px; font-size:0.9rem; }
    .admin-main { padding:24px 16px; }
    .card-header { background:#fff; border-bottom:none; }
    .table thead th { font-size:0.85rem; text-transform:uppercase; color:#6c757d; }
    .badge-category { font-size:0.75rem; }
  </style>
</head>
<body>
  <header class="admin-header">
    <div class="brand">
      <img src="./assets/images/logo.png" alt="Puzzle Diplomats">
      <div>
        <div style="font-weight:700; font-size:1.05rem;">Admin Dashboard</div>
        <small>Manage blog posts</small>
      </div>
    </div>
    <div>
      <a href="blog.php" class="btn btn-outline-light btn-sm me-2">View Blog</a>
      <form method="post" class="d-inline">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-danger btn-sm logout-btn">Logout</button>
      </form>
    </div>
  </header>

  <main class="admin-main container-fluid">
    <div class="row g-3">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header"><strong><?php echo $editPost ? 'Edit Post' : 'Create Post'; ?></strong></div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="action" value="save">
              <input type="hidden" name="id" value="<?php echo $editPost ? $editIndex : ''; ?>">
              <div class="mb-2">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $editPost ? htmlspecialchars($editPost['title']) : ''; ?>" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Category</label>
                <input type="text" class="form-control" name="category" placeholder="e.g., Real Estate Marketing" value="<?php echo $editPost ? htmlspecialchars($editPost['category']) : ''; ?>" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" value="<?php echo $editPost ? htmlspecialchars($editPost['date']) : date('Y-m-d'); ?>" readonly>
              </div>
              <div class="mb-2">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
                <?php if ($editPost && !empty($editPost['image'])): ?>
                  <small class="text-muted d-block mt-1">Current: <?php echo htmlspecialchars($editPost['image']); ?></small>
                <?php endif; ?>
              </div>
              <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea class="form-control" name="excerpt" rows="3" required><?php echo $editPost ? htmlspecialchars($editPost['excerpt']) : ''; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary w-100">Save Post</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Existing Posts</strong>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($posts)): ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">No posts yet. Add your first blog post.</td></tr>
                  <?php else: ?>
                    <?php foreach ($posts as $index => $p): ?>
                      <tr>
                        <td><?php echo htmlspecialchars($p['title']); ?></td>
                        <td><span class="badge bg-secondary badge-category"><?php echo htmlspecialchars($p['category']); ?></span></td>
                        <td><?php echo htmlspecialchars($p['date']); ?></td>
                        <td>
                          <a href="admin.php?edit=<?php echo $index; ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                          <form method="post" class="d-inline" onsubmit="return confirm('Delete this post?');">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $index; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
