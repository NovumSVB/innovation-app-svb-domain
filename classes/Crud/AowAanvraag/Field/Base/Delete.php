<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\AowAanvraag;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof AowAanvraag)
		{
		     return "/custom/novumsvb/aanvragen/aow_aanvraag/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof AowAanvraag)
		{
		     return "/custom/novumsvb/aow_aanvraag?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
