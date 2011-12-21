<?php defined( 'KOOWA' ) or die( 'Restricted access' );
/**
 * @version		$Id: html.php 1399 2011-11-01 14:22:48Z stian $
 * @category	Ninja
 * @copyright	Copyright (C) 2007 - 2011 NinjaForge. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://ninjaforge.com
 */

class NinjaViewTemplatesHtml extends NinjaViewDefault
{
	public function display()
	{	
		$this->assign('date', JFactory::getDate());
	
		$this->_createToolbar()
			->reset();
			//->append($this->getService('ninja:toolbar.button.install'))
			//->append('uninstall');

		$this->setLayout('ninja:view.templates.default');
		return parent::display();
	}
}