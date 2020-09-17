<?php

    include("CipherFactory.php");
    include("ArgsParser.php");

    class Enigma
    {
        public static $menu = "Enigma Manual\n".
        "Run options: [-h | -e | -d] {CipherName} {FileName} {EncryptionKey}\n".
        "   -h : displays this menu; other arguments are ignored.\n".
        "   -e : encrypt and display\n".
        "   -d : decrypt and display\n".
        "   CipherName      : cipher to use when encrypting/decrypting; [rot13, rail-fence, morse]\n".
        "   FileName        : path to file to encrypt/decrypt\n".
        "   EncryptionKey   : Optional -> must be provided if cipher requires a key";


        public static function handleCipherOperation($argsParser)
        {
            $cipher = CipherFactory::getCipherForArgs($argsParser);

            // use cipher and display result or display menu if no args or wrong args provided
        }

        public static function readFile($filename){
            $myfile = fopen($filename.'.txt', "r") or die("Unable to open file!");
            $text = fread($myfile,filesize($filename.'.txt'));
            fclose($myfile);
            return $text ? $text:false;
        }


    }

//do not modify this code, but please understand it :)
    $args = array_slice($argv, 1);
    $argsParser = new ArgsParser($args);
    Enigma::handleCipherOperation($argsParser);

    try {
        if ($argsParser->getOption() === '-h' || (empty($argsParser->getCipher()) && empty(
                $argsParser->getOption()
                ) && empty($argsParser->getFile()) && empty($argsParser->getKey()))) {
            echo Enigma::$menu;
        } elseif(count($args) < 3){
            throw new EnigmaException("Too few arguments passed");
        }  elseif(!CipherFactory::isCipherAvailable($argsParser->getCipher())){
            throw new EnigmaException("Unknown cipher name");
        } elseif (!in_array($argsParser->getOption(), ['-h', '-e', '-d'])) {
            throw new EnigmaException('unrecognized mode');
        } elseif(!Enigma::readFile('text')){
            throw new EnigmaException("No file found with that name");
        } else {
            $myCypher = CipherFactory::getCipherForArgs($argsParser);
            if($argsParser->getOption()==='-e'){
                echo $myCypher->encrypt(Enigma::readFile($argsParser->getFile()));
            } elseif ($argsParser->getOption()==='-d'){
                echo $myCypher->decrypt(Enigma::readFile($argsParser->getFile()));
            }
        }

    } catch (EnigmaException $e) {
        echo $e->getMessage();
    }

