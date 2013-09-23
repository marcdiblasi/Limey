<?php

class Limey_Parsers_Variables extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        if (strlen($input[1]) > 0 && (
            '£' === $input[1][0] ||
            '₤' === $input[1][0]
        )) {
            $input[1][0] = '$';
        }

        if (194 === ord($input[1][0]) && 163 === ord($input[1][1])) {
            $input[1] = '$' . substr($input[1], 2);
        }

        return $input;
    }
}
