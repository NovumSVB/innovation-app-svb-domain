<?php 
namespace Crud\Custom\NovumSvb\Wkb\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Wkb;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Wkb)
		{
		     return "/custom/novumsvb/tegemoetkomingen/wkb/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Wkb)
		{
		     return "/custom/novumsvb/wkb?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
