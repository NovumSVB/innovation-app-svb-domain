<?php
namespace Crud\Custom\NovumSvb\Aow\Base;

use Core\Utils;
use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Aow;
use Model\Custom\NovumSvb\AowQuery;
use Model\Custom\NovumSvb\Map\AowTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Aow instead if you need to override or add functionality.
 */
abstract class CrudAowManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AowQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\AowTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de algemene ouderdoms wet.";
	}


	public function getEntityTitle(): string
	{
		return "Aow";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/algemeen/aow/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/algemeen/aow/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Algemene Ouderdomswet toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Algemene Ouderdomswet aanpassen";
	}


	public function getDefaultOverviewFields(bool $bAddNs = false): array
	{
		$aOverviewColumns = ['PersoonId', 'Bedrag', 'Delete', 'Edit'];
		if($bAddNs){
		   array_walk($aOverviewColumns, function(&$item) {
		      $item = Utils::makeNamespace($this, $item);
		   });
		}
		return $aOverviewColumns;
	}


	public function getDefaultEditFields(bool $bAddNs = false): array
	{
		$aOverviewColumns = ['PersoonId', 'Bedrag', 'Delete', 'Edit'];
		if($bAddNs){
		   array_walk($aOverviewColumns, function(&$item) {
		       $item = Utils::makeNamespace($this, $item);
		   });
		}
		return $aOverviewColumns;
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Aow
	 */
	public function getModel(array $aData = null): Aow
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAowQuery = AowQuery::create();
		     $oAow = $oAowQuery->findOneById($aData['id']);
		     if (!$oAow instanceof Aow) {
		         throw new LogicException("Aow should be an instance of Aow but got something else." . __METHOD__);
		     }
		     $oAow = $this->fillVo($aData, $oAow);
		}
		else {
		     $oAow = new Aow();
		     if (!empty($aData)) {
		         $oAow = $this->fillVo($aData, $oAow);
		     }
		}
		return $oAow;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Aow
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Aow
	{
		$oAow = $this->getModel($aData);


		 if(!empty($oAow))
		 {
		     $oAow = $this->fillVo($aData, $oAow);
		     $oAow->save();
		 }
		return $oAow;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Aow $oModel
	 * @return Aow
	 */
	protected function fillVo(array $aData, Aow $oModel): Aow
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
