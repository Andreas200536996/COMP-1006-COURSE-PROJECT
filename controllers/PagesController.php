<?php

    function index () {
        render("pages/index", [
            "title" => "Restaraunt Reservations Website"
        ]);
    }

    function about () {
        render("pages/about", [
            "title" => "About the Website"
        ]);
    }


?>