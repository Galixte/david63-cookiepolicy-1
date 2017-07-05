<?php
/**
*
* @package Cookie Policy Extension
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\cookiepolicy\controller;

use \phpbb\controller\helper;
use \phpbb\template\template;
use \phpbb\config\config;
use \phpbb\language\language;

class main_controller implements main_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\language\language */
	protected $language;

	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config		Config object
	* @param \phpbb\controller\helper	$helper		Helper object
	* @param \phpbb\template\template	$template	Template object
	* @param \phpbb\language\language	$language	Language object
	*/
	public function __construct(helper $helper, template $template, config $config, language $language)
	{
		$this->config	= $config;
		$this->helper	= $helper;
		$this->template	= $template;
		$this->language	= $language;
	}

	/**
	* Controller for route /cookiepolicy/{name}
	*
	* @param string		$name
	* @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function cookieoutput($name)
	{
		switch ($name)
		{
			case 'policy':
				$this->template->assign_var('COOKIE_MESSAGE', $this->language->lang('COOKIE_TEXT', $this->config['sitename']));
				$output_name = $this->language->lang('COOKIE_POLICY');
			break;

			case 'access':
				$this->template->assign_var('COOKIE_MESSAGE', $this->language->lang('COOKIE_REQUIRE_ACCESS', $this->config['sitename']));
				$output_name = $this->language->lang('COOKIE_ACCESS');
			break;
		}

		$this->template->assign_vars(array(
			'COOKIE_PAGE_BG_COLOUR'		=> $this->config['cookie_page_bg_colour'],
			'COOKIE_PAGE_CORNERS'		=> $this->config['cookie_page_corners'],
			'COOKIE_PAGE_RADIUS'		=> $this->config['cookie_page_radius'],
			'COOKIE_PAGE_TXT_COLOUR'	=> $this->config['cookie_page_txt_colour'],

			'S_COOKIE_CUSTOM_PAGE'		=> $this->config['cookie_custom_page'],
		));

		return $this->helper->render('cookie_body.html', $output_name);
	}
}
