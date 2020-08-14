<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem_aanvraag\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\RemAanvraag\CrudRemAanvraagManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\RemAanvraag;
use Model\Custom\NovumSvb\RemAanvraagQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Rem_aanvraag instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "REM aanvraag";
	}


	public function getModule(): string
	{
		return "RemAanvraag";
	}


	public function getManager(): FormManager
	{
		return new CrudRemAanvraagManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return RemAanvraagQuery::create();
	}


	final public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof RemAanvraag){
		    LogActivity::register("Tegemoetkomingen", "REM aanvraag verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("REM aanvraag verwijderd.");
		}
		else
		{
		       StatusMessage::warning("REM aanvraag niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit REM aanvraag item wilt verwijderen?");
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
