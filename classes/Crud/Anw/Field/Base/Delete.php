<?php 
namespace Crud\Custom\NovumSvb\Anw\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Anw;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Anw)
		{
		     return "/custom/novumsvb/nabestaanden/anw/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Anw)
		{
		     return "/custom/novumsvb/anw?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
