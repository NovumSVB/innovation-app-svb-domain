<?php
namespace Crud\Custom\NovumSvb\Grondslag\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Grondslag;
use Model\Custom\NovumSvb\GrondslagQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Grondslag instead if you need to override or add functionality.
 */
abstract class CrudGrondslagManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return GrondslagQuery::create();
	}


	public function getShortDescription(): string
	{
		return "In dit endpoint staat opgeslagen van welke (externe) gegevensbronnen het Svb gebruik maakt om haar taken te kunnen verrichten.";
	}


	public function getEntityTitle(): string
	{
		return "Grondslag";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/databronnen/grondslag/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/databronnen/grondslag/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Grondslagen toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Grondslagen aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['WetId', 'DatabronId', 'RemoteVeld', 'CrudEditorBlockField', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['WetId', 'DatabronId', 'RemoteVeld', 'CrudEditorBlockField'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Grondslag
	 */
	public function getModel(array $aData = null): Grondslag
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oGrondslagQuery = GrondslagQuery::create();
		     $oGrondslag = $oGrondslagQuery->findOneById($aData['id']);
		     if (!$oGrondslag instanceof Grondslag) {
		         throw new LogicException("Grondslag should be an instance of Grondslag but got something else." . __METHOD__);
		     }
		     $oGrondslag = $this->fillVo($aData, $oGrondslag);
		} else {
		     $oGrondslag = new Grondslag();
		     if (!empty($aData)) {
		         $oGrondslag = $this->fillVo($aData, $oGrondslag);
		     }
		}
		return $oGrondslag;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Grondslag
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Grondslag
	{
		$oGrondslag = $this->getModel($aData);


		 if(!empty($oGrondslag))
		 {
		     $oGrondslag = $this->fillVo($aData, $oGrondslag);
		     $oGrondslag->save();
		 }
		return $oGrondslag;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Grondslag $oModel
	 * @return Grondslag
	 */
	protected function fillVo(array $aData, Grondslag $oModel): Grondslag
	{
		isset($aData['wet_id']) ? $oModel->setWetId($aData['wet_id']) : null;
		isset($aData['databron_id']) ? $oModel->setDatabronId($aData['databron_id']) : null;
		isset($aData['remote_veld']) ? $oModel->setRemoteVeld($aData['remote_veld']) : null;
		isset($aData['crud_editor_block_field']) ? $oModel->setCrudEditorBlockField($aData['crud_editor_block_field']) : null;
		return $oModel;
	}
}
