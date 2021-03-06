<?php

abstract class Base_Module {
	
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
	
	/**
	 * @var	object
	 */
	protected $EE;
	
	/**
	 * @var	string
	 */
	protected $base_url = '';
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		// set the base control panel url for this module
		$this->base_url = BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=' . strtolower(str_replace('_mcp', '', get_class($this))) . AMP.'method=';
	}
	
}