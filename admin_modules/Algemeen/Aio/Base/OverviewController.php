<?php
namespace AdminModules\Custom\NovumSvb\Algemeen\Aio\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\NovumSvb\Aio\CrudAioManager;
use Crud\FormManager;
use Model\Custom\NovumSvb\Aio;
use Model\Custom\NovumSvb\AioQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumSvb\Algemeen\Aio instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Inkomensvoorziening ouderen";
	}


	public function getModule(): string
	{
		return "Aio";
	}


	public function getManager(): FormManager
	{
		return new CrudAioManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return AioQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof Aio){
		    LogActivity::register("Algemeen", "Inkomensvoorziening ouderen verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Inkomensvoorziening ouderen verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Inkomensvoorziening ouderen niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Inkomensvoorziening ouderen item wilt verwijderen?");
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
