<?php 
namespace Crud\Custom\NovumSvb\Orb\Field\Base;

use Core\DeferredAction;
use Core\Utils;
use Crud\Generic\Field\GenericEdit;
use Crud\IEventField;

class Edit extends GenericEdit implements IEventField
{
	public function getEditUrl($oObject)
	{
		DeferredAction::register('overview_url', Utils::getRequestUri());
		return "/custom/novumsvb/tegemoetkomingen/obr/edit?id=" . $oObject->getId() . "";
	}


	public function getIcon(): string
	{
		return "edit";
	}
}
