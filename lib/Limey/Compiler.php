<?php

class Limey_Compiler {
    private $codeString;
    private $codeTokens;

    public function loadString($text) {
        $this->codeString = $text;
    }

    public function loadFile($filename) {
        if (
            !file_exists($filename) || 
            !is_file($filename) ||
            !is_readable($filename)
        ) {
            return false;
        }

        $this->loadString(file_get_contents($filename));
    }

    public function run() {
        if (null === $this->codeString) {
            return '';
        }

        $parsers = $this->loadParsers();
        $affects = $this->loadAffects($parsers);

        $tokens = token_get_all($this->codeString);

        $newCode = '';
        $parsedToIndex = 0;
        foreach ((array)$tokens as $index => $token) {
            if ($index < $parsedToIndex) {
                continue;
            }

            if (!is_array($token)) {
                $newCode .= $token;
                continue;
            }

            $token[0] = token_name($token[0]);

            if (isset($affects[$token[0]])) {
                foreach ($affects[$token[0]] as $parser) {
                    $token = $parser->parse($token);
                }
            }

            if (is_array($token)) {
                $newCode .= $token[1];
            } else {
                $newCode .= $token;
            }
        }

        return $newCode;
    }

    private function loadParsers() {
        require_once dirname(__FILE__) . '/Parser.php';

        $parserDirectory = dirname(__FILE__) . '/Parsers';

        $files = glob($parserDirectory . '/*');
        $parsers = array();
        foreach ($files as $file) {
            $fileFixed = preg_replace(
                array(
                    '/^' . preg_quote($parserDirectory, '/') . '\//',
                    '/\.php$/',
                ),
                '',
                $file
            );

            require_once $file;
        
            $className = "Limey_Parsers_$fileFixed";
            $parser = new $className();
            $parsers[] = $parser;
        }

        return $parsers;
    }

    private function loadAffects($parsers) {
        $affects = array();

        foreach ((array)$parsers as $parser) {
            $newAffects = $parser->getAffects();

            foreach ($newAffects as $newAffect) {
                if (isset($affects[$newAffect])) {
                    $affects[$newAffect][] = $newAffect;
                } else {
                    $affects[$newAffect] = array($parser);
                }
            }
        }

        return $affects;
    }
}
