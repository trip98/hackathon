<?php 	
namespace app;


trait Encryption {
	public $key = "aes-128-gcm";

	public function encrypt($text) {
		if (in_array($this->key, openssl_get_cipher_methods())) {
		    $ivlen = openssl_cipher_iv_length($this->key);
		    $iv = openssl_random_pseudo_bytes($ivlen);
		    $ciphertext = openssl_encrypt($text, $this->key, $this->key, $options = 0, $iv, $tag);
		    return $ciphertext;
		}
		return false;
	}
	public function decrypt($text) {
		$original_plaintext = openssl_decrypt($text, $this->key, $this->key, $options = 0, $iv, $tag);
		return $original_plaintext;
	}
}

 ?>