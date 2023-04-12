<?php 

    class ContactModel {
        private static $_table = "contact_info";

        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table}";

            $contacts = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $contacts;
        }


        public static function create ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "INSERT INTO {$table} (
                name,
                email,
                question
            ) VALUES (
                :name,
                :email,
                :question
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $package["name"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $package["email"], PDO::PARAM_STR);
            $stmt->bindParam(":question", $package["question"], PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        }
    }





?>