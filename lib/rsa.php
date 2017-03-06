<?php
function getkey(){
return "-----BEGIN PRIVATE KEY-----
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
}
	function encrypt($data){
		$key=getkey();
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
	function decrypt($data){
		$key=getkey();
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
?>