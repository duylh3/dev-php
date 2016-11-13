<?php

class Lib {

    public function register($name, $email, $username, $password) {
        try {
            $db = DB();
            $sql = $db->prepare("INSERT INTO users(name,email,username,password) VALUES (:name,:email,:username,:password)");
            $sql->bindParam("name", $name, PDO::PARAM_STR);
            $sql->bindParam("email", $email, PDO::PARAM_STR);
            $sql->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $sql->bindParam("password", $enc_password, PDO::PARAM_STR);
            $sql->execute();

            return $db->lastInsertId();
        } catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    }

    public function login($username, $password) {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id FROM users WHERE (username=:username OR email=:username) AND password=:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);

                return $result->id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function userDetails($id) {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id, name, username, email FROM users WHERE id=:user_id");
            $query->bindParam("user_id", $id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function isUsername($username) {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function isEmail($email) {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}
