<?PHP
include_once("class.init.php");
class CRYPTER {
	private $secretkey;
	
	function __construct($x = "QWE2RTYUIO543PAS5DFG6HJKLZX7CVBN") {
		$this -> secretkey = $x;
		}
		
  public function encode($plaintext)
    {
    $td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
    $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $this -> secretkey, $iv);
    $encrypted_data = mcrypt_generic($td, $plaintext);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    $encoded_64 = base64_encode($encrypted_data);
    return trim($encoded_64);
    }

	public function decode($crypttext)
    {
    $decoded_64 = base64_decode($crypttext);
    $td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
    $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $this -> secretkey, $iv);
    $decrypted_data = mdecrypt_generic($td, $decoded_64);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return trim($decrypted_data);
    }

}
?>
