<?php 
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Databron;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Databron)
		{
		     return "/custom/novumsvb/databronnen/databron/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Databron)
		{
		     return "/custom/novumsvb/databron?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
