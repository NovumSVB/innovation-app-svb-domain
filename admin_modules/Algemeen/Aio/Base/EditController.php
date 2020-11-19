<?php
namespace AdminModules\Custom\NovumSvb\Algemeen\Aio\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Aio\CrudAioManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Algemeen\Aio instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAioManager();
	}


	public function getPageTitle(): string
	{
		return "Inkomensvoorziening ouderen";
	}
}
