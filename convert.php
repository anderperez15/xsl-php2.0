<?php
function readDocx($filePath) {

    $zip = new ZipArchive;
    $dataFile = 'word/document.xml';

    if (true === $zip->open($filePath)) {

        if (($index = $zip->locateName($dataFile)) !== false) {

            $data = $zip->getFromIndex($index);

            $zip->close();
            $xml = DOMDocument::loadXML($data);

            $xsl = new DOMDocument;
            $xsl->load('./template-xsl/style.xslt');

            $proc = new XSLTProcessor();
                    
            $proc->importStyleSheet($xsl);
            return $proc->transformToXML($xml);
        }
        $zip->close();
    }
    return "<h1 style='color:red'>¡No se encontró el archivo, verifique si la dirección es correcta!</h1>";
}

?>
