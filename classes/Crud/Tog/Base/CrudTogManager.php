<?php
namespace Crud\Custom\NovumSvb\Tog\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\TogTableMap;
use Model\Custom\NovumSvb\Tog;
use Model\Custom\NovumSvb\TogQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Tog instead if you need to override or add functionality.
 */
abstract class CrudTogManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return TogQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\TogTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de  Tegemoetkoming ouders thuiswonde gehandicapte kinderen.";
	}


	public function getEntityTitle(): string
	{
		return "Tog";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/tog/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/tog/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Wet TOG toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Wet TOG aanpassen";
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
	 * @return Tog
	 */
	public function getModel(array $aData = null): Tog
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oTogQuery = TogQuery::create();
		     $oTog = $oTogQuery->findOneById($aData['id']);
		     if (!$oTog instanceof Tog) {
		         throw new LogicException("Tog should be an instance of Tog but got something else." . __METHOD__);
		     }
		     $oTog = $this->fillVo($aData, $oTog);
		} else {
		     $oTog = new Tog();
		     if (!empty($aData)) {
		         $oTog = $this->fillVo($aData, $oTog);
		     }
		}
		return $oTog;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Tog
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Tog
	{
		$oTog = $this->getModel($aData);


		 if(!empty($oTog))
		 {
		     $oTog = $this->fillVo($aData, $oTog);
		     $oTog->save();
		 }
		return $oTog;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Tog $oModel
	 * @return Tog
	 */
	protected function fillVo(array $aData, Tog $oModel): Tog
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
