<?php
/*
 * @package phsocks
 * @version 0.0.2
 * @author BitAurora.org
 * 
 * Phsocks SOCKS5 class example
 * Fetches your proxy servers public IP address.
 * 
 * ~BitAurora.org
*/

require_once 'class/phsocks.php';

//Open a connection to the destination host, through our local socks proxy server on port 9150.
$phsock = new phsock("wtfismyip.com",80,"localhost",9150);
if (!$phsock->ready) {
	die ("Something went wrong!\n");
}

//Post some data through the proxy socket.
$phsock->ph_write("GET /text HTTP/1.1\r\nHost: wtfismyip.com\r\nUser-agent: Phsocks\r\nConnection: close\r\n\r\n");

$data_buffer = null;

//Read data returned through the proxy socket.
while (1) {
	$data_buffer .= $phsock->ph_read(8192);
	if ( strpos ($data_buffer,"\r\n\r\n") > 0 ) {
		//End of packet sequence
		break;
	}
}

//Strip the IP address from the packet
$ip = explode("\r\n\r\n",$data_buffer);

print "Your proxy's IP address appears to be ".$ip[1];

//Cleanly close the sockets.
unset($phsock);

?>