<?php 
namespace Crud\Custom\NovumSvb\Tas\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Tas;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Tas)
		{
		     return "/custom/novumsvb/tegemoetkomingen/tas/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Tas)
		{
		     return "/custom/novumsvb/tas?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
