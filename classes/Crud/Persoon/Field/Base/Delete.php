<?php 
namespace Crud\Custom\NovumSvb\Persoon\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumSvb\Persoon;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumsvb/persoonsgegevens/persoon/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof Persoon)
		{
		     return "/custom/novumsvb/persoon?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
