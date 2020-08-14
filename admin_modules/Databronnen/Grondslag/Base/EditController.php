<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Grondslag\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Grondslag\CrudGrondslagManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Grondslag instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudGrondslagManager();
	}


	public function getPageTitle(): string
	{
		return "Grondslagen";
	}
}
