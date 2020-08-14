<?php 
namespace Crud\Custom\NovumSvb\Aio\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Aio;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Aio)
		{
		     return "/custom/novumsvb/algemeen/aio/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Aio)
		{
		     return "/custom/novumsvb/aio?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
