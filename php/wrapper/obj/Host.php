<?php 

require_once 'API.php';

class Host{ 
	/*
	Constructor for Host Class
	
	Preconditions: 
		lms_host - hostname for the back-end LMS
		protocol - protocol to use for user <--> web-app interaction
		versions - Dictionary containing the latest versions of various products (needed for a majority of API calls)
	
	Postconditions:
		returns: An object of type Host
	*/
	function __construct($lms_host, $protocol) {
		$this->_lms_host = $lms_host;
		$this->_protocol = $protocol;
		$this->versions = get_api_versions();
		print_r($this->versions);
   }
   
   /* 
	Getter function
	Postconditions:
		Returns: self._protocol - protocol used
	*/
   function get_protocol() {

        return $this->_protocol;
    }  
	
	/*
	Getter function
	Postconditions:
		Returns: self._lm_host - hostname for back-end LMS
	*/
	function get_lms_host() { 

        return $this->_lms_host;
    }

	/* 
	Getter function
	Preconditions:
		product_code: String - product code
	Postconditions:
		Returns: LatestVersion for specific product_code
	*/
	function get_api_version($product_code) {

        return [$item['LatestVersion'] foreach $this->versions as $item if($item['ProductCode'] == $product_code)][0];
    }  
	
} 

?> 