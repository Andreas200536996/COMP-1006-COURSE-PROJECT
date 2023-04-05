<?php

    require_once("./models/RestarauntModel.php");

    function index () {
        render("restaraunts/index", [
            "title" => "Index"
        ]);
    }

    function show () {
        render("restaraunts/show", [
            "title" => "Show"
        ]);
    }

    function _new () {
        render("restaraunts/new", [
            "title" => "New",
            "action" => "create"
        ]);
    }

    function edit ($request) {
        render("restaraunts/edit", [
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