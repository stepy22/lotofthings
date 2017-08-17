<?php

$xmlTekst = <<<XML
<mojxml>
<element>
moj element
</element>
<element>
moj element 123
</element>
<element>
Treci
</element>
</mojxml>
XML;

$xml = new SimpleXMLElement($xmlTekst);
//Nakon kreiranog objekta, lako dolazimo do elemenata kroz strukturu samog objekta 
//koja se kreira na osnovu strukture xml dokumenta
echo $xml->element[2];
?>