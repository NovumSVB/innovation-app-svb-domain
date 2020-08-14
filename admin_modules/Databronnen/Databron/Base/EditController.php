<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Databron\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Databron\CrudDatabronManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Databron instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudDatabronManager();
	}


	public function getPageTitle(): string
	{
		return "Databronnen";
	}
}
