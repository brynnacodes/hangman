<?php

class Player
{
    private $name;
    private $letters;

    function __construct($name)
    {
        $this->name = $name;
    }

    function get($property) {
        return $this->$property;
    }

    function save() {
        $_SESSION["name_list"] = [];
        array_push($_SESSION["name_list"], $this);
    }

}

class Word
{
    private $word_array;

    function __construct() {
        $this->word_array = ["apple", "bread", "cinnamon", "dill", "egg", "fennel", "ginger", "hazelnut"];
    }

    function get($property) {
        return $this->$property;
    }

    function random()
    {
        return $this->word_array[array_rand($this->word_array)];
    }
}

class Guess
{
    private $letter;

    function __construct($letter)
    {
        $this->letter = [];
    }

    function get($property) {
        return $this->$property;
    }

}

?>
