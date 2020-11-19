<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Obr\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Orb\CrudOrbManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Obr instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudOrbManager();
	}


	public function getPageTitle(): string
	{
		return "Overbruggingsregeling";
	}
}
