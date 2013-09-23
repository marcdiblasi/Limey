<?php

class Limey_Parsers_IfThen extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        if ('perchance' === $input[1]) {
            $input[1] = 'if';
        } elseif ('otherwise' === $input[1]) {
            $input[1] = 'else';
        }

        return $input;
    }
}
