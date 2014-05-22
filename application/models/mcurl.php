<?php
class Mcurl extends CI_Model {
	public $curlHandle, $url, $referer, $post, $cookie, $agent, $sock, $sockAuth, $timeout, $httpHeader;

	public function __construct() {
		parent::__construct();
		//$this->load->database();

		$this->curlHandle 	= curl_init();

		$this->agent 		= 'Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3';
		$this->timeout 		= 30;
		$this->cookie 		= false;
		$this->post 		= false;
		$this->sock 		= false;
		$this->sockAuth 	= false;
		$this->httpHeader 	= false;
	}

	public function __destruct()
	{
		// Delete cookie file
		if (file_exists($this->cookie))
            @unlink($this->cookie);
		// Destroy cURL
		curl_close($this->curlHandle);
	}

	public function setCookie($cookie)
	{
		$this->cookie = base_url() . '/data/' . $cookie;
		return $this->cookie;
	}

	public function setAgentMobile()
	{
		return $this->agent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25';
	}

	public function setTimeout($timeout)
	{
		return $this->timeout = $timeout;
	}

	public function setUrl($url)
	{
		return $this->url = $url;
	}

	public function setReferer($referer)
	{
		return $this->referer = $referer;
	}

	public function setPost($post)
	{
		return $this->post = $post;
	}

	public function setSock($sock)
	{
		return $this->sock = $sock;
	}

	public function setSockAuth($sockAuth)
	{
		return $this->sockAuth = $sockAuth;
	}

	public function setHttpHeader($httpHeader)
	{
		return $this->httpHeader = $httpHeader;
	}

	public function setOpt()
	{
		curl_setopt($this->curlHandle, CURLOPT_URL, $this->url);
		curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curlHandle, CURLOPT_HEADER, true);
		curl_setopt($this->curlHandle, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->curlHandle, CURLOPT_USERAGENT, $this->agent);
		curl_setopt($this->curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($this->curlHandle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curlHandle, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($this->curlHandle, CURLOPT_CONNECTTIMEOUT, $this->timeout);
		curl_setopt($this->curlHandle, CURLOPT_AUTOREFERER, true);

		if ($this->referer) {
			curl_setopt($this->curlHandle, CURLOPT_REFERER, $this->referer);
		}

		if ($this->cookie) {
			curl_setopt($this->curlHandle, CURLOPT_COOKIEJAR, $this->cookie);
			curl_setopt($this->curlHandle, CURLOPT_COOKIEFILE, $this->cookie);
		}

		if ($this->post) {
			curl_setopt($this->curlHandle, CURLOPT_POST, TRUE);
			curl_setopt($this->curlHandle, CURLOPT_POSTFIELDS, $this->post);
		}
		else {
			curl_setopt($this->curlHandle, CURLOPT_POST, false);
		}

		if ($this->sockAuth) {
			curl_setopt($this->curlHandle, CURLOPT_PROXYUSERPWD, $this->sockAuth);
		}

		if ($this->sock) {
			curl_setopt($this->curlHandle, CURLOPT_HTTPPROXYTUNNEL, TRUE);
			curl_setopt($this->curlHandle, CURLOPT_PROXY, $this->sock);
			curl_setopt($this->curlHandle, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
		}

		if ($this->httpHeader) {
			curl_setopt($this->curlHandle, CURLOPT_HTTPHEADER, $this->httpHeader);
		}
		curl_setopt($this->curlHandle, CURLOPT_ENCODING, 'gzip,deflate');
		curl_setopt($this->curlHandle, CURLOPT_VERBOSE, true);

		return $this->curlHandle;
	}

	public function getPage()
	{
		return curl_exec($this->curlHandle);
	}

	public function getStr($string,$start,$end){
		$str = explode($start,$string,2);
		$str = explode($end,$str[1],2);
		return $str[0];
	}

	public function inStr($s,$as){
		$s=strtoupper($s);
		if(!is_array($as)) $as=array($as);
		for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true;
		return false;
	}
}