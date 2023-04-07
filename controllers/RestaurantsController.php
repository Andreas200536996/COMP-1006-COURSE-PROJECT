<?php

    require_once("./models/RestaurantsModel.php");

    function index () {
        $restaurants = RestaurantModel::findAll();

        render("restaurants/index", [
            "restaurants" => $restaurants,
            "title" => "Index"
        ]);
    }

    function show () {
        render("restaurants/show", [
            "title" => "Show"
        ]);
    }

    function _new () {
        render("restaurants/new", [
            "title" => "New",
            "action" => "create"
        ]);
    }

    function edit ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("", ["errors" => "Missing required ID parameter"]);
        }

        $restaurant = RestaurantModel::find($request["params"]["id"]);
        if (!$restaurant) {
            return redirect("", ["errors" => "Status does not exist"]);
        }

        render("restaurants/edit", [
            "title" => "Edit",
            "restaurants" => $restaurant,
            "edit_mode" => true,
            "action" => "update"
        ]);
    }

    function create () {
                
                validate($_POST, "restaurants/new");
        
                RestaurantModel::create($_POST);
        
                redirect("restaurants", ["success" => "Restaurant was added successfully!"]);
    }

    function update () {

                if (!isset($_POST['id'])) {
                    return redirect("restaurants", ["errors" => "Missing required ID parameter"]);
                }

                validate($_POST, "restaurants/edit/{$_POST['id']}");

                RestaurantModel::update($_POST);
                redirect("restaurants", ["success" => "Restaurant was updated successfully!"]);
    }

    function delete ($request) {
        if (!isset($request["params"]["id"])) {
            return redirect("restaurants", ["errors" => "Missing required ID parameter"]);
        }

        RestaurantModel::delete($request["params"]["id"]);

        redirect("restaurants", ["success" => "Status was deleted successfully"]);
    }

    function validate ($package, $error_redirect_path) {
        $fields = ["restaurant_name"];
        $errors = [];

        // No empty fields
        foreach ($fields as $field) {
            if (empty($package[$field])) {
                $humanize = ucwords(str_replace("_", " ", $field));
                $errors[] = "{$humanize} cannot be empty";
            }
        }

        if (count($errors)) {
            return redirect($error_redirect_path, ["form_fields" => $package, "errors" => $errors]);
        }
    }

    function sanitize($package) {}

?>