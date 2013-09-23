<?php

abstract class Limey_Parser {
    protected $affects;

    abstract public function parse($input);

    protected function getAffects() {
        return $this->affects;
    }

    protected function setAffects($value){
        $this->affects = $value;
    }
}
