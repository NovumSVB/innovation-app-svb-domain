<?php
namespace AdminModules\Custom\NovumSvb\Algemeen\Aow\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Aow\CrudAowManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Algemeen\Aow instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAowManager();
	}


	public function getPageTitle(): string
	{
		return "Algemene Ouderdomswet";
	}
}
