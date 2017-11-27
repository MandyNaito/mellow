<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');
class Crypter {
	private $key = '';
	private $iv = '';
	
	function __construct($config = array()){
		
		$this->ci =& get_instance();
		$this->ci->load->config('crypter');
		
		$this->key 	= $this->ci->config->item('key');
		$this->iv 	= $this->ci->config->item('iv');

		foreach ($config as $key => $value) {
			$this->$key = $value;
		}
		
		$this->key = $this->get_key($this->key);
	}
	public function get_key($key = '')
	{
		if ($key === '')
		{
			if ($this->key !== '')
			{
				return $this->encryption_key;
			}

			$key = config_item('encryption_key');

			if ( ! self::strlen($key))
			{
				show_error('In order to use the encryption class requires that you set an encryption key in your config file.');
			}
		}

		return md5($key);
	}
	
	protected static function strlen($str)
	{
		return defined('MB_OVERLOAD_STRING')
			? mb_strlen($str, '8bit')
			: strlen($str);
	}

	
	protected function getCipher(){
		$cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','cbc','');
		mcrypt_generic_init($cipher, $this->key, $this->iv);
		return $cipher;
	}
	
	function encrypt($string){
		$binary = mcrypt_generic($this->getCipher(),$string);
		$string = '';
		for($i = 0; $i < strlen($binary); $i++){
			$string .=  str_pad(ord($binary[$i]),3,'0',STR_PAD_LEFT);
		}
		return $string;
	}
	
	function decrypt($encrypted){
		//check for missing leading 0's
		$encrypted = str_pad($encrypted, ceil(strlen($encrypted) / 3) * 3,'0', STR_PAD_LEFT);
		$binary = '';
		$values = str_split($encrypted,3);
		foreach($values as $chr){
			$chr = ltrim($chr,'0');
			$binary .= chr($chr);
		}
		return mdecrypt_generic($this->getCipher(),$binary);
	}
}
?>
