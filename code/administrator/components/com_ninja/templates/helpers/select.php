<?php defined( 'KOOWA' ) or die( 'Restricted access' );
/**
 * @category	Ninja
 * @package		Ninja_Template
 * @subpackage	Helper
 * @copyright	Copyright (C) 2011 NinjaForge. All rights reserved.
 * @license 	GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link     	http://ninjaforge.com
 */
 
 /**
 * Select List Helper
 *
 * @author		Stian Didriksen <stian@ninjaforge.com>
 * @category	Ninja
 * @package		Ninja_Template
 * @subpackage	Helper
 */
class NinjaTemplateHelperSelect extends KTemplateHelperSelect
{
	/**
	 * Method for rendering a select list of timezones
	 *
	 * Examples: 
	 * <code>
	 * // Outside a template layout
	 * $helper = $this->getService('ninja:template.helper.select');
	 * $helper->timezones($row->timezone, 'timezone');
	 *
	 * // Inside a template layout
	 * <?= @ninja('select.timezones', $row->timezone, 'timezone') ?>
	 * </code>
	 *
	 * @param	int 	$value the selected value
	 * @param 	string 	$name an optional element name
	 * @return	string	Html 
	 */
	public function timezones($value, $name = 'timezones')
    {
        if(!strlen($value)) {
            $conf =& JFactory::getConfig();
            $value = $conf->getValue('config.offset');
        }
 
        // LOCALE SETTINGS
        $timezones = array (
            JHTML::_('select.option', -12, JText::_('COM_NINJA_UTC_INTERNATIONAL_DATE_LINE_WEST')),
            JHTML::_('select.option', -11, JText::_('COM_NINJA_UTC_MIDWAY_ISLAND_SAMOA')),
            JHTML::_('select.option', -10, JText::_('COM_NINJA_UTC_HAWAII')),
            JHTML::_('select.option', -9.5, JText::_('COM_NINJA_UTC_TAIOHAE_MARQUESAS_ISLANDS')),
            JHTML::_('select.option', -9, JText::_('COM_NINJA_UTC_ALASKA')),
            JHTML::_('select.option', -8, JText::_('COM_NINJA_UTC_PACIFIC_TIME_US_CANADA')),
            JHTML::_('select.option', -7, JText::_('COM_NINJA_UTC_MOUNTAIN_TIME_US_CANADA')),
            JHTML::_('select.option', -6, JText::_('COM_NINJA_UTC_CENTRAL_TIME_US_CANADA_MEXICO_CITY')),
            JHTML::_('select.option', -5, JText::_('COM_NINJA_UTC_EASTERN_TIME_US_CANADA_BOGOTA_LIMA')),
            JHTML::_('select.option', -4, JText::_('COM_NINJA_UTC_ATLANTIC_TIME_CANADA_CARACAS_LA_PAZ')),
            JHTML::_('select.option', -4.5, JText::_('COM_NINJA_UTC_VENEZUELA')),
            JHTML::_('select.option', -3.5, JText::_('COM_NINJA_UTC_ST_JOHNS_NEWFOUNDLAND_LABRADOR')),
            JHTML::_('select.option', -3, JText::_('COM_NINJA_UTC_BRAZIL_BUENOS_AIRES,_GEORGETOWN')),
            JHTML::_('select.option', -2, JText::_('COM_NINJA_UTC_MID_ATLANTIC')),
            JHTML::_('select.option', -1, JText::_('COM_NINJA_UTC_AZORES_CAPE_VERDE_ISLANDS')),
            JHTML::_('select.option', 0, JText::_('COM_NINJA_UTC_WESTERN_EUROPE_TIME_LONDON_LISBON_CASABLANCA')),
            JHTML::_('select.option', 1, JText::_('COM_NINJA_UTC_AMSTERDAM_BERLIN_BRUSSELS_COPENHAGEN_MADRID_PARIS')),
            JHTML::_('select.option', 2, JText::_('COM_NINJA_UTC_ISTANBUL_JERUSALEM_KALININGRAD,_SOUTH_AFRICA')),
            JHTML::_('select.option', 3, JText::_('COM_NINJA_UTC_BAGHDAD_RIYADH_MOSCOW_ST_PETERSBURG')),
            JHTML::_('select.option', 3.5, JText::_('COM_NINJA_UTC_TEHRAN')),
            JHTML::_('select.option', 4, JText::_('COM_NINJA_UTC_ABU_DHABI_MUSCAT_BAKU_TBILISI')),
            JHTML::_('select.option', 4.5, JText::_('COM_NINJA_UTC_KABUL')),
            JHTML::_('select.option', 5, JText::_('COM_NINJA_UTC_EKATERINBURG_ISLAMABAD_KARACHI_TASHKENT')),
            JHTML::_('select.option', 5.5, JText::_('COM_NINJA_UTC_BOMBAY_CALCUTTA_MADRAS_NEW_DELHI_COLOMBO')),
            JHTML::_('select.option', 5.75, JText::_('COM_NINJA_UTC_KATHMANDU')),
            JHTML::_('select.option', 6, JText::_('COM_NINJA_UTC_ALMATY_DHAKA')),
            JHTML::_('select.option', 6.30, JText::_('COM_NINJA_UTC_YAGOON')),
            JHTML::_('select.option', 7, JText::_('COM_NINJA_UTC_BANGKOK_HANOI_JAKARTA')),
            JHTML::_('select.option', 8, JText::_('COM_NINJA_UTC_BEIJING_PERTH_SINGAPORE_HONG_KONG')),
            JHTML::_('select.option', 8.75, JText::_('COM_NINJA_UTC_WESTERN_AUSTRALIA')),
            JHTML::_('select.option', 9, JText::_('COM_NINJA_UTC_TOKYO,_SEOUL,_OSAKA,_SAPPORO,_YAKUTSK')),
            JHTML::_('select.option', 9.5, JText::_('COM_NINJA_UTC_ADELAIDE_DARWIN_YAKUTSK')),
            JHTML::_('select.option', 10, JText::_('COM_NINJA_UTC_EASTERN_AUSTRALIA_GUAM_VLADIVOSTOK')),
            JHTML::_('select.option', 10.5, JText::_('COM_NINJA_UTC_LORD_HOWE_ISLAND_AUSTRALIA')),
            JHTML::_('select.option', 11, JText::_('COM_NINJA_UTC_MAGADAN_SOLOMON_ISLANDS_NEW_CALEDONIA')),
            JHTML::_('select.option', 11.30, JText::_('COM_NINJA_UTC_NORFOLK_ISLAND')),
            JHTML::_('select.option', 12, JText::_('COM_NINJA_UTC_AUCKLAND_WELLINGTON_FIJI_KAMCHATKA')),
            JHTML::_('select.option', 12.75, JText::_('COM_NINJA_UTC_CHATHAM_ISLAND')),
            JHTML::_('select.option', 13, JText::_('COM_NINJA_UTC_TONGA')),
            JHTML::_('select.option', 14, JText::_('COM_NINJA_UTC_KIRIBATI')),);
 
        return JHTML::_('select.genericlist',  $timezones, $name, ' class="inputbox"', 'value', 'text', $value, $name );
    }
    
    /**
	 * Method for rendering a select list of time formats
	 *
	 * Examples: 
	 * <code>
	 * // Outside a template layout
	 * $helper = $this->getService('ninja:template.helper.select');
	 * $helper->timeformats('DATE_FORMAT_LC2', 'timeformat');
	 *
	 * // Inside a template layout
	 * <?= @ninja('select.timeformats', 'DATE_FORMAT_LC2', 'timeformat') ?>
	 * </code>
	 *
	 * @param	int 	$value the selected value
	 * @param 	string 	$name an optional element name
	 * @return	string	Html 
	 */
    public function timeformats($value = 'DATE_FORMAT_LC1', $name = 'timeformats')
    {
       $timeformats = $this->getService('ninja:model.timeformats')->getList();
 		$date = JFactory::getDate(); 
        // LOCALE SETTINGS
        foreach($timeformats as $format)
        {
        	$timeformat[] = JHTML::_('select.option', $format->timeformat, $date->toFormat(JText::_($format->timeformat)));
        }
 
        return JHTML::_('select.genericlist',  $timeformat, $name, ' class="inputbox"', 'value', 'text', $value, $name );
    }
    
    /**
	 * Method for rendering a select list of available languages
	 *
	 * Examples: 
	 * <code>
	 * // Outside a template layout
	 * $helper = $this->getService('ninja:template.helper.select');
	 * $helper->languages('DATE_FORMAT_LC2', 'timeformat');
	 *
	 * // Inside a template layout
	 * <?= @ninja('select.timeformats', 'DATE_FORMAT_LC2', 'timeformat') ?>
	 * </code>
	 *
	 * @param	int 	$value 	the selected value
	 * @param 	string 	$name 	an optional element name
	 * @param 	string 	$client administrator or site
	 * @return	string	Html 
	 */
    public function languages($value, $name = 'locale', $client = 'site')
    {
        $user    = & JFactory::getUser();
 
        /*
         * @TODO: change to acl_check method
         */
        if(!($user->get('gid') >= 23) && $client == 'administrator') {
            return JText::_('COM_NINJA_NO_ACCESS');
        }
  
        jimport('joomla.language.helper');
        $languages = JLanguageHelper::createLanguageList($value, constant('JPATH_'.strtoupper($client)), true);
        array_unshift($languages, JHTML::_('select.option', '', '- '.JText::_('COM_NINJA_SELECT_LANGUAGE').' -'));
 
        return JHTML::_('select.genericlist',  $languages, $name, 'class="inputbox"', 'value', 'text', $value, $name );
    }

    /**
	* Generates an HTML radio list
	*
	* @param array An array of objects
	* @param string The value of the HTML name attribute
	* @param string Additional HTML attributes for the <select> tag
	* @param mixed The key that is selected
	* @param string The name of the object variable for the option value
	* @param string The name of the object variable for the option text
	* @return string HTML for the select list
	* @todo deprecate/clean remove this and use koowas
	*/
	public function radiolist( $arr, $name, $attribs = null, $key = 'value', $text = 'text', $selected = null, $idtag = false, $translate = false )
	{
		reset( $arr );
		$html = '';

		if (is_array($attribs)) {
			$attribs = JArrayHelper::toString($attribs);
		 }

		$id_text = $name;
		if ( $idtag ) {
			$id_text = $idtag;
		}

		$html .= '<ul class="group">';
		for ($i=0, $n=count( $arr ); $i < $n; $i++ )
		{
			$k	= $arr[$i]->$key;
			$t	= $translate ? JText::_( $arr[$i]->$text ) : $arr[$i]->$text;
			$id	= ( isset($arr[$i]->id) ? @$arr[$i]->id : null);

			$extra	= '';
			$extra	.= $id ? " id=\"" . $arr[$i]->id . "\"" : '';
			if (is_array( $selected ))
			{
				foreach ($selected as $val)
				{
					$k2 = is_object( $val ) ? $val->$key : $val;
					if ($k == $k2)
					{
						$extra .= " selected=\"selected\"";
						break;
					}
				}
			} else {
				$extra .= ((string)$k == (string)$selected ? " checked=\"checked\"" : '');
			}
			$html .= "\n\t<li class=\"value\"><input type=\"radio\" name=\"$name\" id=\"$id_text$k\" value=\"".$k."\"$extra $attribs />";
			$html .= "\n\t<label for=\"$id_text$k\">$t</label></li>";
		}
		$html .= "</ul>\n";
		return $html;
	}

    
    /**
	 * Method for rendering a modal popup select list of com_media images
	 *
	 * @param	int 	$value 	the selected value
	 * @param 	string 	$name 	an optional element name
	 * @param 	string 	$title 	link title
	 * @return	string	Html 
	 * @todo 	deprecate/clean is this being used?
	 */
    public function image($value = null, $name = 'image', $title = 'Image')
	{

		$doc 		=& JFactory::getDocument();
		
		$script = "\t".'function jInsertEditorText( image, e_name ) {
			document.getElementById(e_name).value = image;
			document.getElementById(e_name+\'preview\').innerHTML = image;
			if(!image.test(\'http\'))
			{
				var el	= $(e_name+\'preview\').getChildren().getLast();
				var src	= el.getProperty(\'src\');
				el.setProperty(\'src\', \''.JURI::root(true).'/\'+src);
				document.getElementById(e_name).value = document.getElementById(e_name+\'preview\').innerHTML;
			}
		}';
		if(!defined('JELEMENT_IMAGE'))
		{
			$doc->addScriptDeclaration($script);
			define('JELEMENT_IMAGE', true);
		}
		$media =& JComponentHelper::getParams('com_media');
		$ranks = array('publisher', 'editor', 'author', 'registered');
		$acl = & JFactory::getACL();
		for($i = 0; $i < $media->get('allowed_media_usergroup', 3); $i++)
		{
			$acl->addACL( 'com_media', 'popup', 'users', $ranks[$i] );
		}
		//Make sure the user is authorized to view this page
		$user = & JFactory::getUser();
		if (!$user->authorize( 'com_media', 'popup' )) {
			return JText::_('COM_NINJA_YOURE_NOT_AUTHORIZED_TO_ACCESS_THE_MEDIA_MANAGER');
		}

		//Create the modal window link. &e_name let us have multiple instances of the modal window.
		$link = 'index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;e_name='.$name;

		JHTML::_('behavior.modal');

		return ' <input type="hidden" name="'.$name.'" id="'.$name.'" value="'.htmlspecialchars($value, ENT_QUOTES, 'UTF-8').'" /><div class="button2-left"><div class="image"><a class="modal" title="'.JText::_($title).'" href="'.$link.'"  rel="{handler: \'iframe\', size: {x: 570, y: 400}}">'.JText::_($title).'</a></div></div><br /><div id="'.$name.'preview" class="image-preview">'.$value.'</div>';
	}
	
	/**
	 * Method for rendering a enabled/disabled radio list
	 *
	 * Examples: 
	 * <code>
	 * // Outside a template layout
	 * $helper = $this->getService('ninja:template.helper.select');
	 * $helper->statelist(array('selected' => $row->enabled));
	 * $helper->statelist(array('selected' => $row->featured 'name' => 'featured', 'yes' => 'Featured', 'no' => 'Not Featured', 'img_y' => '/16/star.png', 'img_x' => '/16/star_off.png'))
	 *
	 * // Inside a template layout
	 * <?= @ninja('select.statelist', array('selected')) ?>
	 * <?= @ninja('select.statelist', array('selected' => $row->featured 'name' => 'featured', 'yes' => 'Featured', 'no' => 'Not Featured', 'img_y' => '/16/star.png', 'img_x' => '/16/star_off.png')) ?>
	 * </code>
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html 
	 * @todo 	replace the radiolist call with a koowa one
	 */
	public function statelist($config = array())
	{
		$config = new KConfig($config);
		
		$config->append(array(
			'name'		=> 'enabled',
			'attribs'	=> array('class' => 'value'),
			'selected'	=> null,
			'yes'		=> 'Enabled',
			'no'		=> 'Disabled',
			'img_y'		=> '/16/enable.png',
			'img_x'		=> '/16/disable.png',
			'reverse'	=> false,
			'id'		=> 'enabled'
		));
		
		$img_y = $this->getService('ninja:template.helper.document')->img($config->img_y);
		$img_x = $this->getService('ninja:template.helper.document')->img($config->img_x);
		$img = array(
			$img_y ? '<img src="' . $img_y . '" border="0" alt="' . JText::_( $config->yes ) . '" /> ' : null,
			$img_x ? '<img src="' . $this->getService('ninja:template.helper.document')->img($config->img_x) . '" border="0" alt="' . JText::_( $config->no ) . '" /> ' : null
		);
		$arr = array(
			JHTML::_('select.option',  $config->reverse ? 0 : 1, current($img) . JText::_( $config->yes ) ),
			JHTML::_('select.option',  $config->reverse ? 1 : 0, end(($img)) . JText::_( $config->no ) )
		);

		return self::radiolist($arr, $config->name, $config->attribs->toArray(), 'value', 'text', (int) $config->selected, $config->id);
	}
	
	/**
	 * Method for rendering a list of selectable images
	 *
	 * Examples: 
	 * <code>
	 * // Outside a template layout
	 * $helper = $this->getService('ninja:template.helper.select');
	 * $helper->statelist(array('path' => JPATH_ROOT.'/media/com_extension/icons/', 'name' => 'icon', 'attribs' => array('class' => 'value', 'id' => 'icon'), 'selected' => $icon, 'translate' => true, 'script' => false));
	 *
	 * // Inside a template layout
	 * <?= @ninja('select.images', array('path' => JPATH_ROOT.'/media/com_extension/icons/', 'name' => 'icon', 'attribs' => array('class' => 'value', 'id' => 'icon'), 'selected' => $icon, 'translate' => true, 'script' => false)) ?>
	 * </code>
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html 
	 */
	public function images($config = array())
	{
		$config = new KConfig($config);
		
		$config->append(array(
			'path'		=> null,
			'name'		=> null,
			'attribs'	=> null,
			'selected'	=> null,
			'idtag'		=> false,
			'translate'	=> false,
			'vertical'	=> false,
			'script'	=> true
		));
	
		$images		= $this->getService('ninja:model.images')->folder($config->path);
		$options 	= $images->optgroup(false)->getList();
		$img		= $images->getImages();
		
		//Check if we should check the images folder too for user uploaded content
		$path = str_replace(JPATH_ROOT, '', $config->path);
		if(strpos($path, '/media') === 0) {
			$path		= JPATH_ROOT.str_replace(array( '/images', '/media'), array('', '/images'), $path);
			$images		= $this->getService('ninja:model.images')->folder($path);
			$options	= array_merge($options, $images->optgroup(false)->getList());
			$img		= array_merge($img, $images->getImages());
			ksort($options);
			ksort($img);
		}

		if(!$options) return '<strong>'.sprintf(JText::_('COM_NINJA_THERE_ARE_NO_IMAGES_IN'), '<pre>'.$config->path.'</pre>').'</strong>';
		if(!$config->idtag) $config->idtag = $config->name;
		
		$document = JFactory::getDocument();
		if($config->script)	
		{
	ob_start(); ?>
	window.addEvent('domready', function(){
		$$('.image-select').addEvent('reset', function(){
			this.getElements('input').each(function(input){
				input.set('checked', input.defaultChecked ? true : false);
			});
			this.getElement(':checked').fireEvent('change');
		});

		$$('.image-select input').addEvent('change', function(){
			this.getSiblings('label.selected').removeClass('selected');
			this.getNext().addClass('selected');
		});

		//This is for IE, which don't respect the for attribute if the input isn't visible
		$$('.image-select label').addEvent('click', function(){
			this.getPrevious().set('checked', true).fireEvent('change');
		});
	});
	<?php	
			static $loaded;
			if(!$loaded)
			{
				$document->addScriptDeclaration(ob_get_clean());
				$loaded = true;
			} else {
				ob_get_clean();
			}
		}
		$document->addStyleDeclaration('.group.images {text-align: center; padding-right: 1px !important;
		padding-bottom: 1px !important;}
		.group.images select { width:100%; min-width: 60px; margin-top: 2px!important ; }
		.group.images input {
			visibility: hidden;
			opacity: 0;
			position: absolute;
			width: 0;
			height: 0;
			overflow: hidden;
		}
		.group.images label {
			float: left;
			margin: 2px;
			/*background: hsla(0, 0%, 0%, .1);*/
			border: 1px solid transparent;
			padding: 2px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
			background: transparent;
			position: relative;
			-webkit-transition: border 300ms ease-in-out;
			-moz-transition: border 300ms ease-in-out;
			transition: border 300ms ease-in-out;
		}
		.group.images img::after {
			content: "test";
		}
		.group.images label.selected,
		.group.images label:hover {
			border-color: blue;
			border-color: hsla(240, 100%, 50%, .6);
			background: hsla(0, 0%, 0%, .03);
			-webkit-transition: border 150ms ease-in-out;
			-moz-transition: border 150ms ease-in-out;
			transition: border 150ms ease-in-out;
		}
		.group.images label:active,
		.group.images label:focus {
			border-color: darkblue;
			border-color: hsla(240, 100%, 30%, .6);
			background: hsla(0, 0%, 0%, .05);
			-webkit-transition: border 0ms ease-in-out;
			-moz-transition: border 0ms ease-in-out;
			transition: border 0ms ease-in-out;
		}
		@-webkit-keyframes bounce {
			0%   { -webkit-transform: scale(1.0); }
			33%  { -webkit-transform: scale(0.9); }
			66% { -webkit-transform: scale(1.05); }
			100% { -webkit-transform: scale(1.0); }
		}
		.group.images label.selected img {
			-webkit-animation: bounce 400ms linear;
		}
		');
		if($config->vertical) $config->vertical = ' vertical';
		ob_start(); 
	?>
		<div class="group image-select images<?php echo $config->vertical ?>">
			<?php foreach($options as $i => $option) : ?>
				<?php if(!isset($img[$i]) || $option->value == '<OPTGROUP>') continue ?>
				<?php $id = $this->getService('koowa:filter.alnum')->sanitize($option->value) ?>
				<?php $class = $i == 0 ? ' validate-one-required' : null ?>
				<?php $checked = $option->value == $config->selected ? ' checked="checked"' : null ?>
				<?php $active = $checked ? ' class="selected"' : null ?>
				<input type="radio" name="<?php echo $config->name ?>" id="<?php echo $config->name ?>-<?php echo $id ?>" data-id="<?php echo $config->name ?>-<?php echo $id ?>" <?php echo $checked ?> value="<?php echo $option->value ?>" class="value <?php echo $config->idtag ?><?php echo $class ?>">
				<label for="<?php echo $config->name ?>-<?php echo $id ?>"<?php echo $active ?>><img src="<?php echo $img[$i] ?>" /></label>
			<?php endforeach ?>
		</div>
		
	<?php 
		return ob_get_clean();
	}
	
	/**
	 * @todo deprecate/clean what is this?
	 */
	public function imagesgeneric($path, $name, $attribs = null, $selected = NULL, $idtag = false, $translate = false)
	{	
		$images		= $this->getService('ninja:model.images')->folder($path);
		$options 	= $images->getList();
		$img		= $images->getImages();
		
		if(!$idtag) $idtag = $name;
		
		//die('<pre>'.var_export($img, true).'</pre>');
		$document = JFactory::getDocument();
		$document->addScriptDeclaration('var ' . $idtag . 'Images = new Asset.images(' . json_encode((array)$img) . ', {
    onComplete: function(){
    	$(\'rank_image_preview\').empty(); ' . $idtag . 'Images[$(\''.$idtag.'\').selectedIndex].clone().injectInside(\'rank_image_preview\');
    }
});');

		$attr = array('onchange' => '$(\'rank_image_preview\').empty(); ' . $idtag . 'Images[this.selectedIndex].clone().injectInside(\'rank_image_preview\')', 'class' => 'value', 'style' => 'display: block;');
		
		$document->addStyleDeclaration('.group.images {text-align: center; padding-right: 1px !important;
		padding-bottom: 1px !important;}
		.group.images select { width:100%; min-width: 60px; margin-top: 2px!important ; }');
		
		ob_start(); 
	?>
		<div class="group images">
			
			
			<div id="rank_image_preview"><img src="<?php echo $this->getService('ninja:template.helper.document')->img('/16/spinner.gif') ?>" /></div>
			
			<?php echo JHTML::_('genericlist', $options, $name, $attr, 'value', 'text', $selected) ?>
		</div>
		
	<?php 
		return ob_get_clean();
	}
}