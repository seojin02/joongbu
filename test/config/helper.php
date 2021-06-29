<?
  function encrypt($txt){
    return base64_encode(openssl_encrypt($txt, 'aes-256-cbc', ENC_KEY, OPENSSL_RAW_DATA, IV));
  }

  function decrypt($txt){
    return openssl_decrypt(base64_decode($txt), 'aes-256-cbc', ENC_KEY, OPENSSL_RAW_DATA, IV);
  }
