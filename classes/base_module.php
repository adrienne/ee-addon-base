<?php

abstract class Base_Module {
	
	
	
}

abstract class Base_Module_UPD {
	
	/**
	 * @var	string
	 */
	public $version = '';
	
	/**
	 * @var	string
	 */
	protected $has_cp_backend = 'n';
	
	/**
	 * @var	string
	 */
	protected $has_publish_fields = 'n';
	
	/**
	 * @var	object
	 */
	protected $EE;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	
	/**
	 * Install the module
	 */
	public function install()
	{
		$data = array(
			'module_name' => str_replace('_upd', '', get_class($this)),
			'module_version' => $this->version,
			'has_cp_backend' => $this->has_cp_backend,
			'has_publish_fields' => $this->has_publish_fields,
		);
		
		$this->EE->db->insert('modules', $data);
	}
	
	/**
	 * Update the module
	 *
	 * @param	string
	 * @return	bool
	 */
	public function update($current = '')
	{
		// no need to update
		if($current == '' || $current == $this->version)
		{
			return FALSE;
		}
		
		return TRUE;
	}
	
	/**
	 * Uninstall the module
	 *
	 * @return	bool
	 */
	public function uninstall()
	{
		$this->EE->db->where('module_name', str_replace('_upd', '', get_class($this)))->delete('modules');
		
		return TRUE;
	}
	
}

abstract class Base_Module_MCP {
	
	
	
}