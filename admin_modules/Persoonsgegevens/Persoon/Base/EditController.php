<?php
namespace AdminModules\Custom\NovumSvb\Persoonsgegevens\Persoon\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\Persoon\CrudPersoonManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Persoonsgegevens\Persoon instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudPersoonManager();
	}


	public function getPageTitle(): string
	{
		return "Personen";
	}
}
