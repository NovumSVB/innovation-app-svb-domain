<?php
namespace Crud\Custom\NovumSvb\Orb\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Map\OrbTableMap;
use Model\Custom\NovumSvb\Orb;
use Model\Custom\NovumSvb\OrbQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Orb instead if you need to override or add functionality.
 */
abstract class CrudOrbManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return OrbQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumSvb\Map\OrbTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat gegenereerde namaak data  omtrent de overbruggingsregeling.";
	}


	public function getEntityTitle(): string
	{
		return "Orb";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/obr/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/tegemoetkomingen/obr/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Overbruggingsregeling toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Overbruggingsregeling aanpassen";
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
	 * @return Orb
	 */
	public function getModel(array $aData = null): Orb
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oOrbQuery = OrbQuery::create();
		     $oOrb = $oOrbQuery->findOneById($aData['id']);
		     if (!$oOrb instanceof Orb) {
		         throw new LogicException("Orb should be an instance of Orb but got something else." . __METHOD__);
		     }
		     $oOrb = $this->fillVo($aData, $oOrb);
		} else {
		     $oOrb = new Orb();
		     if (!empty($aData)) {
		         $oOrb = $this->fillVo($aData, $oOrb);
		     }
		}
		return $oOrb;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Orb
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Orb
	{
		$oOrb = $this->getModel($aData);


		 if(!empty($oOrb))
		 {
		     $oOrb = $this->fillVo($aData, $oOrb);
		     $oOrb->save();
		 }
		return $oOrb;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Orb $oModel
	 * @return Orb
	 */
	protected function fillVo(array $aData, Orb $oModel): Orb
	{
		isset($aData['persoon_id']) ? $oModel->setPersoonId($aData['persoon_id']) : null;
		isset($aData['bedrag']) ? $oModel->setBedrag($aData['bedrag']) : null;
		return $oModel;
	}
}
