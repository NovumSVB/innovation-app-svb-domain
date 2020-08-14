<?php 
namespace Crud\Custom\NovumSvb\Orb\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Orb;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Orb)
		{
		     return "/custom/novumsvb/tegemoetkomingen/obr/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Orb)
		{
		     return "/custom/novumsvb/obr?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
