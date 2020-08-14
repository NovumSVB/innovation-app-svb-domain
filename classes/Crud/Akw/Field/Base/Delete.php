<?php 
namespace Crud\Custom\NovumSvb\Akw\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Akw;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Akw)
		{
		     return "/custom/novumsvb/algemeen/akw/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Akw)
		{
		     return "/custom/novumsvb/akw?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
