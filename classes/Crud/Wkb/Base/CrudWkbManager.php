<?php
namespace Crud\Custom\NovumSvb\Wkb\Base;

use Core\Utils;
use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\WkbTableMap;
use Model\Custom\NovumSvb\Wkb;
use Model\Custom\NovumSvb\WkbQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Wkb instead if you need to override or add functionality.
 */
abstract class CrudWkbManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return WkbQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\WkbTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent het kindgebonden budget.";
	}


	public function getEntityTitle(): string
	{
		return "Wkb";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/wkb/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/wkb/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Wet kindgebonden budget toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Wet kindgebonden budget aanpassen";
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
	 * @return Wkb
	 */
	public function getModel(array $aData = null): Wkb
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oWkbQuery = WkbQuery::create();
		     $oWkb = $oWkbQuery->findOneById($aData['id']);
		     if (!$oWkb instanceof Wkb) {
		         throw new LogicException("Wkb should be an instance of Wkb but got something else." . __METHOD__);
		     }
		     $oWkb = $this->fillVo($aData, $oWkb);
		}
		else {
		     $oWkb = new Wkb();
		     if (!empty($aData)) {
		         $oWkb = $this->fillVo($aData, $oWkb);
		     }
		}
		return $oWkb;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Wkb
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Wkb
	{
		$oWkb = $this->getModel($aData);


		 if(!empty($oWkb))
		 {
		     $oWkb = $this->fillVo($aData, $oWkb);
		     $oWkb->save();
		 }
		return $oWkb;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Wkb $oModel
	 * @return Wkb
	 */
	protected function fillVo(array $aData, Wkb $oModel): Wkb
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
