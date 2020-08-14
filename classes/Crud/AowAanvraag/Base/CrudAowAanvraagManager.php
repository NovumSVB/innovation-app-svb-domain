<?php
namespace Crud\Custom\NovumSvb\AowAanvraag\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\AowAanvraag;
use Model\Custom\NovumSvb\AowAanvraagQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AowAanvraag instead if you need to override or add functionality.
 */
abstract class CrudAowAanvraagManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AowAanvraagQuery::create();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de remigratiewet.";
	}


	public function getEntityTitle(): string
	{
		return "AowAanvraag";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/aanvragen/aow_aanvraag/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/aanvragen/aow_aanvraag/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Aow toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Aow aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['PersoonId', 'GeboorteDatum', 'GeboorteLand', 'ImmigratieDatum', 'HeeftNlPaspoort', 'EmigratieLand', 'EmigratieVerblijfsvergunning', 'PartnerEmigratieVerblijfsvergunning'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return AowAanvraag
	 */
	public function getModel(array $aData = null): AowAanvraag
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAowAanvraagQuery = AowAanvraagQuery::create();
		     $oAowAanvraag = $oAowAanvraagQuery->findOneById($aData['id']);
		     if (!$oAowAanvraag instanceof AowAanvraag) {
		         throw new LogicException("AowAanvraag should be an instance of AowAanvraag but got something else." . __METHOD__);
		     }
		     $oAowAanvraag = $this->fillVo($aData, $oAowAanvraag);
		} else {
		     $oAowAanvraag = new AowAanvraag();
		     if (!empty($aData)) {
		         $oAowAanvraag = $this->fillVo($aData, $oAowAanvraag);
		     }
		}
		return $oAowAanvraag;
	}


	/**
	 * Save form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return AowAanvraag
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): AowAanvraag
	{
		$oAowAanvraag = $this->getModel($aData);


		 if(!empty($oAowAanvraag))
		 {
		     $oAowAanvraag = $this->fillVo($aData, $oAowAanvraag);
		     $oAowAanvraag->save();
		 }
		return $oAowAanvraag;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param AowAanvraag $oModel
	 * @return AowAanvraag
	 */
	protected function fillVo(array $aData, AowAanvraag $oModel): AowAanvraag
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['geboorte_datum']) ? $oModel->setGeboorteDatum($aData['geboorte_datum']) : null;
		isset($aData['geboorte_land']) ? $oModel->setGeboorteLand($aData['geboorte_land']) : null;
		isset($aData['immigratie_datum']) ? $oModel->setImmigratieDatum($aData['immigratie_datum']) : null;
		isset($aData['heeft_nl_paspoort']) ? $oModel->setHeeftNlPaspoort($aData['heeft_nl_paspoort']) : null;
		isset($aData['emigratie_land']) ? $oModel->setEmigratieLand($aData['emigratie_land']) : null;
		isset($aData['emigratie_verblijfsvergunning']) ? $oModel->setEmigratieVerblijfsvergunning($aData['emigratie_verblijfsvergunning']) : null;
		isset($aData['partner_emigratie_verblijfsvergunning']) ? $oModel->setPartnerEmigratieVerblijfsvergunning($aData['partner_emigratie_verblijfsvergunning']) : null;
		return $oModel;
	}
}
