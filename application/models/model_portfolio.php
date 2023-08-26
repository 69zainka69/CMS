<?php

class Model_Portfolio extends Model
{

    
	public function get_data($datas=false)
	{	
        require_once 'startup.php';
if(isset($datas) && $datas!=NULL){
foreach($datas as $k=>$v){
$arrkey[] = $k;
$arrval[] = $v;
}

if($k=="id"){
    $sql = "SELECT * FROM `".DB_PREFIX."test` WHERE `".$k."` = ".$v."";
    $result = $dbcnx->query($sql);
}}
else{

        $sql = "SELECT * FROM `".DB_PREFIX."test`";
        $result = $dbcnx->query($sql);
    }
return $result;
/*
		return array(
			
			array(
				'Year' => '2012',
				'Site' => 'http://DunkelBeer.ru',
				'Description' => 'Промо-сайт темного пива Dunkel от немецкого производителя Löwenbraü выпускаемого в России пивоваренной компанией "CАН ИнБев".'
			),


			array(
				'Year' => '2012',
				'Site' => 'http://ZopoMobile.ru',
				'Description' => 'Русскоязычный каталог китайских телефонов компании Zopo на базе Android OS и аксессуаров к ним.'
			),


		);
        */
	}
}