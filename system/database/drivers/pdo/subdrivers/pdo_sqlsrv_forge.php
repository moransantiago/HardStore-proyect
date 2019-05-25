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
 * @since	Version 1.3.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Postgre Database Adapter Class
 *
 * Note: _DB is an extender class that the app controller
 * creates dynamically based on whether the query builder
 * class is being used or not.
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/database/
 */
class CI_DB_postgre_driver extends CI_DB {

	/**
	 * Database driver
	 *
	 * @var	string
	 */
	public $dbdriver = 'postgre';

	/**
	 * Database schema
	 *
	 * @var	string
	 */
	public $schema = 'public';

	// --------------------------------------------------------------------

	/**
	 * ORDER BY random keyword
	 *
	 * @var	array
	 */
	protected $_random_keyword = array('RANDOM()', 'RANDOM()');

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * Creates a DSN string to be used for db_connect() and db_pconnect()
	 *
	 * @param	array	$params
	 * @return	void
	 */
	public function __construct($params)
	{
		parent::__construct($params);

		if ( ! empty($this->dsn))
		{
			return;
		}

		$this->dsn === '' OR $this->dsn = '';

		if (strpos($this->hostname, '/') !== FALSE)
		{
			// If UNIX sockets are used, we shouldn't set a port
			$this->port = '';
		}

		$this->hostname === '' OR $this->dsn = 'host='.$this->hostname.' ';

		if ( ! empty($this->port) && ctype_digit($this->port))
		{
			$this->dsn .= 'port='.$this->port.' ';
		}

		if ($this->username !== '')
		{
			$this->dsn .= 'user='.$this->username.' ';

			/* An empty password is valid!
			 *
			 * $db['password'] = NULL must be done in order to ignore it.
			 */
			$this->password === NULL OR $this->dsn .= "password='".$this->password."' ";
		}

		$this->database === '' OR $this->dsn .= 'dbname='.$this->database.' ';

		/* We don't have these options as elements in our standard configuration
		 * array, but they might be set by parse_url() if the configuration was
		 * provided via string. Example:
		 *
		 * postgre://username:password@localhost:5432/database?connect_timeout=5&sslmode=1
		 */
		foreach (array('connect_timeout', 'options', 'sslmode', 'service') as $key)
		{
			if (isset($this->$key) && is_string($this->$key) && $this->$key !== '')
			{
				$this->dsn .= $key."='".$this->$key."' ";
			}
		}

		$this->dsn = rtrim($this->dsn);
	}

	// --------------------------------------------------------------------

	/**
	 * Database connection
	 *
	 * @param	bool	$persistent
	 * @return	resource
	 */
	public function db_connect($persistent = FALSE)
	{
		$this->conn_id = ($persistent === TRUE)
			? pg_