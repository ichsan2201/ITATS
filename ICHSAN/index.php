<?php
require_once 'models/role_model.php';
require_once 'views/role_list.php';
include 'views/includes/navbar.php';
include 'views/includes/sidebar.php';
session_start();
if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
    case 'dashboard':
        include 'views/kosong.php';
        break;
    case 'role':
        $obj_modelRole = new modelRole();

        if (isset($_GET['fitur'])) {
            $fitur = $_GET['fitur'];
        } else {
            $fitur = null;
        }
        switch ($fitur) {
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description = $_POST['role_description'];
                $role_status = $_POST['role_status'];
                $obj_modelRole->addRole($role_name, $role_description, $role_status);
                header('location: index.php?modul=role');
                break;
            case 'delete':
                if (isset($_GET['role_id'])) {
                    $role_id = $_GET['role_id'];
                    $obj_modelRole->deleteRole($role_id);
                }
                header('location: index.php?modul=role');
                break;
            case 'edit':
                if (isset($_GET['role_id'])) {
                    $role_id = $_GET['role_id'];
                    $role = $obj_modelRole->getRoleById($role_id);
                    if ($role === null) {
                        echo "stok dengan ID tersebut tidak ditemukan.";
                        exit;
                    }
                    include 'views/role_update.php';
                }
                break;
            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $role_id = $_POST['role_id'];
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];

                    $obj_modelRole->updateRole($role_id, $role_name, $role_description, $role_status);
                }
                header('location: index.php?modul=role');
                exit;

            default:
                $obj_role = $obj_modelRole->getAllRoles();
                include 'views/role_list.php';
        }
        break;
}
