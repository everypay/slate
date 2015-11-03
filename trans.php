<?php
require_once 'vendor/autoload.php';
use Behat\Transliterator\Transliterator;

$delimiters = array(
    array('h2', 'id'),
    array('h1', 'id'),
    array('a', 'href')
    );
//foreach($delimiters as $key){
//    echo($key[0].' '.$key[1].'="');
//    echo("\n");
//}
//exit;
//backup original file
$file = file_get_contents("build/index.html", "r");
file_put_contents ("build/index0.html", $file);

$altered = "";
$handle = fopen("build/index.html", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $found_any_delimiters = 0;
        foreach($delimiters as $key){
            $test = preg_match('/<'.$key[0].' '.$key[1].'/', $line);
            if($test == 1){
//echo "found: ".$test.":".$line;
                $found_any_delimiters = 1;
                $part = \explode($key[0].' '.$key[1].'="', $line);
//print_r($part);
//echo "count: ".count($part);
                if(count($part) > 1){
                    $altered .= $part[0] . $key[0].' '.$key[1].'="';
//echo "altered-1: ".$part[0] . $key[0].' '.$key[1].'="';
                    $subpart = \explode('"', $part[1], 2);
                    if(count($subpart) > 1){
                        $trans = Transliterator::utf8ToAscii($subpart[0]);
                        $altered .= $trans . '"'. $subpart[1];
//echo "\naltered-2: ".$trans . '"'. $subpart[1];
                    }else{
                        $altered .= $part[1];
//echo "\naltered-2: ".$part[1];
                    }
//echo "\n";
                }else{
                    $altered .= $line;
                }
            }
        }
        if($found_any_delimiters == 0){
            $altered .= $line;
        }
    }
    fclose($handle);
}else{
    die("error opening file");
}

$nob = file_put_contents ("build/index.html", $altered);
echo $nob." bytes written.\n";