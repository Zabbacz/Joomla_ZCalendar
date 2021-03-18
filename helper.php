<?php
/**
 * Helper class for ZCalendar module
 * 
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_zcalendar is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModZCalendarHelper
{
    public static function getAkce()
    {
    	
   if(empty($_POST['rocnik_filtr']))
   			{
   	   		$rocnik = "'%'";
   	   	}	
   	   	else
   	   	{
   		$rocnik =  ($_POST['rocnik_filtr']);
   			}
   			
   if(empty($_POST['typ_akce_filtr']))
   			{
   	   		$akce = "'%'";
   	   	}	
   	   	else
   	   	{ 
   		$akce = ($_POST['typ_akce_filtr']);
   			}	
      // Obtain a database connection
$db = JFactory::getDbo();
// Retrieve the shout
	 if(isset($_POST['smaz_filtr'])){ 
		header('Location: '.$current_url);
				}
$query = $db->getQuery(true)
            ->select($db->quoteName(array('nazev','datum','nazev_typu', 'akce_odkaz')))
            ->from($db->quoteName('#__akce', 'a'))
				 ->join('INNER', $db->quoteName('#__akce_typ', 'b') . ' ON ' . $db->quoteName('a.typ_zavodu') . ' = ' . $db->quoteName('b.typ_zavodu')) 
				->where('DATE_FORMAT('.$db->quoteName('a.datum') . ', "%Y")'). ' LIKE ' .$rocnik. ' AND '. $db->quoteName('a.typ_zavodu'). ' LIKE ' .$akce;
// Prepare the query
$db->setQuery($query);
$results = $db->loadObjectList();
return $results;   
 }

public function getFiltr_rocnik() 
		{
$db = JFactory::getDbo();
// Retrieve the shout

$query = $db->getQuery(true)
            ->select($db->quoteName('datum'))
            ->from($db->quoteName('#__akce'))
				->group('DATE_FORMAT('.$db->quoteName('datum') . ', "%Y")');
// Prepare the query
$db->setQuery($query);
$results = $db->loadObjectList();

// Return the filtr
return $results; 
}

public function getFiltr_typ() 
		{
$db = JFactory::getDbo();
// Retrieve the shout

$query = $db->getQuery(true)
            ->select($db->quoteName(array('nazev_typu', 'typ_zavodu')))
            ->from($db->quoteName('#__akce_typ'))
				->group($db->quoteName('typ_zavodu'))  ;
// Prepare the query
$db->setQuery($query);
$results = $db->loadObjectList();
// Return the filtr
return $results; 
}
}
