<?php
namespace AdminModules\Custom\NovumSvb\Tegemoetkomingen\Obr\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\Orb\CrudOrbManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\Orb;
use Model\Custom\NovumSvb\OrbQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Tegemoetkomingen\Obr instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Overbruggingsregeling";
	}


	public function getModule(): string
	{
		return "Orb";
	}


	public function getManager(): FormManager
	{
		return new CrudOrbManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return OrbQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Orb){
		    LogActivity::register("Tegemoetkomingen", "Overbruggingsregeling verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Overbruggingsregeling verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Overbruggingsregeling niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Overbruggingsregeling item wilt verwijderen?");
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
