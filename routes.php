<?php

    /**
     * Routes are responsible for matching a requested path
     * with a controller and an action. The controller represents
     * a collection of functions you want associated, usually, with
     * a resource. The action is the specific function you want to call.
     */

    $routes = [
        "get" => [
            [
                "pattern" => "/",
                "controller" => "PagesController",
                "action" => "index"
            ],
            [
                "pattern" => "/restaurants",
                "controller" => "RestaurantsController",
                "action" => "index"
            ],
            [
                "pattern" => "/restaurants/new",
                "controller" => "RestaurantsController",
                "action" => "_new"
            ],
            [
                "pattern" => "/restaurants/:id",
                "controller" => "RestaurantsController",
                "action" => "show"
            ],
            [
                "pattern" => "/restaurants/edit/:id",
                "controller" => "RestaurantsController",
                "action" => "edit"
            ],
            [
                "pattern" => "/restaurants/delete/:id",
                "controller" => "RestaurantsController",
                "action" => "delete"
            ],

            [
                "pattern" => "/reservations",
                "controller" => "ReservationsController",
                "action" => "index"
            ],
            [
                "pattern" => "/reservations/new",
                "controller" => "ReservationsController",
                "action" => "_new"
            ],
            [
                "pattern" => "/reservations/:id",
                "controller" => "ReservationsController",
                "action" => "show"
            ],
            [
                "pattern" => "/reservations/edit/:id",
                "controller" => "ReservationsController",
                "action" => "edit"
            ],
            [
                "pattern" => "/reservations/delete/:id",
                "controller" => "ReservationsController",
                "action" => "delete"
            ],

            [
                "pattern" => "/users/new",
                "controller" => "UsersController",
                "action" => "_new"
            ],
            [
                "pattern" => "/login",
                "controller" => "UsersController",
                "action" => "login"
            ],
            [
                "pattern" => "/logout",
                "controller" => "UsersController",
                "action" => "logout"
            ],
        ],
        "post" => [
            [
                "pattern" => "/restaurants/create",
                "controller" => "RestaurantsController",
                "action" => "create"
            ],
            [
                "pattern" => "/restaurants/update",
                "controller" => "RestaurantsController",
                "action" => "update"
            ],

            [
                "pattern" => "/reservations/create",
                "controller" => "ReservationsController",
                "action" => "create"
            ],
            [
                "pattern" => "/reservations/update",
                "controller" => "ReservationsController",
                "action" => "update"
            ],

            [
                "pattern" => "/users/create",
                "controller" => "UsersController",
                "action" => "create"
            ],
            [
                "pattern" => "/authenticate",
                "controller" => "UsersController",
                "action" => "authenticate"
            ],
        ]
    ];

?>