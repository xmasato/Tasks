<?php
namespace app\core;

class View {

    public function generate($content_view, $template_view, $tasks=[], $paginator=[]){

        include 'app/views/'.$template_view;
    }
}