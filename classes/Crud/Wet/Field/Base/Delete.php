<?php 
namespace Crud\Custom\NovumSvb\Wet\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Wet;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Wet)
		{
		     return "/custom/novumsvb/databronnen/wet/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Wet)
		{
		     return "/custom/novumsvb/wet?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
