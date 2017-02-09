<?php

class Hangman
{
    private $letters;
    private $word_array;
    private $word;
    private $guess;

    function __construct()
    {
        $this->word_array = ["apple", "bread", "cinnamon", "dill", "egg", "fennel", "ginger", "hazelnut"];
    }

    function get($property) {
        return $this->$property;
    }

    function save()
    {
        $_SESSION["hangman_list"] = [];
        array_push($_SESSION["hangman_list"], $this);
    }

    function random()
    {
        return $this->word_array[array_rand($this->word_array)];
    }

    static function getActiveGame() {
        $hangman_list = $_SESSION["hangman_list"];
    return $hangman_list[0];
    }
}

?>
