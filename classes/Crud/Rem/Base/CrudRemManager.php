<?php
namespace Crud\Custom\NovumSvb\Rem\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\RemTableMap;
use Model\Custom\NovumSvb\Rem;
use Model\Custom\NovumSvb\RemQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Rem instead if you need to override or add functionality.
 */
abstract class CrudRemManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return RemQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\RemTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de remigratiewet.";
	}


	public function getEntityTitle(): string
	{
		return "Rem";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/rem/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/rem/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Remigratiewet toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Remigratiewet aanpassen";
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
	 * @return Rem
	 */
	public function getModel(array $aData = null): Rem
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oRemQuery = RemQuery::create();
		     $oRem = $oRemQuery->findOneById($aData['id']);
		     if (!$oRem instanceof Rem) {
		         throw new LogicException("Rem should be an instance of Rem but got something else." . __METHOD__);
		     }
		     $oRem = $this->fillVo($aData, $oRem);
		} else {
		     $oRem = new Rem();
		     if (!empty($aData)) {
		         $oRem = $this->fillVo($aData, $oRem);
		     }
		}
		return $oRem;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Rem
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Rem
	{
		$oRem = $this->getModel($aData);


		 if(!empty($oRem))
		 {
		     $oRem = $this->fillVo($aData, $oRem);
		     $oRem->save();
		 }
		return $oRem;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Rem $oModel
	 * @return Rem
	 */
	protected function fillVo(array $aData, Rem $oModel): Rem
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
