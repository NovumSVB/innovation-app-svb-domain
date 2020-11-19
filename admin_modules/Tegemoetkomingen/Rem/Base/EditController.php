<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Rem\CrudRemManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudRemManager();
	}


	public function getPageTitle(): string
	{
		return "Remigratiewet";
	}
}
