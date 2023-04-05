<?php

    require_once("./models/RestaurantModel.php");

    function index () {
        render("restaurants/index", [
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
        render("restaurants/edit", [
            "title" => "Edit",
            "action" => "update"
        ]);
    }

    function create () {}

    function update () {}

    function delete ($request) {}

    function validate ($package, $error_redirect_path) {}

    function sanitize($package) {}

?>