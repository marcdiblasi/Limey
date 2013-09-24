<?php

class Limey_Parsers_Switch extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'what_about',
                'perhaps',
                'splendid',
                'on_the_off_chance',
            ),
            array(
                'switch',
                'case',
                'break',
                'default',
            ),
            $input[1]
        );

        return $input;
    }
}
