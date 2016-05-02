<?php
/**
*
* @package Cookie Policy Extension
* @copyright (c) 2014 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\cookiepolicy\controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use david63\cookiepolicy\ext;

/**
* Admin controller
*/
class admin_controller implements admin_interface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var ContainerInterface */
	protected $container;

	/** @var phpbb\language\language */
	protected $language;

	/** @var string Custom form action */
	protected $u_action;

	/**
	* Constructor for admin controller
	*
	* @param \phpbb\config\config		$config		Config object
	* @param \phpbb\request\request		$request	Request object
	* @param \phpbb\template\template	$template	Template object
	* @param \phpbb\user				$user		User object
	* @param ContainerInterface			$container	Service container interface
	* @param phpbb\language\language	$language
	*
	* @return \david63\cookiepolicy\controller\admin_controller
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, ContainerInterface $container, \phpbb\language\language $language)
	{
		$this->config		= $config;
		$this->request		= $request;
		$this->template		= $template;
		$this->user			= $user;
		$this->container	= $container;
		$this->language		= $language;
	}

	/**
	* Display the options a user can configure for this extension
	*
	* @return null
	* @access public
	*/
	public function display_options()
	{

		// Add the language file
		$this->language->add_lang('acp_cookiepolicy', 'david63/cookiepolicy');

		// Create a form key for preventing CSRF attacks
		$form_key = 'cookiepolicy_manage';
		add_form_key($form_key);

		// Is the form being submitted?
		if ($this->request->is_set_post('submit'))
		{
			// Is the submitted form is valid?
			if (!check_form_key($form_key))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			// If no errors, process the form data
			// Set the options the user configured
			$this->set_options();

			// Add option settings change action to the admin log
			$phpbb_log = $this->container->get('log');
			$phpbb_log->add('admin', $this->user->data['user_id'], $this->user->ip, 'COOKIE_POLICY_LOG');

			// Option settings have been updated and logged
			// Confirm this to the user and provide link back to previous page
			trigger_error($this->language->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
		}

		// Get the IP address of the requesting server
		// Check if cURL is available on the server
		$curl		= false;
		$request_ip	= '';
		if (function_exists('curl_version'))
		{
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl_handle, CURLOPT_URL, 'http://ip-api.com/json?fields=query');

			$ip_query = curl_exec($curl_handle);
			curl_close($curl_handle);

			$ip_array	= json_decode($ip_query, true);
			$request_ip	= $ip_array['query'];
			$curl		= true;
		}

		// Set output vars for display in the template
		$this->template->assign_vars(array(
			'COOKIE_BOX_BDR_COLOUR'		=> isset($this->config['cookie_box_bdr_colour']) ? $this->config['cookie_box_bdr_colour'] : '',
			'COOKIE_BOX_BDR_WIDTH'		=> isset($this->config['cookie_box_bdr_width']) ? $this->config['cookie_box_bdr_width'] : '',
			'COOKIE_BOX_BG_COLOUR'		=> isset($this->config['cookie_box_bg_colour']) ? $this->config['cookie_box_bg_colour'] : '',
			'COOKIE_BOX_HREF_COLOUR'	=> isset($this->config['cookie_box_href_colour']) ? $this->config['cookie_box_href_colour'] : '',
			'COOKIE_BOX_POSITION'		=> isset($this->config['cookie_box_position']) ? $this->config['cookie_box_position'] : '',
			'COOKIE_BOX_TXT_COLOUR'		=> isset($this->config['cookie_box_txt_colour']) ? $this->config['cookie_box_txt_colour'] : '',
			'COOKIE_CUSTOM_PAGE'		=> isset($this->config['cookie_custom_page']) ? $this->config['cookie_custom_page'] : '',
			'COOKIE_PAGE_BG_COLOUR'		=> isset($this->config['cookie_page_bg_colour']) ? $this->config['cookie_page_bg_colour'] : '',
			'COOKIE_PAGE_TXT_COLOUR'	=> isset($this->config['cookie_page_txt_colour']) ? $this->config['cookie_page_txt_colour'] : '',
			'COOKIE_POLICY_ENABLED'		=> isset($this->config['cookie_policy_enabled']) ? $this->config['cookie_policy_enabled'] : '',
			'COOKIE_POLICY_EU_DETECT'	=> isset($this->config['cookie_eu_detect']) ? $this->config['cookie_eu_detect'] : '',
			'COOKIE_POLICY_EXPIRE'		=> isset($this->config['cookie_expire']) ? $this->config['cookie_expire'] : '',
			'COOKIE_POLICY_LOG_ERRORS'	=> isset($this->config['cookie_log_errors']) ? $this->config['cookie_log_errors'] : '',
			'COOKIE_POLICY_ON_INDEX'	=> isset($this->config['cookie_on_index']) ? $this->config['cookie_on_index'] : '',
			'COOKIE_POLICY_VERSION'		=> ext::COOKIE_POLICY_VERSION,
			'COOKIE_SHOW_POLICY'		=> isset($this->config['cookie_show_policy']) ? $this->config['cookie_show_policy'] : '',
			'CURL'						=> $curl,

			'U_ACTION' 					=> $this->u_action,
			'UNBAN_TEXT'				=> $this->language->lang('UNBAN_IP_EXPLAIN', ext::LOOKUP_REQUEST_LIMIT, $request_ip),
		));
	}

	/**
	* Set the options a user can configure
	*
	* @return null
	* @access protected
	*/
	protected function set_options()
	{
		$this->config->set('cookie_box_bdr_colour', $this->request->variable('cookie_box_bdr_colour', ''));
		$this->config->set('cookie_box_bdr_width', $this->request->variable('cookie_box_bdr_width', ''));
		$this->config->set('cookie_box_bg_colour', $this->request->variable('cookie_box_bg_colour', ''));
		$this->config->set('cookie_box_href_colour', $this->request->variable('cookie_box_href_colour', ''));
		$this->config->set('cookie_box_position', $this->request->variable('cookie_box_position', ''));
		$this->config->set('cookie_box_txt_colour', $this->request->variable('cookie_box_txt_colour', ''));
		$this->config->set('cookie_custom_page', $this->request->variable('cookie_custom_page', 0));
		$this->config->set('cookie_eu_detect', $this->request->variable('cookie_eu_detect', ''));
		$this->config->set('cookie_expire', $this->request->variable('cookie_expire', 0));
		$this->config->set('cookie_log_errors', $this->request->variable('cookie_log_errors', 0));
		$this->config->set('cookie_on_index', $this->request->variable('cookie_on_index', 0));
		$this->config->set('cookie_page_bg_colour', $this->request->variable('cookie_page_bg_colour', ''));
		$this->config->set('cookie_page_txt_colour', $this->request->variable('cookie_page_txt_colour', ''));
		$this->config->set('cookie_policy_enabled', $this->request->variable('cookie_policy_enabled', ''));
		$this->config->set('cookie_show_policy', $this->request->variable('cookie_show_policy', 0));
	}
}
