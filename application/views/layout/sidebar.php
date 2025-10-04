<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title) ? $title : 'App' ?></title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: #2c3e50;
            color: #fff;
            height: 100vh;
            padding: 20px 10px;
        }
        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Bank Sampah</h2>
        <a href="<?= site_url('dashboard') ?>">📊 Dashboard</a>
        <a href="<?= site_url('dashboard/profile') ?>">👤 Profile</a>
		<a href="<?= site_url('auth/bank_sampah') ?>">bank sampah saya</a>
        <a href="<?= site_url('auth/logout') ?>">🚪 Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <?php $this->load->view($content); ?>
    </div>
</body>
</html>
