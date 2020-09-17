<?php



class MorseCode implements Cipher
{

    public static $morse = [
        'a' => '.- ',
        'b' => '-... ',
        'c' => '-.-. ',
        'd' => '-.. ',
        'e' => '. ',
        'f' => '..-. ',
        'g' => '--. ',
        'h' => '.... ',
        'i' => '.. ',
        'j' => '.--- ',
        'k' => '-.- ',
        'l' => '.-.. ',
        'm' => '-- ',
        'n' => '-. ',
        'o' => '--- ',
        'p' => '.--. ',
        'q' => '--.- ',
        'r' => '.-. ',
        's' => '... ',
        't' => '- ',
        'u' => '..- ',
        'v' => '...- ',
        'w' => '.-- ',
        'x' => '-..- ',
        'y' => '-.-- ',
        'z' => '--.. ',
        '0' => '----- ',
        '1' => '.---- ',
        '2' => '..--- ',
        '3' => '...-- ',
        '4' => '....- ',
        '5' => '..... ',
        '6' => '-.... ',
        '7' => '--... ',
        '8' => '---.. ',
        '9' => '----. '];
    public function decrypt($message)
    {
        // TODO: Implement decrypt() method.
        $words = explode('/',$message);
        $decryptedText = '';
        foreach ($words as $word) {
            foreach (explode(' ', $word) as $char){
                if(array_search($char.' ', MorseCode::$morse)){
                $decryptedText.=array_search($char.' ',MorseCode::$morse);

                } else {
                    $decryptedText.=$char;
                }
            }
            $decryptedText.=' ';
        }
        return $decryptedText;
    }

    public function encrypt($message)
    {
        $separatedMessage = str_replace(' ','/',$message);
        $encryptedMsg = '';
        $chars = str_split($separatedMessage);
        foreach ($chars as $char){
            if(ctype_alnum($char)){
                $encryptedMsg .= MorseCode::$morse[$char];
//                str_replace($char,MorseCode::$morse[$char],$separatedMessage);
            } else {
                $encryptedMsg.= $char;
            }

        }
       return $encryptedMsg;
    }

}