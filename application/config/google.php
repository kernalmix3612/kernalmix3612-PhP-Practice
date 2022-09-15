<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '565398353059-1eppi7bg2lih53ae86ntd3ch6pubo0pq.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'https://infs3202-f5ec8479.uqcloud.net/project1/login';
$config['google']['application_name'] = 'GoogleLogin';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();