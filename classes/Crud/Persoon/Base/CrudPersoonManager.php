<?php
namespace Crud\Custom\NovumSvb\Persoon\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\PersoonTableMap;
use Model\Custom\NovumSvb\Persoon;
use Model\Custom\NovumSvb\PersoonQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Persoon instead if you need to override or add functionality.
 */
abstract class CrudPersoonManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return PersoonQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\PersoonTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat fake bsn nummers.";
	}


	public function getEntityTitle(): string
	{
		return "Persoon";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/persoonsgegevens/persoon/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/persoonsgegevens/persoon/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Personen toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Personen aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Bsn', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Bsn'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Persoon
	 */
	public function getModel(array $aData = null): Persoon
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oPersoonQuery = PersoonQuery::create();
		     $oPersoon = $oPersoonQuery->findOneById($aData['id']);
		     if (!$oPersoon instanceof Persoon) {
		         throw new LogicException("Persoon should be an instance of Persoon but got something else." . __METHOD__);
		     }
		     $oPersoon = $this->fillVo($aData, $oPersoon);
		} else {
		     $oPersoon = new Persoon();
		     if (!empty($aData)) {
		         $oPersoon = $this->fillVo($aData, $oPersoon);
		     }
		}
		return $oPersoon;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Persoon
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Persoon
	{
		$oPersoon = $this->getModel($aData);


		 if(!empty($oPersoon))
		 {
		     $oPersoon = $this->fillVo($aData, $oPersoon);
		     $oPersoon->save();
		 }
		return $oPersoon;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Persoon $oModel
	 * @return Persoon
	 */
	protected function fillVo(array $aData, Persoon $oModel): Persoon
	{
		isset($aData['bsn']) ? $oModel->setBsn($aData['bsn']) : null;
		return $oModel;
	}
}
