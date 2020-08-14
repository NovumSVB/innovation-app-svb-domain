<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem_aanvraag\Base;

use AdminModules\GenericEditController;
use Crud\Custom\NovumSvb\RemAanvraag\CrudRemAanvraagManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem_aanvraag instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudRemAanvraagManager();
	}


	public function getPageTitle(): string
	{
		return "REM aanvraag";
	}
}
