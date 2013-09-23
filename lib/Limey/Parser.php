<?php

abstract class Limey_Parser {
    protected $affects;

    abstract public function parse($input);

    public function getAffects() {
        return $this->affects;
    }

    public function setAffects($value){
        $this->affects = $value;
    }
}
