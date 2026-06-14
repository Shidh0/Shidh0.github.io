<?php
// 1. Load the XML file
$xmlFile = 'data.xml';

if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    
    // 2. Extract the IP address from the <ip> tag
    $targetIP = trim($xml->ip);

    // 3. Ensure the IP has a protocol so the browser doesn't think it's a local folder
    if (!preg_match("~^(?:f|ht)tps?://~i", $targetIP)) {
        $targetIP = "http://" . $targetIP;
    }

    // 4. Perform the instant redirect
    header("Location: " . $targetIP);
    exit;
} else {
    // Fallback if the XML file is missing
    echo "Redirect configuration file not found.";
}
?>
