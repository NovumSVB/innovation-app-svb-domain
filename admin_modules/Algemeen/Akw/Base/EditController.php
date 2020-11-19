<?php
namespace AdminModules\Custom\NovumSvb\Algemeen\Akw\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Akw\CrudAkwManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Algemeen\Akw instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAkwManager();
	}


	public function getPageTitle(): string
	{
		return "Algemene Kinderbijslagwet";
	}
}
