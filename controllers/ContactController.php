<?php 

    require_once("./models/ContactModel.php");

    function _new () {
        render("pages/contact", [
            "title" => "Contact Us!",
            "action" => "create"
        ]);
    }

    function create () {

        ContactModel::create($_POST);

        redirect("", ["success" => "Your information has been submitted succesfully!"]);
}






?>