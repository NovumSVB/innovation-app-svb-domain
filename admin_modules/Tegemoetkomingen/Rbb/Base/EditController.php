<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rbb\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Rbb\CrudRbbManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rbb instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudRbbManager();
	}


	public function getPageTitle(): string
	{
		return "Bijstand Buitenland";
	}
}
