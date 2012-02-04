<?php

require_once dirname(__FILE__).'/classes/base_extension.php';

class Sample_ext extends Base_Extension {
	
	public $name = 'Sample Extension';
	public $version = '1.0';
	public $description = 'A sample extension';
	
	public function activate_extension()
	{
		$hooks = array(
			array(
				'class' => __CLASS__,
				'hook' => '',
				'method' => '',
				'settings' => serialize($this->settings),
				'priority' => 10,
				'version' => $this->version,
				'enabled' => 'y',
			),
		);
		
		$this->activate($hooks);
	}
	
}