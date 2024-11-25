<?php
session_start(); //start session
session_destroy(); //gunakan jika data bertumpuk (atau barusan mencoba)
//dependancy

require_once 'role_model.php';

echo "==  data stok =="."<br>";
//testing create model and view all datas
$obj_Role = new modelRole();
foreach ($obj_Role->getAllRoles() as $role) {
    echo "nomor: ".$role->role_id."<br>";
    echo "nama barang: ".$role->role_name."<br>";
    echo "deskripsi: ".$role->role_description."<br>";
    echo "jenis: ".$role->role_status."<br><br>";
}
//add new role
echo "== add stok =="."<br>";
$obj_Role->addRole (role_name: "new role", role_description: "testing new role", role_status: 0);
$obj_Role->addRole(role_name: "very new role", role_description: "testing new new role", role_status: 1);
foreach ($obj_Role->getAllRoles() as $role) {
    echo "nomor: ".$role->role_id."<br>";
    echo "nama barang: ".$role->role_name."<br>";
    echo "deskripsi: ".$role->role_description."<br>";
    echo "jenis: ".$role->role_status."<br><br>";
}

//update role
echo "== update stok =="."<br>";
$obj_Role->updateRole (1, "update role", "role terupdate", 1);
foreach ($obj_Role->getAllRoles() as $role) {
    echo "nomor: ".$role->role_id."<br>";
    echo "nama barang: ".$role->role_name."<br>";
    echo "deskripsi: ".$role->role_description."<br>";
    echo "jenis: ".$role->role_status."<br><br>";
}

//delete role
echo "== hapus data =="."<br>";
$obj_Role->deleteRole (1);
foreach ($obj_Role->getAllRoles() as $role) {
    echo "nomor: ".$role->role_id."<br>";
    echo "nama barang: ".$role->role_name."<br>";
    echo "deskripsi: ".$role->role_description."<br>";
    echo "jenis: ".$role->role_status."<br><br>";
}

?>
