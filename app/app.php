<?php
date_default_timezone_set("America/Los_Angeles");
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/hangman.php";

    session_start();
    if (empty($_SESSION["hangman-list"])) {
        $_SESSION["hangman-list"] = [];
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), ["twig.path" => __DIR__."/../views"]);

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("newplayer.html.twig");
    });

    $app->post("/guess", function() use ($app) {
        $hangman = new Hangman();
        $hangman->save();
        $hangman = $hangman->random();
        return $app["twig"]->render("guess.html.twig", ["hangman" => $hangman]);
    });

    $app->post("/hangman", function() use ($app) {
        return $app["twig"]->render("hangman.html.twig");
    });

    return $app;
 ?>
