<?php

include '../config.inc';
include '../opendb.inc';

// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('account_info_wsdl', 'urn:account_info_wsdl');
// Register the method to expose
$server->register('account_info',                   // method name
    array('username' => 'xsd:string'),              // input parameters
    array('return' => 'xsd:string'),                // output parameters
    'urn:account_info_wsdl',                        // namespace
    'urn:account_info_wsdl#account_info',           // soapaction
    'rpc',                                          // style
    'encoded',                                      // use
    'Queries the database for account information.' // documentation
);

// Define the method as a PHP function
function account_info($id) {
    $getid = "SELECT * FROM accounts WHERE username = '$id'";
    $result = mysql_query($getid) or die(mysql_error());
    $results = '';
    while($row = mysql_fetch_array($result, MYSQLI_NUM)) {
        // Print out the contents of the entry 
        $results .= implode("|", $row)."\n";
    }
    return $results;
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
