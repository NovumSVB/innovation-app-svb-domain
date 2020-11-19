<?php
namespace Crud\Custom\NovumSvb\Akw\Base;

use Core\Utils;
use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Akw;
use Model\Custom\NovumSvb\AkwQuery;
use Model\Custom\NovumSvb\Map\AkwTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Akw instead if you need to override or add functionality.
 */
abstract class CrudAkwManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return AkwQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\AkwTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de algemene kinderbijslagwet.";
	}


	public function getEntityTitle(): string
	{
		return "Akw";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/algemeen/akw/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/algemeen/akw/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Algemene Kinderbijslagwet toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Algemene Kinderbijslagwet aanpassen";
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
	 * @return Akw
	 */
	public function getModel(array $aData = null): Akw
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oAkwQuery = AkwQuery::create();
		     $oAkw = $oAkwQuery->findOneById($aData['id']);
		     if (!$oAkw instanceof Akw) {
		         throw new LogicException("Akw should be an instance of Akw but got something else." . __METHOD__);
		     }
		     $oAkw = $this->fillVo($aData, $oAkw);
		}
		else {
		     $oAkw = new Akw();
		     if (!empty($aData)) {
		         $oAkw = $this->fillVo($aData, $oAkw);
		     }
		}
		return $oAkw;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Akw
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Akw
	{
		$oAkw = $this->getModel($aData);


		 if(!empty($oAkw))
		 {
		     $oAkw = $this->fillVo($aData, $oAkw);
		     $oAkw->save();
		 }
		return $oAkw;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Akw $oModel
	 * @return Akw
	 */
	protected function fillVo(array $aData, Akw $oModel): Akw
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
