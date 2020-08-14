<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Formulieren\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Formulier\CrudFormulierManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Formulieren instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudFormulierManager();
	}


	public function getPageTitle(): string
	{
		return "Formulieren";
	}
}
