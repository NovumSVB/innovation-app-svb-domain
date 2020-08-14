<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Formulieren\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\Formulier\CrudFormulierManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\Formulier;
use Model\Custom\NovumSvb\FormulierQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Formulieren instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Formulieren";
	}


	public function getModule(): string
	{
		return "Formulier";
	}


	public function getManager(): FormManager
	{
		return new CrudFormulierManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return FormulierQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Formulier){
		    LogActivity::register("Databronnen", "Formulieren verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Formulieren verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Formulieren niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Formulieren item wilt verwijderen?");
		$sTitle = Translate::fromCode("Zeker weten?");
		$sOkUrl = $this->getManager()->getOverviewUrl() . "?id=" . $iId . "&_do=Delete";
		$sNOUrl = $this->getRequestUri();
		$sYes = Translate::fromCode("Ja");
		$sCancel = Translate::fromCode("Annuleren");
		$aButtons  = [
		   new StatusMessageButton($sYes, $sOkUrl, $sYes, "warning"),
		   new StatusMessageButton($sCancel, $sNOUrl, $sCancel, "info"),
		];
		StatusModal::warning($sMessage, $sTitle, $aButtons);
	}
}
