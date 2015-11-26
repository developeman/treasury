<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],
	
	'paypal' => [
    	'client_id' => 'ASbjdSejFyKDbBLoI1Fpo25V3nYtgvKn-aLi99jb9N0ZBX0-jAk4fOL1SPlXkYvyZSOy9X1d18oCtXQ-',
    	'secret' => 'EIYcLyB70LWu3q6fO-7RZ4oi3Lfq2WvJlJ-tvNMLP_o421xh0xelXMOF-oP7vl_W11FWK24zwUl0_itQ'
	],

	'smsapi' => [
		'api_id'  => '3571643',
		'from'  => '3571643',
		'user'  => 'TRESOR PUBLIC',
		'password' => '1974@1974',
	],
	

];
