<?php

class Limey_Parsers_Echo extends Limey_Parser {
    protected $affects = array('T_STRING');
    
    public function parse($input) {
        if ('announce' === $input[1]) {
            $input[1] = 'echo';
        }
        return $input;
    }
}
