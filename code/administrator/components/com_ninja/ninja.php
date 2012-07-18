<?php defined( '_JEXEC' ) or die( 'Restricted access' );
/**
 * @category	Ninja
 * @copyright	Copyright (C) 2007 - 2011 NinjaForge. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://ninjaforge.com
 */


jimport('joomla.filesystem.file');

$db				= JFactory::getDBO();
$user			= JFactory::getUser();

$extension_name	= JRequest::getCmd('option');

$lang = JFactory::getLanguage();

// load the com_ninja english language file
$lang->load('com_ninja', JPATH_ADMINISTRATOR, 'en-GB', true);

// load the foriegn language file for com_ninja
$lang->load('com_ninja', JPATH_ADMINISTRATOR, $lang->getDefault(), true);

if(!JPluginHelper::isEnabled('system', 'koowa') || JFactory::getApplication()->get('wrong_koowa_plugin_order'))
{
	require $root.'setup/koowa.php';
}

if(!JPluginHelper::isEnabled('system', 'ninja'))
{
	require $root.'setup/ninja.php';
}


// date.timezone fix to avoid errors in date helpers
if(version_compare('5.3', phpversion(), '<='))
{
    // If NULL, then that means ini_get is a disabled function, not necessarily that date.timezone is undefined
    if(ini_get('date.timezone') !== NULL && !ini_get('date.timezone'))
    {
        //Using @ to silence any PHP warnings complaining about date.timezone not being defined in the ini file
        @date_default_timezone_set(@date_default_timezone_get());
    }
}

// Add Ninja template filters and some legacy
if(defined('KOOWA'))
{
    require_once JPATH_ADMINISTRATOR.'/components/com_ninja/loader/loader.php';
    KLoader::addAdapter(new NinjaLoader(array('basepath' => JPATH_ADMINISTRATOR)));
    
    require_once JPATH_ADMINISTRATOR.'/components/com_ninja/service/locator/locator.php';
    KServiceIdentifier::addLocator(new NinjaServiceLocator());

	$rules = array(
		KService::get('ninja:template.filter.document')
	);

	KService::get('koowa:template.default')->addFilter($rules);
}

$cache = JPATH_ROOT.'/cache/'.$extension_name.'/upgrade';
if(!JFile::exists($cache))
{
	//Run extension specific upgrade procedure if found
	$upgrade = JPATH_COMPONENT_ADMINISTRATOR.'/install/upgrade.php';
	if(JFile::exists($upgrade)) require_once $upgrade;
	//1.6 bugfix
	$buffer = false;
	JFile::write($cache, $buffer);
}