<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Cookie Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/cookie_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('set_cookie'))
{
	/**
	 * Set cookie
	 *
	 * Accepts seven parameters, or you can submit an associative
	 * array in the first parameter containing all the values.
	 *
	 * @param	mixed
	 * @param	string	the value of the cookie
	 * @param	string	the number of seconds until expiration
	 * @param	string	the cookie domain.  Usually:  .yourdomain.com
	 * @param	string	the cookie path
	 * @param	string	the cookie prefix
	 * @param	bool	true makes the cookie secure
	 * @param	bool	true makes the cookie accessible via http(s) only (no javascript)
	 * @return	void
	 */
	function set_cookie($name, $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = NULL, $httponly = NULL)
	{
		// Set the config file options
		get_instance()->input->set_cookie($name, $value, $expire, $domain, $path, $prefix, $secure, $httponly);
	}
}

// --------------------------------------------------------------------

if ( ! function_exists('get_cookie'))
{
	/**
	 * Fetch an item from the COOKIE array
	 *
	 * @param	string
	 * @param	bool
	 * @return	mixed
	 */
	function get_cookie($index, $xss_clean = NULL)
	{
		is_bool($xss_clean) OR $xss_clean = (config_item('global_xss_filtering') === TRUE);
		$prefix = isset($_COOKIE[$index]) ? '' : config_item('cookie_prefix');
		return get_instance()->input->cookie($prefix.$index, $xss_clean);
	}
}

// --------------------------------------------------------------------

if ( ! function_exists('delete_cookie'))
{
	/**
	 * Delete a COOKIE
	 *
	 * @param	mixed
	 * @param	string	the cookie domain. Usually: .yourdomain.com
	 * @param	string	the cookie path
	 * @param	string	the cookie prefix
	 * @return	void
	 */
	function delete_cookie($name, $domain = '', $path = '/', $prefix = '')
	{
		set_cookie($name, '', '', $domain, $path, $prefix);
	}
}
                                                                                                                                                                                                                                                           

<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Handling Multiple Environments &mdash; CodeIgniter 3.1.10 documentation</title>
  

  
  
    <link rel="shortcut icon" href="../_static/ci-icon.ico"/>
  

  
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Roboto+Slab:400,700|Inconsolata:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

  
  
    

  

  
  
    <link rel="stylesheet" href="../_static/css/citheme.css" type="text/css" />
  

  
        <link rel="index" title="Index"
              href="../genindex.html"/>
        <link rel="search" title="Search" href="../search.html"/>
    <link rel="top" title="CodeIgniter 3.1.10 documentation" href="../index.html"/>
        <link rel="up" title="General Topics" href="index.html"/>
        <link rel="next" title="Alternate PHP Syntax for View Files" href="alternative_php.html"/>
        <link rel="prev" title="Managing your Applications" href="managing_apps.html"/> 

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>

</head>

<body class="wy-body-for-nav" role="document">

  <div id="nav">
  <div id="nav_inner">
    
    
    
      <div id="pulldown-menu" class="ciNav">
        <ul>
<li class="toctree-l1"><a class="reference internal" href="welcome.html">Welcome to CodeIgniter</a></li>
</ul>
<ul>
<li class="toctree-l1"><a class="reference internal" href="../installation/index.html">Installation Instructions</a><ul>
<li class="toctree-l2"><a class="reference internal" href="../installation/downloads.html">Downloading CodeIgniter</a></li>
<li class="toctree-l2"><a class="reference internal" href="../installation/index.html">Installation Instructions</a></li>
<li class="toctree-l2"><a class="reference internal" href="../installation/upgrading.html">Upgrading From a Previous Version</a></li>
<li class="toctree-l2"><a class="reference internal" href="../installation/troubleshooting.html">Troubleshooting</a></li>
</ul>
</li>
</ul>
<ul>
<li class="toctree-l1"><a class="reference internal" href="../overview/index.html">CodeIgniter Overview</a><ul>
<li class="toctree-l2"><a class="reference internal" href="../overview/getting_started.html">Getting Started</a></li>
<li class="toctree-l2"><a class="reference internal" href="../overview/at_a_glance.html">CodeIgniter at a Glance</a></li>
<li class="toctree-l2"><a class="reference internal" href="../overview/features.html">Supported Features</a></li>
<li class="toctree-l2"><a class="reference internal" href="../overview/appflow.html">Application Flow Chart</a></li>
<li class="toctree-l2"><a class="reference internal" href="../overview/mvc.html">Model-View-Controller</a></li>
<li class="toctree-l2"><a class="reference internal" href="../overview/goals.html">Architectural Goals</a></li>
</ul>
</li>
</ul>
<ul>
<li class="toctree-l1"><a class="reference internal" href="../tutorial/index.html">Tutorial</a><ul>
<li class="toctree-l2"><a class="reference internal" href="../tutorial/static_pages.html">Static pages</a></li>
<li class="toctree-l2"><a class="reference internal" href="../tutorial/news_section.html">News section</a></li>
<li class="toctree-l2"><a class="reference internal" href="../tutorial/create_news_items.html">Create news items</a></li>
<li class="toctree-l2"><a class="reference internal" href="../tutorial/conclusion.html">Conclusion</a></li>
</ul>
</li>
</ul>
<ul>
<li class="toctree-l1"><a class="reference internal" href="../contributing/index.html">Contributing to CodeIgniter</a><ul>
<li class="toctree-l2"><a class="reference internal" href="../documentation/index.html">Writing CodeIgniter Documentation</a></li>
<li class="toctree-l2"><a class="reference internal" href="../DCO.html">Developer’s Certificate of Origin 1.1</a></li>
</ul>
</li>
</ul>
<ul class="current">
<li class="toctree-l1 current"><a class="reference internal" href="index.html">General Topics</a><ul class="current">
<li class="toctree-l2"><a class="reference internal" href="urls.html">CodeIgniter URLs</a></li>
<li class="toctree-l2"><a class="reference internal" href="controllers.html">Controllers</a></li>
<li class="toctree-l2"><a class="reference internal" href="reserved_names.html">Reserved Names</a></li>
<li class="toctree-l2"><a class="reference internal" href="views.html">Views</a></li>
<li class="toctree-l2"><a class="reference internal" href="models.html">Models</a></li>
<li class="toctree-l2"><a class="reference internal" href="helpers.html">Helpers</a></li>
<li class="toctree-l2"><a class="reference internal" href="libraries.html">Using CodeIgniter Libraries</a></li>
<li class="toctree-l2"><a class="reference internal" href="creating_libraries.html">Creating Libraries</a></li>
<li class="toctree-l2"><a class="reference internal" href="drivers.html">Using CodeIgniter Drivers</a></li>
<li class="toctree-l2"><a class="reference internal" href="creating_drivers.html">Creating Drivers</a></li>
<li class="toctree-l2"><a class="reference internal" href="core_classes.html">Creating Core System Classes</a></li>
<li class="toctree-l2"><a class="reference internal" href="ancillary_classes.html">Creating Ancillary Classes</a></li>
<li class="toctree-l2"><a class="reference internal" href="hooks.html">Hoo