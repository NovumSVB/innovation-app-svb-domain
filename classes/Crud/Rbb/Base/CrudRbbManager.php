<?php
namespace Crud\Custom\NovumSvb\Rbb\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\RbbTableMap;
use Model\Custom\NovumSvb\Rbb;
use Model\Custom\NovumSvb\RbbQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Rbb instead if you need to override or add functionality.
 */
abstract class CrudRbbManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return RbbQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\RbbTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de regeling bijstand buitenland.";
	}


	public function getEntityTitle(): string
	{
		return "Rbb";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/rbb/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/rbb/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Bijstand Buitenland toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Bijstand Buitenland aanpassen";
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
	 * @return Rbb
	 */
	public function getModel(array $aData = null): Rbb
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oRbbQuery = RbbQuery::create();
		     $oRbb = $oRbbQuery->findOneById($aData['id']);
		     if (!$oRbb instanceof Rbb) {
		         throw new LogicException("Rbb should be an instance of Rbb but got something else." . __METHOD__);
		     }
		     $oRbb = $this->fillVo($aData, $oRbb);
		} else {
		     $oRbb = new Rbb();
		     if (!empty($aData)) {
		         $oRbb = $this->fillVo($aData, $oRbb);
		     }
		}
		return $oRbb;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Rbb
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Rbb
	{
		$oRbb = $this->getModel($aData);


		 if(!empty($oRbb))
		 {
		     $oRbb = $this->fillVo($aData, $oRbb);
		     $oRbb->save();
		 }
		return $oRbb;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Rbb $oModel
	 * @return Rbb
	 */
	protected function fillVo(array $aData, Rbb $oModel): Rbb
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
