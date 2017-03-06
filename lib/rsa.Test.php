<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
	function encrypt($key,$data){
		$isPrivate = strlen($key)>500;
        $keyProvider = $isPrivate?openssl_pkey_get_private($key):openssl_pkey_get_public($key);
		if($isPrivate){
			$r= openssl_private_encrypt($data,$encrypted,$keyProvider,OPENSSL_PKCS1_PADDING);
		}
		else{
			$r= openssl_public_encrypt($data,$encrypted,$keyProvider,OPENSSL_PKCS1_PADDING);
		}

		return $r?$data = base64_encode($encrypted):null;
	}    
	function decrypt($key,$data){
		$isPrivate = strlen($key)>500;
        $keyProvider = $isPrivate?openssl_pkey_get_private($key):openssl_pkey_get_public($key);
		$data = base64_decode($data);
		if($isPrivate){
			$r= openssl_private_decrypt($data,$decrypted,$keyProvider,OPENSSL_PKCS1_PADDING);
		}
		else{
			$r= openssl_public_decrypt($data,$decrypted,$keyProvider,OPENSSL_PKCS1_PADDING);
		}

		return $r?$decrypted:null;
	}
$pub="-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQClbllluZE5ncfwVH6oKRXnU8hl
nRYD2a9LLYNfa6v5obKE9XZy/OQKhzguruSjQYVU/hZjQYc5Ucm7fKxHAqUfGqxQ
7YRhAQ4nyD1NaTM8Y0LEwBuGC82FL49KRpgGKzPHcUPJA6AQNA4YAgLp7F3Me8b/
iN5b0e56z7btECDyaQIDAQAB
-----END PUBLIC KEY-----";
$pri="-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKVuWWW5kTmdx/BU
fqgpFedTyGWdFgPZr0stg19rq/mhsoT1dnL85AqHOC6u5KNBhVT+FmNBhzlRybt8
rEcCpR8arFDthGEBDifIPU1pMzxjQsTAG4YLzYUvj0pGmAYrM8dxQ8kDoBA0DhgC
AunsXcx7xv+I3lvR7nrPtu0QIPJpAgMBAAECgYAaxTis6tKYGEhP7ocbKfWOxv1u
3soT5W4lzupWI/5jGco3FIxjyeNn22nkDrlBEfaZl7nXu2A+jlWu2VtSQm37JUpa
nJ3JVHhO/eSC385BqamJo+6IXiQAV81NqNMa2LeDBqwSPJrJwGLxljZvlDHDumLp
X9Plo4CSj33Q+hh34QJBANH2TPdLkho/H0PCzykyJNDpx8+O7nbJFqr9f9C8EcJR
WaHoYngekTPpAly+RuxPy3CuwsJUyABcoiUmOSj9pAcCQQDJtGiY4Cfe+vqXtHje
EevuQVlOt/Ar3Bu13pTSJcNU7+uyin9gILkdUeckdoMzxp6V6NWnIFQ8RjGfzmwh
33oPAkEAriAUnnZG2YuF0z1pbqHOVI+9DM5dx5dnPDF14ddG5x9uNU8y8qlvBFz2
f5Gx4eMfNflJPb7wCxTHyAVWHD+V2wJAKH2S0b2Nw3FWhMWxzcKDPhzYNLkv+V4C
IgxAi78Q6ygOhJTQ5RcskfozEFrKE8a3ZxiKazZOMptUsuPZSSN3eQJAOa1H5pV2
YQyDyRoW0XyA3iUPG2hmpLYBMwQ0GF3y1lzeQgItCGoZll1iBc5i4OXHHxH1ffxB
o0DF9veB8YP6yw==
-----END PRIVATE KEY-----";
$p=$_GET["d"];
if(strlen($p)>100)
{echo decrypt($pri,$p);}
else
{echo encrypt($pub,$p);}
echo'<h1>GET长度</h1>';
echo strlen($p);

$dd='EX06DmvenWvPcxWcOcYCqB225hE52RZ7lX3TIkWdS6O51PMPK82eAOtVD6tUvgA+jQdCT2e7ZbvKk/o9E5PfDICCUehORbh6UBl0K1uq1yaRy1N6WQP0ZyeIS4zjW6yKTC5E34ZTfunR4j+NsjUUaKplzsqUaOpD+KU3gO/j6wo=';
echo'<h1>start</h1>';
if($p==$dd)echo'相等';
else echo'不等';
echo"<h1>$p</h1>";
echo"<h1>$dd</h1>";
echo'<h1>end</h1>';

echo'<h1>解秘666长度'.strlen($dd).'</h1>';
echo decrypt($pri,$dd);


echo'<h1>自解秘666</h1>';
echo decrypt($pri,encrypt($pub,'666'));
?>