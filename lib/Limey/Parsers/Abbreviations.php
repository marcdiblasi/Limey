<?php

class Limey_Parsers_Abbreviations extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'string_replace',
                'is_integer',
                'variable_dump',
                'perl_regular_expression_match',
                'javascript_object_notation_encode',
                'my_structured_query_language_connect',
            ),
            array(
                'str_replace',
                'is_int',
                'var_dump',
                'preg_match',
                'json_encode',
                'mysql_connect',
            ),
            $input[1]
        );

        return $input;
    }   
}
