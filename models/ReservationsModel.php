<?php

    class ReservationModel {

        private static $_table = "restaurant_reservations";

        public static function findAll () {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT * FROM {$table}";

            $reservations = $conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $conn = null;
            return $reservations;
        }

        public static function find ($id) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "SELECT restaurant_reservations.id, parent_id, customer_name, reservation_date, restaurant.restaurant_name as restaurant 
            FROM {$table} 
            JOIN restaurant ON restaurant_reservations.parent_id = restaurant.id
            WHERE restaurant_reservations.id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            $reservation = $stmt->fetch(PDO::FETCH_OBJ);
            $conn = null;
            return $reservation;
        }

        public static function create ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "INSERT INTO {$table} (
                parent_id,
                customer_name,
                reservation_date
            ) VALUES (
                :parent_id,
                :customer_name,
                :reservation_date
            )";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":parent_id", $package["parent_id"], PDO::PARAM_INT);
            $stmt->bindParam(":customer_name", $package["customer_name"], PDO::PARAM_STR);
            $stmt->bindParam(":reservation_date", $package["reservation_date"], PDO::PARAM_STR);
            $stmt->execute();
            $conn = null;
        }

        public static function update ($package) {
            $table = self::$_table;
            $conn = get_connection();
            $sql = "UPDATE {$table} SET
                parent_id = :parent_id,
                customer_name = :customer_name,
                reservation_date = :reservation_date
            WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":parent_id", $package['parent_id'], PDO::PARAM_INT);
            $stmt->bindParam(":customer_name", $package['customer_name'], PDO::PARAM_STR);
            $stmt->bindParam(":reservation_date", $package['reservation_date'], PDO::PARAM_STR);
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