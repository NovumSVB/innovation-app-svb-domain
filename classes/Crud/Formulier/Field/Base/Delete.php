<?php 
namespace Crud\Custom\NovumSvb\Formulier\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Formulier;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Formulier)
		{
		     return "/custom/novumsvb/databronnen/formulieren/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Formulier)
		{
		     return "/custom/novumsvb/formulieren?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
