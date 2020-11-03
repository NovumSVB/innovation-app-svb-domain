<?php 
namespace Crud\Custom\NovumSvb\Rbb\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Rbb;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Rbb)
		{
		     return "/custom/novumsvb/tegemoetkomingen/rbb/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Rbb)
		{
		     return "/custom/novumsvb/rbb?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
