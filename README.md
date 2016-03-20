# Crypting-Data
There is no way to decrypt data without knowing the hash. This piece of code acts as a mechanism to encrypt and decrypt data.

Example usage:

$CRYPTER =  new CRYPTER("oursecrethash");
$regularstr = "This is a example";
$encryptedstr = $CRYPTER->encode($regularstr);
$decryptedstr = $CRYPTER->decode($encryptedstr);
