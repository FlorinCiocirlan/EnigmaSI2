<?php
include 'Cipher.php';


class ROT13 implements Cipher
{
    public function decrypt($message)
    {
        // TODO: Implement decrypt() method.
        $decryptedText='';
        for($i=0;$i<strlen($message);$i++){
            if (ctype_alpha($message[$i])){
                $decryptedText .=$this->decryptLetter($message[$i]);
            } else {
                $decryptedText.=$message[$i];
            }
        }
        return $decryptedText;
    }

    public function encrypt($message)
    {
        // TODO: Implement encrypt() method.
        $encryptedText='';
        for($i=0;$i<strlen($message);$i++){
            if (ctype_alpha($message[$i])){
                $encryptedText .=$this->encryptLetter($message[$i]);
            } else {
                $encryptedText.=$message[$i];
            }
        }
        return $encryptedText;
    }

    public function encryptLetter($char){
        $min = 65;
        $max = 122;
        $toBeIgnored = [91=>97,92=>98,93=>99,94=>100,95=>101,96=>102];
        $newPosition = ord($char) + 13;

        if(($max - $newPosition) < 0){
//            echo 'initial position = '.ord($char). '  ; char = '.$char.' ; newposition = '.$newPosition. ' ;  result = '.abs($max-$newPosition);
            $newPosition = $min + abs($max-$newPosition+1);
        } elseif (in_array($newPosition,array_keys($toBeIgnored))){
            $newPosition = $toBeIgnored[$newPosition];
        }
        return chr($newPosition);

    }
    public function decryptLetter($char){
        $min = 65;
        $max = 122;
        $toBeIgnored = [91=>85,92=>86,93=>87,94=>88,95=>89,96=>90];
        $newPosition = ord($char) - 13;

        if(($min - $newPosition) > 0){
            $newPosition = $max - abs($min-$newPosition-1);
        } elseif (in_array($newPosition,array_keys($toBeIgnored))){
            $newPosition = $toBeIgnored[$newPosition];
        }

        return chr($newPosition);
    }

}