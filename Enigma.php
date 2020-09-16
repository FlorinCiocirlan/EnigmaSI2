<?php

include("CipherFactory.php");
include("ArgsParser.php");

class Enigma
{
    public static $menu="Enigma Manual\n" .
    "Run options: [-h | -e | -d] {CipherName} {FileName} {EncryptionKey}\n" .
    "   -h : displays this menu; other arguments are ignored.\n" .
    "   -e : encrypt and display\n" .
    "   -d : decrypt and display\n" .
    "   CipherName      : cipher to use when encrypting/decrypting; [rot13, rail-fence, morse]\n" .
    "   FileName        : path to file to encrypt/decrypt\n" .
    "   EncryptionKey   : Optional -> must be provided if cipher requires a key";



    public static function handleCipherOperation($argsParser) {
        $cipher = CipherFactory::getCipherForArgs($argsParser);

        // use cipher and display result or display menu if no args or wrong args provided
    }

}

//do not modify this code, but please understand it :)
$args=array_slice($argv,1);
$argsParser=new ArgsParser($args);
Enigma::handleCipherOperation($argsParser);
