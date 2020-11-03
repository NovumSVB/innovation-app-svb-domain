<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Tog\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Tog\CrudTogManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Tog instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudTogManager();
	}


	public function getPageTitle(): string
	{
		return "Wet TOG";
	}
}
