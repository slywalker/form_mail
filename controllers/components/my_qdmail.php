<?php
App::import('Component', 'Qdmail');
App::import('Component', 'Qdsmtp');

class MyQdmailComponent extends QdmailComponent
{
	function startup(&$controller)
	{
		$result = parent::startup($controller);
		$iniFile = APP.'plugins'.DS.'form_mail'.DS.'config'.DS.'smtp.ini.php';
		$params = parse_ini_file($iniFile);
		if ($params) {
			$this->smtp(true);
			$this->smtpServer($params);
		}
		return $result;
	}

	function template($template = null, $layout = null, $org_charset = null, $target_charset = 'iso-2022-jp', $enc = null, $wordwrap_length = null)
	{
		return parent::cakeText(null, $template, $layout, $org_charset, $target_charset, $enc, $wordwrap_length);
	}
}
?>