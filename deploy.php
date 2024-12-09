<?php 
/*
foreach (glob("*.*") as $filename) {
     
    $navegacao = "./";
    $folders = explode("\\", $filename);
    if (count($folders)>1) {
        for($i = 0; $i < count($folders); $i++) {
            if ( stripos($folders[$i],".") === false ) {
                mkdir($navegacao . $folders[$i]);
                $navegacao = $navegacao . $folders[$i] . "/";
                echo "Criado o diretorio $navegacao <br>\n";
            }
        }
    }
    
    if ( rename($filename, "./" . str_replace("\\","/",$filename) ) ) {
        echo "File $filename was renamed to " . "./" . str_replace("\\","/",$filename) . "<br>\n";
    } else {
        echo "Erro renamming file $filename to " .  "./" . str_replace("\\","/",$filename) . "<br>\n";
    }
}
*/

$zip = new ZipArchive;
  
// Zip File Name
if ($zip->open('emprestimo.zip') === TRUE) {
    
    $zip->extractTo(".");
    $zip->close();
    echo "Unzipped Process Successful!\n";
    
    foreach (glob("*.*") as $filename) {
        rename($filename, str_replace($filename,"\\",DIRECTORY_SEPARATOR));
    }
     
} else {
    
    echo "Unzipped Process failed/n";
    
}

?>