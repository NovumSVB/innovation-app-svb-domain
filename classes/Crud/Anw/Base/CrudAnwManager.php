<?php
namespace Crud\Custom\NovumSvb\Anw\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Anw;
use Model\Custom\NovumSvb\AnwQuery;
use Model\Custom\NovumSvb\Map\AnwTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Anw instead if you need to override or add functionality.
 */
abstract class CrudAnwManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AnwQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\AnwTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de nabestaandenwet.";
	}


	public function getEntityTitle(): string
	{
		return "Anw";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/nabestaanden/anw/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/nabestaanden/anw/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Nabestaandenwet toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Nabestaandenwet aanpassen";
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
	 * @return Anw
	 */
	public function getModel(array $aData = null): Anw
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAnwQuery = AnwQuery::create();
		     $oAnw = $oAnwQuery->findOneById($aData['id']);
		     if (!$oAnw instanceof Anw) {
		         throw new LogicException("Anw should be an instance of Anw but got something else." . __METHOD__);
		     }
		     $oAnw = $this->fillVo($aData, $oAnw);
		}
		else {
		     $oAnw = new Anw();
		     if (!empty($aData)) {
		         $oAnw = $this->fillVo($aData, $oAnw);
		     }
		}
		return $oAnw;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Anw
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Anw
	{
		$oAnw = $this->getModel($aData);


		 if(!empty($oAnw))
		 {
		     $oAnw = $this->fillVo($aData, $oAnw);
		     $oAnw->save();
		 }
		return $oAnw;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Anw $oModel
	 * @return Anw
	 */
	protected function fillVo(array $aData, Anw $oModel): Anw
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
