<?php
include 'EnigmaException.php';
include 'ROT13.php';
include 'MorseCode.php';
include 'RailFence.php';

class CipherFactory
{

    public static function isCipherAvailable($cipherName)
    {
        $cipherNames=['rot13', 'rail-fence', 'morse'];
        return in_array($cipherName,$cipherNames);
    }

    public static function getCipherForArgs($argsParser)
    {
        try {
            $cipher = $argsParser->getCipher();

            if($cipher){
            switch ($cipher) {
                case 'rot13':
                    return new ROT13();
                case 'rail-fence':
                    return new RailFence();
                case 'morse':
                    return new MorseCode();
            }
            } else {
                throw new EnigmaException("No cipher available");
            }

        } catch (EnigmaException $e) {
            return $e->getMessage();
        }
        return null;
    }
}