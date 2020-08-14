<?php 
namespace Crud\Custom\NovumSvb\Databron\Field\Base;

use Core\DeferredAction;
use Core\Utils;
use Crud\Generic\Field\GenericEdit;
use Crud\IEventField;

class Edit extends GenericEdit implements IEventField
{
	public function getEditUrl($oObject)
	{
		DeferredAction::register('overview_url', Utils::getRequestUri());
		return "/custom/novumsvb/databronnen/databron/edit?id=" . $oObject->getId() . "";
	}


	public function getIcon(): string
	{
		return "edit";
	}
}
