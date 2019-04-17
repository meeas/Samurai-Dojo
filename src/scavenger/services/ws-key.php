<?php

// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('key_wsdl', 'urn:key_wsdl');
// Register the method to expose
$server->register('get_key',           // method name
    array('password' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'),   // output parameters
    'urn:key_wsdl',                    // namespace
    'urn:key_wsdl#get_key',            // soapaction
    'rpc',                             // style
    'encoded',                         // use
    'Returns KEY12.'                   // documentation
);

// Define the method as a PHP function
function get_key($password) {
    if ($password == 'samurai') {
        return 'b337e84de8752b27eda3a12363109e80';
    } else {
        return 'What is the samurai password?';
    }
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>

