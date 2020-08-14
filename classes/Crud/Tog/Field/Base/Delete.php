<?php 
namespace Crud\Custom\NovumSvb\Tog\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Tog;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Tog)
		{
		     return "/custom/novumsvb/tegemoetkomingen/tog/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Tog)
		{
		     return "/custom/novumsvb/tog?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
