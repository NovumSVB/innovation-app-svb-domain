<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Wet\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Wet\CrudWetManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Wet instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudWetManager();
	}


	public function getPageTitle(): string
	{
		return "Wetten";
	}
}
