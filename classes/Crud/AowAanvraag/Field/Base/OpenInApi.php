<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Field\Base;

use Crud\Generic\Field\GenericOpenInApi;
use Crud\IEventField;
use Crud\IFieldHasApi;

/**
 * This code is generated and should not be modified by hand, your changes will be overwritten at the first re-run..
 */
class OpenInApi extends GenericOpenInApi implements IFieldHasApi, IEventField
{
	use \Crud\Custom\NovumSvb\CrudApiTrait;


	public function getModule(): string
	{
		return "Aanvragen";
	}


	public function getModuleDir(): string
	{
		return "AowAanvraag";
	}
}
