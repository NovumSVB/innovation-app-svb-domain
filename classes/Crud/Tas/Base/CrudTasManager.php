<?php
namespace Crud\Custom\NovumSvb\Tas\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\TasTableMap;
use Model\Custom\NovumSvb\Tas;
use Model\Custom\NovumSvb\TasQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Tas instead if you need to override or add functionality.
 */
abstract class CrudTasManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return TasQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\TasTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de tegemoetkoming asbestslachtoffers.";
	}


	public function getEntityTitle(): string
	{
		return "Tas";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/tas/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/tas/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Asbestslachtoffers toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Asbestslachtoffers aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['PersoonId', 'Bedrag', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['PersoonId', 'Bedrag'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Tas
	 */
	public function getModel(array $aData = null): Tas
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oTasQuery = TasQuery::create();
		     $oTas = $oTasQuery->findOneById($aData['id']);
		     if (!$oTas instanceof Tas) {
		         throw new LogicException("Tas should be an instance of Tas but got something else." . __METHOD__);
		     }
		     $oTas = $this->fillVo($aData, $oTas);
		}
		else {
		     $oTas = new Tas();
		     if (!empty($aData)) {
		         $oTas = $this->fillVo($aData, $oTas);
		     }
		}
		return $oTas;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Tas
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Tas
	{
		$oTas = $this->getModel($aData);


		 if(!empty($oTas))
		 {
		     $oTas = $this->fillVo($aData, $oTas);
		     $oTas->save();
		 }
		return $oTas;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Tas $oModel
	 * @return Tas
	 */
	protected function fillVo(array $aData, Tas $oModel): Tas
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
