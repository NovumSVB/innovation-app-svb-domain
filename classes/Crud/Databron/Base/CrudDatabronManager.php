<?php
namespace Crud\Custom\NovumSvb\Databron\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Databron;
use Model\Custom\NovumSvb\DatabronQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Databron instead if you need to override or add functionality.
 */
abstract class CrudDatabronManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return DatabronQuery::create();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint is opgeslagen welke databronnen het SvB mogelijk tot haar beschikking heeft.";
	}


	public function getEntityTitle(): string
	{
		return "Databron";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/databronnen/databron/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/databronnen/databron/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Databronnen toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Databronnen aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Titel', 'Code', 'Url', 'Documentation', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Titel', 'Code', 'Url', 'Documentation'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Databron
	 */
	public function getModel(array $aData = null): Databron
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oDatabronQuery = DatabronQuery::create();
		     $oDatabron = $oDatabronQuery->findOneById($aData['id']);
		     if (!$oDatabron instanceof Databron) {
		         throw new LogicException("Databron should be an instance of Databron but got something else." . __METHOD__);
		     }
		     $oDatabron = $this->fillVo($aData, $oDatabron);
		} else {
		     $oDatabron = new Databron();
		     if (!empty($aData)) {
		         $oDatabron = $this->fillVo($aData, $oDatabron);
		     }
		}
		return $oDatabron;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Databron
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Databron
	{
		$oDatabron = $this->getModel($aData);


		 if(!empty($oDatabron))
		 {
		     $oDatabron = $this->fillVo($aData, $oDatabron);
		     $oDatabron->save();
		 }
		return $oDatabron;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Databron $oModel
	 * @return Databron
	 */
	protected function fillVo(array $aData, Databron $oModel): Databron
	{
		isset($aData['titel']) ? $oModel->setTitel($aData['titel']) : null;
		isset($aData['code']) ? $oModel->setCode($aData['code']) : null;
		isset($aData['url']) ? $oModel->setUrl($aData['url']) : null;
		isset($aData['documentation']) ? $oModel->setDocumentation($aData['documentation']) : null;
		return $oModel;
	}
}
