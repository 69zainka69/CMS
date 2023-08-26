<?php


class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	function generate($content_view, $template_view, $data = false)
	{
		/*
		if(is_array($data)) {
			extract($data);
		}
        */
        if(is_array($data)){
foreach($data as $k=>$v){
    $temp[$k] = $v;
}
$data = $temp[0];
        }
		unset($temp);
		
		include 'application/views/'.$template_view;
	}
}