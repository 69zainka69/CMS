<?php


class Controller_Portfolio extends Controller
{

	function __construct()
	{
		$this->model = new Model_Portfolio();
		$this->view = new View();
	}
	
	function action_index($datas=false)
	{
        if(isset($datas)){
            
            $data = $this->model->get_data($datas);		
            $this->view->generate('portfolio_view.php', 'template_view.php', $data);
        }else{
		$data = $this->model->get_data();		
		$this->view->generate('portfolio_view.php', 'template_view.php', $data);
    }
	}
}