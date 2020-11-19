<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Tas\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Tas\CrudTasManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Tas instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudTasManager();
	}


	public function getPageTitle(): string
	{
		return "Asbestslachtoffers";
	}
}
