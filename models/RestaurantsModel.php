<?php

    class RestaurantModel {

        private static $_table = "restaurant";

        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table}";

            $restaurants = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $restaurants;
        }

        public static function find ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $restaurant = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $restaurant;
        }

        public static function create ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "INSERT INTO {$table} (
                restaurant_name
            ) VALUES (
                :restaurant_name
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":restaurant_name", $package["restaurant_name"], PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "UPDATE {$table} SET
                restaurant_name = :restaurant_name
            WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":restaurant_name", $package['restaurant_name'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $package['id'], PDO::PARAM_INT);
            
            $stmt->execute();
            $conn = null;
        }

        public static function delete ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "DELETE FROM {$table} WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
            $conn = null;
        }

    }

?>