<?php

// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('search_wsdl', 'urn:search_wsdl');
// Register the method to expose
$server->register('search',           // method name
    array('keyword' => 'xsd:string'), // input parameters
    array('return' => 'xsd:string'),  // output parameters
    'urn:search_wsdl',                // namespace
    'urn:search_wsdl#search',         // soapaction
    'rpc',                            // style
    'encoded',                        // use
    'Searches for the given keyword.' // documentation
);

// Define the method as a PHP function
function search($name) {
    return 'No results found for: '.$name;
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>

