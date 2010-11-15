<?php

/*
	Phoronix Test Suite
	URLs: http://www.phoronix.com, http://www.phoronix-test-suite.com/
	Copyright (C) 2008 - 2010, Phoronix Media
	Copyright (C) 2008 - 2010, Michael Larabel

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

pts_load_xml_definitions("test-installation.xml");

class pts_installed_test
{
	private $xml_parser;
	private $identifier;

	public function __construct($identifier)
	{
		$this->identifier = $identifier;
		$read_xml = is_file(PTS_TEST_INSTALL_PATH . $identifier . "/pts-install.xml") ? PTS_TEST_INSTALL_PATH . $identifier . "/pts-install.xml" : null;
		$this->xml_parser = new nye_XmlReader($read_xml);
	}
	public function get_install_date_time()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_INSTALLTIME);
	}
	public function get_install_date()
	{
		return substr($this->get_install_date_time(), 0, 10);
	}
	public function get_last_run_date_time()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_LASTRUNTIME);
	}
	public function get_last_run_date()
	{
		return substr($this->get_install_date_time(), 0, 10);
	}
	public function get_installed_version()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_VERSION);
	}
	public function get_average_run_time()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_AVG_RUNTIME);
	}
	public function get_latest_run_time()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_LATEST_RUNTIME);
	}
	public function get_latest_install_time()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_INSTALLTIME_LENGTH);
	}
	public function get_run_count()
	{
		return ($times_run = $this->xml_parser->getXMLValue(P_INSTALL_TEST_TIMESRUN)) != false ? $times_run : 0;
	}
	public function get_installed_checksum()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_CHECKSUM);
	}
	public function get_installed_system_identifier()
	{
		return $this->xml_parser->getXMLValue(P_INSTALL_TEST_SYSIDENTIFY);
	}
}

?>
