<?php
namespace Crud\Custom\NovumSvb\Formulier\Base;

use Crud\Custom\NovumSvb;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumSvb\Formulier;
use Model\Custom\NovumSvb\FormulierQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify Formulier instead if you need to override or add functionality.
 */
abstract class CrudFormulierManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use NovumSvb\CrudTrait;
	use NovumSvb\CrudApiTrait;

	public function getQueryObject(): ModelCriteria
	{
		return FormulierQuery::create();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat wetten en regelgevingen waarvoor het SvB data van externe partijen nodig heeft.";
	}


	public function getEntityTitle(): string
	{
		return "Formulier";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumsvb/databronnen/formulieren/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumsvb/databronnen/formulieren/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Formulieren toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Formulieren aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Titel', 'Code', 'IntroText', 'WetId', 'CrudEditorId', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Titel', 'Code', 'IntroText', 'WetId', 'CrudEditorId'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return Formulier
	 */
	public function getModel(array $aData = null): Formulier
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oFormulierQuery = FormulierQuery::create();
		     $oFormulier = $oFormulierQuery->findOneById($aData['id']);
		     if (!$oFormulier instanceof Formulier) {
		         throw new LogicException("Formulier should be an instance of Formulier but got something else." . __METHOD__);
		     }
		     $oFormulier = $this->fillVo($aData, $oFormulier);
		} else {
		     $oFormulier = new Formulier();
		     if (!empty($aData)) {
		         $oFormulier = $this->fillVo($aData, $oFormulier);
		     }
		}
		return $oFormulier;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return Formulier
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): Formulier
	{
		$oFormulier = $this->getModel($aData);


		 if(!empty($oFormulier))
		 {
		     $oFormulier = $this->fillVo($aData, $oFormulier);
		     $oFormulier->save();
		 }
		return $oFormulier;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param Formulier $oModel
	 * @return Formulier
	 */
	protected function fillVo(array $aData, Formulier $oModel): Formulier
	{
		isset($aData['titel']) ? $oModel->setTitel($aData['titel']) : null;
		isset($aData['code']) ? $oModel->setCode($aData['code']) : null;
		isset($aData['intro_text']) ? $oModel->setIntroText($aData['intro_text']) : null;
		isset($aData['wet_id']) ? $oModel->setWetId($aData['wet_id']) : null;
		isset($aData['crud_editor_id']) ? $oModel->setCrudEditorId($aData['crud_editor_id']) : null;
		return $oModel;
	}
}
