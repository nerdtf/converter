<?php

class View
{
    public $templateView;

    public function generate($contentView, $templateView, $data = NULL){
        if(is_array($data)){
            extract($data);
        }
        include 'application/views/'.$templateView;
    }
}