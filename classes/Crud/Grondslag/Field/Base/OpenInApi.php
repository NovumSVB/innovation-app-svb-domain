<?php
namespace Crud\Custom\NovumSvb\Grondslag\Field\Base;

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
		return "Databronnen";
	}


	public function getModuleDir(): string
	{
		return "Grondslag";
	}
}
