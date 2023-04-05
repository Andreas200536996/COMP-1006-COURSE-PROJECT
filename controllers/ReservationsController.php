<?php

    require_once("./models/ReservationsModel.php");
    require_once("./models/RestaurantsModel.php");

    function index () {
        $reservations = ReservationModel::findAll();

        render("reservations/index", [
            "restaurant_reservations" => $reservations,
            "title" => "Reservations"
        ]);
    }

    function show () {
        render("reservations/show", [
            "title" => "Show"
        ]);
    }

    function _new () {
        $restaurants = RestaurantModel::findALl();

        render("reservations/new", [
            "title" => "New Reservation",
            "action" => "create",
            "restaurants" => ($restaurants ?? [])
        ]);
    }

    function edit ($request) {
        render("reservations/edit", [
            "title" => "Edit",
            "action" => "update"
        ]);
    }

    function create () {
                
                validate($_POST, "reservations/new");
        
                ReservationModel::create($_POST);
        
                redirect("reservations", ["success" => "Resrvation was added successfully!"]);
    }

    function update () {

                if (!isset($_POST['id'])) {
                    return redirect("reservations", ["errors" => "Missing required ID parameter"]);
                }

                validate($_POST, "reservations/edit/{$_POST['id']}");

                ReservationModel::update($_POST);
                redirect("reservations", ["success" => "Resrvation was updated successfully!"]);
    }

    function delete ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("reservations", ["errors" => "Missing required ID parameter"]);
        }

        ReservationModel::delete($request["params"]["id"]);

        redirect("reservations", ["success" => "Status was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["parent_id", "customer_name", "reservation_date"];
        $errors = [];

        // No empty fields
        foreach ($fields as $field) {
            if (empty($package[$field])) {
                $humanize = ucwords(str_replace("_", " ", $field));
                $errors[] = "{$humanize} cannot be empty";
            }
        }

        if (strtotime($package["reservations_date"]) < strtotime("now")) {
            $errors[]= "Reservation Date must be in the future";
        }

        

        if (count($errors)) {
            return redirect($error_redirect_path, ["form_fields" => $package, "errors" => $errors]);
        }
    }

    function sanitize($package) {}

?>