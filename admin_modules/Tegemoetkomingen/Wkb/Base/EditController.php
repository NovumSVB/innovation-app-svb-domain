<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Wkb\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Wkb\CrudWkbManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Wkb instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudWkbManager();
	}


	public function getPageTitle(): string
	{
		return "Wet kindgebonden budget";
	}
}
