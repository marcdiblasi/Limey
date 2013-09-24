<?php

class Limey_Parsers_Class extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'upper_class',
                'state',
                'hereditary',
                'nouveau',
            ),
            array(
                'class',
                'public',
                'protected',
                'new',
            ),
            $input[1]
        );

        return $input;
    }
}
