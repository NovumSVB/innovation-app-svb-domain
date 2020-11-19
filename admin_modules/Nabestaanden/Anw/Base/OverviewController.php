<?php
namespace AdminModules\Custom\NovumSvb\Nabestaanden\Anw\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\Anw\CrudAnwManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\Anw;
use Model\Custom\NovumSvb\AnwQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Nabestaanden\Anw instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Nabestaandenwet";
	}


	public function getModule(): string
	{
		return "Anw";
	}


	public function getManager(): FormManager
	{
		return new CrudAnwManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return AnwQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Anw){
		    LogActivity::register("Nabestaanden", "Nabestaandenwet verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Nabestaandenwet verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Nabestaandenwet niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Nabestaandenwet item wilt verwijderen?");
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
