<?php defined( 'KOOWA' ) or die( 'Restricted access' );
/**
 * @version		$Id: feed.php 1399 2011-11-01 14:22:48Z stian $
 * @package		Ninja
 * @copyright	Copyright 2011 NinjaForge. 
 * @license 	GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 * @link     	http://ninjaforge.com
 */
 
class NinjaViewFeed extends KViewAbstract
{
	/**
	 * Constructor
	 *
	 * @param 	object 	An optional KConfig object with configuration options
	 */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	}
		
}

 