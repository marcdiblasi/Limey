<?php

class Limey_Parsers_Spelling extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'imagecolourallocate',
                'serialise',
                'newt_centred_window',
                'connexion_status',
            ),
            array(
                'imagecolorallocate',
                'serialize',
                'newt_centered_window',
                'connection_status',
            ),
            $input[1]
        );

        return $input;
    }
}
