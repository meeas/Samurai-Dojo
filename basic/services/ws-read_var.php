<?php

// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('read_var_wsdl', 'urn:read_var_wsdl');
// Register the method to expose
$server->register('read_var',                 // method name
    array('name' => 'xsd:string'),            // input parameters
    array('return' => 'xsd:string'),          // output parameters
    'urn:read_var_wsdl',                      // namespace
    'urn:read_var_wsdl#read_var',             // soapaction
    'rpc',                                    // style
    'encoded',                                // use
    'Displays environmental variable values.' // documentation
);

function sanitize($input) {
    $pattern = '/[;&|]/';
    $filtered = preg_replace($pattern, "", $input);
    return $filtered;
}

// Define the method as a PHP function
function read_var($name) {
    //if (preg_match('/[;&|]/', $hostname)) {
    //    return 'malicious characters found!';
    //}
    exec('echo '.sanitize($name), $output);
    $results = "";
    while (list($key, $val) = each($output)):
        $results = $results.$val."\n";
    endwhile;
    return $results;
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
