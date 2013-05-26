

Phsocks | Simple PHP SOCKS5 Proxy Client
================================

Phsocks is a simple, easy to use and lightweight PHP class, primarily for tunneling sockets through a SOCKS proxy.

Phsocks is designed to work as a replacement of functions like fsockopen.

With basic error checking, you can easily adapt your script / application to permanently use a SOCKS proxy.

Features of Phsocks

* Lightweight and simple
* Error checking and reporting
* SOCKS5 core functionality
* No pre-requisets required


How do I use it?
-------------------------

Phsocks should be added at the start of your script.

	require 'phsocks.php';

To open a socket via your proxy, you should create a new class specified as

	phsock(remotehost,remoteport,proxyhost,proxyport)
	
Here's an example.

	$phsock = new phsock("github.com",80,"localhost",9150);
	
You can check to see if your socket has been opened by doing

	if ($phsock->ready) {
		//Socket is ready for writing.
	}

Data can be written to an open socket using

	$phsock->ph\_write("This is a test message");
	
Data can be read by using

	$data = $phsock->ph\_read(numberofbytes);

Reading data should be done in a looping fashion.

You should refer to example.php for better examples.

Questions
--------------------

Questions should be pointed to [bitaurora [at] tormail [dot] org] [1]

  [1]: mailto:bitaurora@tormail.org        "bitaurora [at] tormail [dot] org"

