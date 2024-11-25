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
<?php include 'includes/navbar.php'; ?>
<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Your main content goes here -->
        <div class="container mx-auto">
            <!-- Button to Insert New Role -->
            <div class="mb-4">
                <a href='role_input.php' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambahkan Stok</a>
            </div>

            <!-- Roles Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white grid-cols-1">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">NAMA BARANG</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">JENIS</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">STOK</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">ACTION</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    <!-- Dynamic Data Rows -->
                    <?php
                    $roles = [
                        (object)[
                            'role_id' => 1,
                            'role_name' => 'VELG ROCHELL',
                            'role_description' => 'PCX I60',
                            'role_status' => '30'
                        ],
                        (object)[
                            'role_id' => 2,
                            'role_name' => 'KNALPOT AKRAPOVIC MEGABASS',
                            'role_description' => 'NINJA 250',
                            'role_status' => '50'
                        ],
                        (object)[
                            'role_id' => 2,
                            'role_name' => 'ECU JUKEN 5',
                            'role_description' => 'CBR 250 RR',
                            'role_status' => '40'
                        ],
                        (object)[
                            'role_id' => 3,
                            'role_name' => 'PAKET UPRGADE CVT',
                            'role_description' => 'NMAX TURBO',
                            'role_status' => '50'
                        ],
                        (object)[
                            'role_id' => 3,
                            'role_name' => 'TOP BOX 40 LITER',
                            'role_description' => 'SHAD',
                            'role_status' => '20'
                        ],
                        (object)[
                            'role_id' => 3,
                            'role_name' => 'SIDEBOX 30 LITER',
                            'role_description' => 'GUARDIAN ADVENTURE',
                            'role_status' => '50'
                        ],
                        (object)[
                            'role_id' => 3,
                            'role_name' => 'USD KTC',
                            'role_description' => 'YAMAHA MT25 OLD',
                            'role_status' => '50'
                        ],
                        (object)[
                            'role_id' => 3,
                            'role_name' => 'LAMPU BILED AES TURBO',
                            'role_description' => 'UNIVERSAL',
                            'role_status' => '100'
                        ]

                    ];
                    foreach ($roles as $role) { ?>
                        <tr class="text-center">
                            <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_id) ?></td>
                            <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_name) ?></td>
                            <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_description) ?></td>
                            <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_status) ?></td>
                            <td class="w-1/6 py-3 px-4">
                                <a href="../index.php" role&fitur=edit&role_id=<?php echo $role->role_id; ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">Update</a>
                                <a href="../index.php" role&fitur=delete&role_id=<?php echo $role->role_id; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>
