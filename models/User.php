<?php 

require_once '../librariees/Database.php';

class User{
    
    private $db;
    
    public function __construct()
    {

        $this->db = new Database;
      
    }


    public function getUserByUsernameAndPassword($username, $password){
        $this->db->query('SELECT * FROM logins WHERE username = :uname AND password = :upass');
        $this->db->bind(':uname', $username);
        $this->db->bind(':upass', $password);

         return $this->db->Single();

    }

}