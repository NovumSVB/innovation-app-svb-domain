<?php
namespace Crud\Custom\NovumSvb\Wet\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Wet;
use Model\Custom\NovumSvb\WetQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Wet instead if you need to override or add functionality.
 */
abstract class CrudWetManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return WetQuery::create();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat wetten en regelgevingen waarvoor het SvB data van externe partijen nodig heeft.";
	}


	public function getEntityTitle(): string
	{
		return "Wet";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/databronnen/wet/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/databronnen/wet/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Wetten toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Wetten aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Titel', 'Code', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Titel', 'Code'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Wet
	 */
	public function getModel(array $aData = null): Wet
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oWetQuery = WetQuery::create();
		     $oWet = $oWetQuery->findOneById($aData['id']);
		     if (!$oWet instanceof Wet) {
		         throw new LogicException("Wet should be an instance of Wet but got something else." . __METHOD__);
		     }
		     $oWet = $this->fillVo($aData, $oWet);
		} else {
		     $oWet = new Wet();
		     if (!empty($aData)) {
		         $oWet = $this->fillVo($aData, $oWet);
		     }
		}
		return $oWet;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Wet
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Wet
	{
		$oWet = $this->getModel($aData);


		 if(!empty($oWet))
		 {
		     $oWet = $this->fillVo($aData, $oWet);
		     $oWet->save();
		 }
		return $oWet;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Wet $oModel
	 * @return Wet
	 */
	protected function fillVo(array $aData, Wet $oModel): Wet
	{
		isset($aData['titel']) ? $oModel->setTitel($aData['titel']) : null;
		isset($aData['code']) ? $oModel->setCode($aData['code']) : null;
		return $oModel;
	}
}
