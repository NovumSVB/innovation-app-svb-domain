<?php
namespace Crud\Custom\NovumSvb\Aio\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Aio;
use Model\Custom\NovumSvb\AioQuery;
use Model\Custom\NovumSvb\Map\AioTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Aio instead if you need to override or add functionality.
 */
abstract class CrudAioManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AioQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\AioTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de inkomensvoorziening voor ouderen.";
	}


	public function getEntityTitle(): string
	{
		return "Aio";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/algemeen/aio/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/algemeen/aio/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Inkomensvoorziening ouderen toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Inkomensvoorziening ouderen aanpassen";
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
	 * @return Aio
	 */
	public function getModel(array $aData = null): Aio
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAioQuery = AioQuery::create();
		     $oAio = $oAioQuery->findOneById($aData['id']);
		     if (!$oAio instanceof Aio) {
		         throw new LogicException("Aio should be an instance of Aio but got something else." . __METHOD__);
		     }
		     $oAio = $this->fillVo($aData, $oAio);
		} else {
		     $oAio = new Aio();
		     if (!empty($aData)) {
		         $oAio = $this->fillVo($aData, $oAio);
		     }
		}
		return $oAio;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Aio
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Aio
	{
		$oAio = $this->getModel($aData);


		 if(!empty($oAio))
		 {
		     $oAio = $this->fillVo($aData, $oAio);
		     $oAio->save();
		 }
		return $oAio;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Aio $oModel
	 * @return Aio
	 */
	protected function fillVo(array $aData, Aio $oModel): Aio
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
