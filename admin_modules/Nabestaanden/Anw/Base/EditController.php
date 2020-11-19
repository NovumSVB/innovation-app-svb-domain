<?php
namespace AdminModules\Custom\NovumSvb\Nabestaanden\Anw\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Anw\CrudAnwManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Nabestaanden\Anw instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudAnwManager();
	}


	public function getPageTitle(): string
	{
		return "Nabestaandenwet";
	}
}
