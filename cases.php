<?php
$CNAMES = 
[ "CONTEXT",
  "HTML CONTEXT", 
  "HTML ATTRIBUTE (NON-EXECUTABLE)", 
  "HTML ATTRIBUTE (EXECUTABLE)", 
  "HTML ATTRIBUTE (URL)<br>", 
  "JAVASCRIPT EVAL", 
  "JAVASCRIPT FUNCTION ARGUMENT", 
  "JAVASCRIPT STRING", 
  "JAVASCRIPT TEMAPLATE `...`<br>",
  "HTML COMMENT"
  ];

$QNAMES = 
  ["QUOTATIONS APPLIED", 
  "NO QUOTES", 
  "SINGLE QUOTES: '...'",
  "DOUBLE QUOTES: \"...\""
  ];

$DNAMES = 
[ "DEFENSE ON THE SERVER", 
  "NOTHING", 
  "strip_tags(\$input, \"&lt;b&gt;\")",
  "strip_tags(\$input, \"\")",
  "htmlspecialchars(\$input, ENT_COMPAT) [default in PHP < 8.1]",
  "htmlspecialchars(\$input , ENT_QUOTES | ENT_SUBSTIUTE | ENT_HTML401) [default in PHP >= 8.1]",
  "htmlentities(\$input, ENT_QUOTES, 'UTF-8')",
  "json_encode(\$input)"
  ];

function generateRadioButtons($names, $pm, $type) {
    $result = "<b>$names[0]</b><br>";
    for($i=1; $i<count($names); $i++) {        
        $result .= 
        "<label>
        <input id='$type$i' type='radio' name='$pm' value='$i' onClick='autoSubmit();'> $names[$i]
        </label>
        <br>";
    }
    return $result;
}; 
  

/* EXAMPLE
    <!--
          <label>
            <input id="C2" type="radio" name="ctx" value="2" onClick="autoSubmit();" > 
            HTML CONTEXT
          </label>
          <br>
*/          
?>