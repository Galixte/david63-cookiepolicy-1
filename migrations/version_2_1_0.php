<?php
/**
*
* @package Cookie Policy Extension
* @copyright (c) 2014 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\cookiepolicy\migrations;

use \phpbb\db\migration\migration;

class version_2_1_0 extends migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('cookie_block_links', 0)),
			array('config.add', array('cookie_box_bdr_colour', '#FFFF8A')),
			array('config.add', array('cookie_box_bdr_width', 1)),
			array('config.add', array('cookie_box_bg_colour', '#00608F')),
			array('config.add', array('cookie_box_href_colour', '#FFFFFF')),
			array('config.add', array('cookie_box_position', 1)),
			array('config.add', array('cookie_box_txt_colour', '#DBDB00')),
			array('config.add', array('cookie_custom_page', 0)),
			array('config.add', array('cookie_custom_page_corners', 1)),
			array('config.add', array('cookie_custom_page_radius', 7)),
			array('config.add', array('cookie_expire', 0)),
			array('config.add', array('cookie_last_ip', '')),
			array('config.add', array('cookie_on_index', 1)),
			array('config.add', array('cookie_page_bg_colour', '#FFFFFF')),
			array('config.add', array('cookie_page_txt_colour', '#000000')),
			array('config.add', array('cookie_policy_enabled', 0)),
			array('config.add', array('cookie_require_access', 0)),
			array('config.add', array('cookie_quota_exceeded', 0)),
			array('config.add', array('cookie_show_policy', 0)),

			// Add the ACP module
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'COOKIE_POLICY')),

			array('module.add', array(
				'acp', 'COOKIE_POLICY', array(
					'module_basename'	=> '\david63\cookiepolicy\acp\cookiepolicy_module',
					'modes'				=> array('main'),
				),
			)),
		);
	}
}
