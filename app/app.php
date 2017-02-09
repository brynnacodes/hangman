<?php
date_default_timezone_set("America/Los_Angeles");
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/hangman.php";

    session_start();

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), ["twig.path" => __DIR__."/../views"]);

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("newplayer.html.twig");
    });

    $app->post("/home", function() use ($app) {
      $tamagotchi = new Player($_POST['name']);
      $tamagotchi->save();
      return $app["twig"]->render("homepage.html.twig", ["player" => $player]);
    });

    return $app;
 ?>
