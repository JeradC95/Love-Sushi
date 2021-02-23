<?php

/* model/data-layer.php
 * returns data for my app
 *
 */

//class DataLayer
{
    /** getRolls() returns an array of rolls
     *  @return array
     */
    function getRolls()
    {
        return array("dragon roll", "california roll", "spicy tuna roll", "crab tempura",
                        "salmon nigiri", "onigiri");
    }

    /** getDrinks() returns an array of drinks
     *  @return array
     */
    function getDrinks()
    {
        return array("green tea", "lemonade", "cola", "virgin margarita", "la croix");
    }

    function getAlc(){
        return array("saki", "vodka", "rum", "whiskey", "tequila", "gin");
    }
}

