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
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDO IBM DB2 Forge Class
 *
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/database/
 */
class CI_DB_pdo_ibm_forge extends CI_DB_pdo_forge {

	/**
	 * RENAME TABLE IF statement
	 *
	 * @var	string
	 */
	protected $_rename_table	= 'RENAME TABLE %s TO %s';

	/**
	 * UNSIGNED support
	 *
	 * @var	array
	 */
	protected $_unsigned		= array(
		'SMALLINT'	=> 'INTEGER',
		'INT'		=> 'BIGINT',
		'INTEGER'	=> 'BIGINT'
	);

	/**
	 * DEFAULT value representation in CREATE/ALTER TABLE statements
	 *
	 * @var	string
	 */
	protected $_default		= FALSE;

	// --------------------------------------------------------------------

	/**
	 * ALTER TABLE
	 *
	 * @param	string	$alter_type	ALTER type
	 * @param	string	$table		Table name
	 * @param	mixed	$field		Column definition
	 * @return	string|string[]
	 */
	protected function _alter_table($alter_type, $table, $field)
	{
		if ($alter_type === 'CHANGE')
		{
			$alter_type = 'MODIFY';
		}

		return parent::_alter_table($alter_type, $table, $field);
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute TYPE
	 *
	 * Performs a data type mapping between different databases.
	 *
	 * @param	array	&$attributes
	 * @return	void
	 */
	protected function _attr_type(&$attributes)
	{
		switch (strtoupper($attributes['TYPE']))
		{
			case 'TINYINT':
				$attributes['TYPE'] = 'SMALLINT';
				$attributes['UNSIGNED'] = FALSE;
				return;
			case 'MEDIUMINT':
				$attributes['TYPE'] = 'INTEGER';
				$attributes['UNSIGNED'] = FALSE;
				return;
			default: return;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute UNIQUE
	 *
	 * @param	array	&$attributes
	 * @param	array	&$field
	 * @return	void
	 */
	protected function _attr_unique(&$attributes, &$field)
	{
		if ( ! empty($attributes['UNIQUE']) && $attributes['UNIQUE'] === TRUE)
		{
			$field['unique'] = ' UNIQUE';

			// UNIQUE must be used with NOT NULL
			$field['null'] = ' NOT NULL';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Field attribute AUTO_INCREMENT
	 *
	 * @param	array	&$attributes
	 * @param	array	&$field
	 * @return	void
	 */
	protected function _attr_auto_increment(&$attributes, &$field)
	{
		// Not supported
	}

}
                         

<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Creating Ancillary Classes &mdash; CodeIgniter 3.1.10 documentation</title>
  

  
  
    <link rel="shortcut icon" href="../_static/ci-icon.ico"/>
  

  
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Roboto+Slab:400,700|Inconsolata:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

  
  
    

  

  
  
    <link rel="stylesheet" href="../_static/css/citheme.css" type="text/css" />
  

  
        <link rel="index" title="Index"
              href="../genindex.html"/>
        <link rel="search" title="Search" href="../search.html"/>
    <link rel="top" title="CodeIgniter 3.1.10 documentation" href="../index.html"/>
        <link rel="up" title="General Topics" href="index.html"/>
        <link rel="next" title="Hooks - Extending the Framework Core" href="hooks.html"/>
        <link rel="prev" title="Creating Core System Classes" href="core_classes.html"/> 

  
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
<li class="toctree-l2"><a class="reference internal" href="../overview/