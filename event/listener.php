<?php
/**
*
* @package Cookie Policy Extension
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\cookiepolicy\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use \phpbb\config\config;
use \phpbb\template\template;
use \phpbb\user;
use \phpbb\log\log;
use \phpbb\controller\helper;
use \phpbb\request\request;
use \phpbb\request\request_interface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\log */
	protected $log;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\request\request */
	protected $request;

	/**
	* Constructor for listener
	*
	* @param \phpbb\config\config		$config		Config object
	* @param \phpbb\template\template	$template	Template object
	* @param \phpbb\user                $user		User object
	* @param \phpbb\log\log				$log		phpBB log
	* @param \phpbb\controller\helper	$helper		Helper object
	* @param \phpbb\request\request		$request	Request object
	*
	* @return \david63\cookiepolicy\event\listener
	* @access public
	*/
	public function __construct(config $config, template $template, user $user, log $log, helper $helper, request $request)
	{
		$this->config	= $config;
		$this->template	= $template;
		$this->user		= $user;
		$this->log		= $log;
		$this->helper	= $helper;
		$this->request	= $request;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_footer'			=> 'page_footer',
			'core.page_header'			=> 'page_header',
			'core.page_header_after'	=> 'check_cookie',
			'core.user_setup'			=> 'load_language_on_setup',
		);
	}

    /**
     * Block links if option sey
     *
     * @param $event
     *
     * @return array
     * @static
     * @access public
     */
	public function check_cookie($event)
	{
		if ($this->config['cookie_policy_enabled'])
		{
			if ($this->config['cookie_require_access'] && !isset($_COOKIE[$this->config['cookie_name'] . '_ca']))
			{
				$this->template->assign_vars(array(
					'U_REGISTER'		=> $this->helper->route('david63_cookiepolicy_cookieoutput', array('name' => 'access')),
					'U_LOGIN_LOGOUT'	=> $this->helper->route('david63_cookiepolicy_cookieoutput', array('name' => 'access')),
				));
			}

			// Disable phpBB Cookie Notice
			$this->template->assign_var('S_COOKIE_NOTICE', false);
		}
	}

	/**
	* Load common cookie policy language files during user setup
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function load_language_on_setup($event)
	{
		// Only load the language if it is required
		if ($this->config['cookie_policy_enabled'] || $this->config['cookie_show_policy'])
		{
			$lang_set_ext	= $event['lang_set_ext'];
			$lang_set_ext[]	= array(
				'ext_name' => 'david63/cookiepolicy',
				'lang_set' => 'cookiepolicy',
			);
			$event['lang_set_ext'] = $lang_set_ext;
		}
	}

	/**
	* Create the options to show the cookie acceptance box
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function page_header($event)
	{
		$cookie_enabled = $this->config['cookie_policy_enabled'];

		// If we have already set the cookie on this device then there is no need to process
		$cookie_set = $this->request->is_set($this->config['cookie_name'] . '_ca', request_interface::COOKIE) ? true : false;

		if ($cookie_enabled && !$this->user->data['is_bot'] && !$cookie_set)
		{
			// Let's try to stop some spam attacks - check if the same IP as the last is being requested
			if ($this->user->ip != $this->config['cookie_last_ip'])
			{
				// Check if cURL is available on the server
				if (function_exists('curl_version'))
				{
					$curl_handle = curl_init();
					curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
					curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl_handle, CURLOPT_URL, 'freegeoip.net/json/' . $this->user->ip);

					$ip_query	= curl_exec($curl_handle);
					$http_code	= curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
					curl_close($curl_handle);

					switch ($http_code)
					{
						case 200: // Success
							$ip_array = json_decode($ip_query, true);
							$eu_array = array('AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'EU', 'FI', 'FR', 'FX', 'GB', 'GR', 'HR', 'HU', 'IE', 'IM', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK', 'UK');

							if (!in_array($ip_array['country_code'], $eu_array))
							{
								// IP not in an EU country therefore we do not need to invoke the Cookie Policy
								$cookie_enabled = false;
							}

							// This lookup was successful so unset the quota flag
							$this->config->set('cookie_quota_exceeded', false, false);
						break;

						case 403: // Quota exceeded
							// No need to report every occurence
							if (!$this->config['cookie_quota_exceeded'])
							{
								$this->log->add('critical', $this->user->data['user_id'], $this->user->ip, 'LOG_QUOTA_EXCEEDED');

								// Quota exceeded so set the flag to prevet excessive logging
								$this->config->set('cookie_quota_exceeded', true, false);
							}
						break;

						case 404: // Not found
							$this->log->add('critical', $this->user->data['user_id'], $this->user->ip, 'LOG_SERVER_ERROR');
						break;

						default: // Any other condition
							$this->log->add('critical', $this->user->data['user_id'], $this->user->ip, 'LOG_IP_LOOKUP_ERROR');
						break;
					}
				}
				else
				{
					$this->log->add('critical', $this->user->data['user_id'], $this->user->ip, 'LOG_CURL_ERROR');
				}

				// Update last IP search
				$this->config->set('cookie_last_ip', $this->user->ip, false);
			}

			$this->template->assign_vars(array(
				'COOKIE_BOX_BD_COLOUR'		=> $this->config['cookie_box_bdr_colour'],
				'COOKIE_BOX_BD_WIDTH'		=> $this->config['cookie_box_bdr_width'],
				'COOKIE_BOX_BG_COLOUR'		=> $this->config['cookie_box_bg_colour'],
				'COOKIE_BOX_HREF_COLOUR'	=> $this->config['cookie_box_href_colour'],
				'COOKIE_BOX_TXT_COLOUR'		=> $this->config['cookie_box_txt_colour'],
				'COOKIE_CLASS'				=> $this->config['cookie_box_position'] ? 'cookie-box rightside' : 'cookie-box leftside',
				'COOKIE_EXPIRES'			=> $this->config['cookie_expire'],
				'COOKIE_NAME'				=> $this->config['cookie_name'],
			));
		}

		$this->template->assign_vars(array(
			'S_SHOW_COOKIE_ACCEPT'	=> $cookie_set,
			'S_COOKIE_ENABLED'		=> $cookie_enabled,
		));
	}

    /**
     * Set the teplate variables
     *
     * @param $event
     *
     * @return array
     * @static
     * @access public
     */
	public function page_footer($event)
	{
		$this->template->assign_vars(array(
			'S_COOKIE_BLOCK_LINKS'	=> $this->config['cookie_block_links'],
			'S_COOKIE_ON_INDEX'		=> $this->config['cookie_on_index'],
			'S_COOKIE_SHOW_POLICY'	=> $this->config['cookie_show_policy'],

			'U_COOKIE_PAGE'			=> $this->helper->route('david63_cookiepolicy_cookieoutput', array('name' => 'policy')),
		));
	}
}
