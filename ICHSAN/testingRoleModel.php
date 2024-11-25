<?php
session_start();
session_destroy();
require_once 'models/role_model.php';
include 'views/includes/navbar.php';
include 'views/includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        h1, h2 {
            color: #007bff;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .data-item {
            padding: 10px;
            margin-bottom: 15px;
            background: #e9f7ff;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }
        .data-item:nth-child(odd) {
            background: #f0f8ff;
        }
        .data-title {
            font-weight: bold;
            color: #007bff;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            margin: 5px 0;
        }
        .button:hover {
            background: #218838;
        }
        .button.delete {
            background: #dc3545;
        }
        .button.delete:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Data Stok Barang</h1>
    <h2>== Daftar Barang ==</h2>
    <?php
    $obj_Role = new modelRole();
    foreach ($obj_Role->getAllRoles() as $role) {
        echo "<div class='data-item'>";
        echo "<div class='data-title'>Nomor: ".$role->role_id."</div>";
        echo "<div>Nama Barang: ".$role->role_name."</div>";
        echo "<div>Deskripsi: ".$role->role_desc."</div>";
        echo "<div>Jenis: ".$role->role_status."</div>";
        echo "</div>";
    }
    ?>

    <h2>== Testing stok ==</h2>
    <?php
    $obj_Role->addRole(role_name: "new role", role_description: "testing new role", role_status: 0);
    $obj_Role->addRole(role_name: "very new role", role_description: "testing new new role", role_status: 1);
    foreach ($obj_Role->getAllRoles() as $role) {
        echo "<div class='data-item'>";
        echo "<div class='data-title'>Nomor: ".$role->role_id."</div>";
        echo "<div>Nama Barang: ".$role->role_name."</div>";
        echo "<div>Deskripsi: ".$role->role_desc."</div>";
        echo "<div>Jenis: ".$role->role_status."</div>";
        echo "</div>";
    }
    ?>

    <h2>== Update Stok Baru ==</h2>
    <?php
    $obj_Role->updateRole(1, "update role", "role terupdate", 1);
    foreach ($obj_Role->getAllRoles() as $role) {
        echo "<div class='data-item'>";
        echo "<div class='data-title'>Nomor: ".$role->role_id."</div>";
        echo "<div>Nama Barang: ".$role->role_name."</div>";
        echo "<div>Deskripsi: ".$role->role_desc."</div>";
        echo "<div>Jenis: ".$role->role_status."</div>";
        echo "</div>";
    }
    ?>

    <h2>== Hapus Stok ==</h2>
    <?php
    $obj_Role->deleteRole(1);
    foreach ($obj_Role->getAllRoles() as $role) {
        echo "<div class='data-item'>";
        echo "<div class='data-title'>Nomor: ".$role->role_id."</div>";
        echo "<div>Nama Barang: ".$role->role_name."</div>";
        echo "<div>Deskripsi: ".$role->role_desc."</div>";
        echo "<div>Jenis: ".$role->role_status."</div>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
