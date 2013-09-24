<?php

class Limey_Parsers_TryCatch extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'would_you_mind',
                'actually_i_do_mind',
                'cheerio',
            ),
            array(
                'try',
                'catch',
                'die',
            ),
            $input[1]
        );

        return $input;
    }
}
