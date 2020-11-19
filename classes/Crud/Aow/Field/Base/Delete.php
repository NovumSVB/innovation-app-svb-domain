<?php 
namespace Crud\Custom\NovumSvb\Aow\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Aow;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Aow)
		{
		     return "/custom/novumsvb/algemeen/aow/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Aow)
		{
		     return "/custom/novumsvb/aow?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
