<?php

class Limey_Parsers_Echo extends Limey_Parser {
    protected $affects = array('T_ECHO');
    
    public function parse($input) {
        $input[1] = 'announce';

        return $input;
    }
}
