<?php 
namespace Crud\Custom\NovumSvb\RemAanvraag\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\RemAanvraag;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof RemAanvraag)
		{
		     return "/custom/novumsvb/aanvragen/rem_aanvraag/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof RemAanvraag)
		{
		     return "/custom/novumsvb/rem_aanvraag?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
