<?php
require_once 'vendor/autoload.php';
use Behat\Transliterator\Transliterator;

$delimiters = array('h2', 'h1');

//backup original file
$file = file_get_contents("build/index.html", "r");
file_put_contents ("build/index0.html", $file);

$altered = "";
$handle = fopen("build/index.html", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $found_any_delimiters = 0;
        foreach($delimiters as $key){
            $test = preg_match('/<'.$key.'/', $line);
            if($test == 1){
                $found_any_delimiters = 1;
                $part = \explode($key.' id="', $line);
                if(count($part) > 1){
                    $altered .= $part[0] . $key.' id="';
                    $subpart = \explode('"', $part[1]);
                    if(count($subpart) > 1){
                        $trans = Transliterator::utf8ToAscii($subpart[0]);
                        $altered .= $trans . '"'. $subpart[1];
                    }else{
                        $altered .= $part[1];
                    }
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