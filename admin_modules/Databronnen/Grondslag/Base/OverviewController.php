<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Grondslag\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\Grondslag\CrudGrondslagManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\Grondslag;
use Model\Custom\NovumSvb\GrondslagQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Databronnen\Grondslag instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Grondslagen";
	}


	public function getModule(): string
	{
		return "Grondslag";
	}


	public function getManager(): FormManager
	{
		return new CrudGrondslagManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return GrondslagQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Grondslag){
		    LogActivity::register("Databronnen", "Grondslagen verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Grondslagen verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Grondslagen niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Grondslagen item wilt verwijderen?");
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
