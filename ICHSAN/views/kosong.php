<?php
global $obj_role;
$obj_role = [
    (object)[
        "role_id" => 1,
        "role_name" => "Admin",
        "role_description" => "Administrator Role",
        "role_status" => "Active"
    ],
    (object)[
        "role_id" => 2,
        "role_name" => "Editor",
        "role_description" => "Editor Role",
        "role_status" => "Inactive"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navbar -->
<?php
if (file_exists('includes/navbar.php')) {
    include 'includes/navbar.php';
} else {
    echo "File navbar.php tidak ditemukan.";
}
?>

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <?php
    if (file_exists('includes/sidebar.php')) {
        include 'includes/sidebar.php';
    } else {
        echo "File sidebar.php tidak ditemukan.";
    }
    ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <?php
        if (!empty($obj_role) && is_array($obj_role)) {
            foreach ($obj_role as $role) {
                echo "id role : " .$role->role_id. "<br>";
                echo "nama role  : " .$role->role_name. "<br>";
                echo "keterangan  : " .$role->role_description. "<br>";
                echo "status role : " .$role->role_status. "<br>";
                echo "<br>";
            }
        } else {
            echo "Tidak ada data role yang tersedia.";
        }
        ?>
        TEST PAGE ICHSAN MOTOR
    </div>
</div>

</body>
</html>
