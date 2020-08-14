<?php 
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Grondslag;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Grondslag)
		{
		     return "/custom/novumsvb/databronnen/grondslag/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Grondslag)
		{
		     return "/custom/novumsvb/grondslag?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
