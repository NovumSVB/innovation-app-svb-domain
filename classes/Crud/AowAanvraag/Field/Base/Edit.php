<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Core\DeferredAction;
use Core\Utils;
use Crud\Generic\Field\GenericEdit;
use Crud\IEventField;

class Edit extends GenericEdit implements IEventField
{
	public function getEditUrl($oObject)
	{
		DeferredAction::register('overview_url', Utils::getRequestUri());
		return "/custom/novumsvb/aanvragen/aow_aanvraag/edit?id=" . $oObject->getId() . "";
	}


	public function getIcon(): string
	{
		return "edit";
	}

}
