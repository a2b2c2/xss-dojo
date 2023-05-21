<?php
/*
jsEscape() PHP function to unicode encode special chars 
for JavaScript string context.

Source: https://portswigger.net/web-security/cross-site-scripting/preventing

Also consideres line and paragraph separator characters.
From https://terjanq.medium.com/arbitrary-parentheses-less-xss-e4a1cf37c13d
Unicode Characters 
 'LINE SEPARATOR'      (U+2028, UTF-8[DEC]: 226 128 168) and 
 'PARAGRAPH SEPARATOR' (U+2029, UTF-8[DEC]: 226 128 169) 
 can be used as line terminators in JavaScript. 
 For example, eval('x=123\u2028alert(x)') will pop out an alert.

 References to encodings:
 https://www.unicodepedia.com/unicode/general-punctuation/2028/
 https://www.utf8-chartable.de/unicode-utf8-table.pl?start=8192&number=128&utf8=dec

*/
function jsEscape($str) {
        $output = '';
        $str = str_split($str);
        for($i=0;$i<count($str);$i++) {
            $chrNum = ord($str[$i]);
            $chr = $str[$i];
            if($chrNum === 226) {
                if(isset($str[$i+1]) && ord($str[$i+1]) === 128) {
                    if(isset($str[$i+2]) && ord($str[$i+2]) === 168) {
                        $output .= '\u2028';
                        $i += 2;
                        continue;
                    }
                    if(isset($str[$i+2]) && ord($str[$i+2]) === 169) {
                        $output .= '\u2029';
                        $i += 2;
                        continue;
                    }
                }
            }
            switch($chr) {
                case "'":
                case '"':
                case "\n";
                case "\r";
                case "&";
                case "\\";
                case "<":
                case ">":
                    $output .= sprintf("\\u%04x", $chrNum);
                break;
                default:
                    $output .= $str[$i];
                break;
        }
        }
        return $output;
    };
?>