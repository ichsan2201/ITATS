<?php
require_once 'domain_object/node_role.php';
class ModelRole{
    private $roles = [];
    private $nextId = 1;
    public function __construct(){
        if(isset($_SESSION['roles'])){
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        }else {
            $this->initializeDefaultRole();
        }
    }
    private function initializeDefaultRole(){
        $this->addRole("admin", "administrator", 1);
        $this->addRole("user", "customer", 1);
        $this->addRole("kasir","PEMBAYARAN", 0);
    }
    public function addRole($role_name, $role_description, $role_status){
        $peran = new role($this->nextId++, $role_name, $role_description, $role_status);
        $this->roles[] = $peran;
        $this->saveToSession();
    }
    private function saveToSession(){
        $_SESSION['roles'] = serialize($this->roles);
        echo "Session updated.<br>"; // Debugging log
    }
    public function getAllroles(){
        return $this->roles;
    }
    public function getAllRoleById($role_id){
        foreach($this->roles as $role){
            if($role->role_id == $role_id){
                return $role;
            }
        }
        return null;
    }
    public function updateRole($role_id, $role_name, $role_description, $role_status){
        foreach($this->roles as $role){
            if($role->role_id == $role_id){
                $role->role_name = $role_name;
                $role->role_description = $role_description;
                $role->role_status = $role_status;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    public function deleteRole($role_id){
        foreach($this->roles as $key => $role){
            if($role->role_id == $role_id){
                unset($this->role[$key]);
                $this->role = array_values($this->roles);
                $this->saveToSession();
                echo "Role with ID $role_id has been deleted.<br>";
                return true;
            }
        }
        echo"role tidak bisa dihapus";
        return false;
    }
    public function getRoleByName($role_name){
        foreach($this->roles as $role){
            if($role->role_name == $role_name){
                return $role;
            }
        }
    }
}
?>
