<?php

class Controller_Main extends Controller
{
	function action_index()
	{	
        require_once 'startup.php';
        $sql = "SELECT * FROM `cms_SEO` WHERE `id` = 1";
    $result = $dbcnx->query($sql);
foreach($result as $k=>$v){
    $data[$k] = $v;
}
//$tempp = $data[0];
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}