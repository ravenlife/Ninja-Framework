<?php 
/**
 * @category	Ninja
 * @copyright	Copyright (C) 2007 - 2011 NinjaForge. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://ninjaforge.com
 */

$plugin_name	= 'System - Koowa';
$db			 	= JFactory::getDBO();
$user			= JFactory::getUser();

if(JFile::exists(JPATH_PLUGINS.'/system/koowa/koowa.php') || JFile::exists(JPATH_PLUGINS.'/system/koowa.php'))
{
	// We shouldn't really have to do this, as we are running it on install, but who knows user may unpublish and break it
	if (version_compare(JVERSION,'1.6.0','ge')) {
		$db->setQuery("UPDATE `#__extensions` SET `enabled` = '1', `ordering` = '0' WHERE type = 'plugin' AND element = 'koowa';");
		$db->query();
		$link = '';
	} else {
		$db->setQuery("UPDATE `#__plugins` SET `published` = '1', `ordering` = '1' WHERE folder = 'system' AND element = 'koowa';");
		$db->query();
	}
	
	$msg = null;
	$uri = clone JFactory::getURI();

	if (JFactory::getApplication()->isAdmin())
	{
		$msg = sprintf(JText::_('COM_NINJA_ACTIVATED'), $plugin_name);
	}
	JFactory::getApplication()->redirect($uri->toString(), $msg);
}
else
{
	//Only people able to fix the problem should be notified of the cause
	if ($user->authorize('com_installer', 'installer')) {
		$message	= sprintf(JText::_('COM_NINJA_NOOKU_PLUGIN_DOES_NOT_EXIST'), $plugin_name, $extension_name);
		return JError::raiseWarning(500, $message);
	}
}