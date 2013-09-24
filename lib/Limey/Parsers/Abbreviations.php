<?php

class Limey_Parsers_Abbreviations extends Limey_Parser {
    protected $affects = array('T_STRING');

    public function parse($input) {
        $input[1] = str_replace(
            array(
                'string_get_comma_separated_values',
                'string_ireplace',
                'string_pad',
                'string_repeat',
                'string_replace',
                'string_rot13',
                'string_shuffle',
                'string_split',
                'string_word_count',

                'is_integer',
                
                'variable_dump',
                'variable_export',
                
                'javascript_object_notation_decode',
                'javascript_object_notation_encode',
                'javascript_object_notation_last_error_msg',
                'javascript_object_notation_last_error',
                
                'my_structured_query_language_connect',
                
                'perl_regular_expression_filter',
                'perl_regular_expression_grep',
                'perl_regular_expression_last_error',
                'perl_regular_expression_match_all',
                'perl_regular_expression_match',
                'perl_regular_expression_quote',
                'perl_regular_expression_replace_callback',
                'perl_regular_expression_replace',
                'perl_regular_expression_split',
            ),
            array(
                'str_getcsv',
                'str_ireplace',
                'str_pad',
                'str_repeat',
                'str_replace',
                'str_rot13',
                'str_shuffle',
                'str_split',
                'str_word_count',

                'is_int',

                'var_dump',
                'var_export',
                
                'json_decode',
                'json_encode',
                'json_last_error_msg',
                'json_last_error',
                
                'mysql_connect',
                
                'preg_filter',
                'preg_grep',
                'preg_last_error',
                'preg_match_all',
                'preg_match',
                'preg_quote',
                'preg_replace_callback',
                'preg_replace',
                'preg_split',
            ),
            $input[1]
        );

        return $input;
    }   
}
