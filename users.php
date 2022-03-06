<?php
    class user{
        //private database object
        private $db;

        //constructor to initialiaze private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }
        public function insertUser($username,$password){
            try {
                $result = $this->getUserByUsername($username);
                if ($result['num'] > 0) {
                    return false;
                }else{
                $new_password = md5($username.$password);
                //define sql statement to be executed
                $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
                //prepare sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to be actual values
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                //execute statements
                $stmt->execute();
                return true;
                }
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function getUser($username,$password){
            try {
                $sql = "select * from users where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            } 
        }

        public function getUserByUsername($username){
            try {
                $sql = "select count(*) as num from users where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            } 
        }

        public function updateUser($username,$password){
            try {

                $new_password = md5($username.$password);
                //define sql statement to be executed
                $sql = "UPDATE `users` SET `username`=:username,`password`=:password WHERE id=6";
                //prepare sql statement for execution
                $stmt = $this->db->prepare($sql);
                //bind all placeholders to be actual values
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                $stmt->execute();
                return true;
                
            }catch (PDOExeption $e) {
                echo $e->getMessage();
                return false;
            } 
        }
    }
?>
