<?php
class Node
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
    public function Node()
    {
        return $this->data;
    }
    public function getData()
    {
        return $this->data;
    }

}