<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Field;

use Core\DeferredAction;
use Core\Utils;
use Crud\Component;
use Crud\Custom\NovumSvb\CrudApiTrait;
use Crud\FormManager;
use Crud\IAppOnlyField;
use Crud\IComponent;
use Crud\IEventField;
use Crud\IField;
use Crud\INeedsFullEditorBlock;
use Crud\IRecurringField;
use Exception\LogicException;
use Model\Custom\NovumSvb\Formulier;

class FlowLogic extends Component implements IComponent, IRecurringField, INeedsFullEditorBlock, IAppOnlyField, IEventField {

    protected $sFieldLabel = 'Flow logic';

    use CrudApiTrait;

    function isMutable()
    {
        return false;
    }
    function toArray(): array
    {
        return [];
    }

    function getFieldName()
    {
        return 'flow_logic';
    }
    function getFieldLabel()
    {
        return $this->sFieldLabel;
    }

    function getIcon()
    {
        return 'lock';
    }

    function isConfigurable(): bool
    {
        return true;
    }
    function getConfigUrl(): ?string
    {
        $sModuleName = $this->getModuleName();

        $aArgs = [
            'module' => $sModuleName,
            'manager' => $sModuleName . 'Manager',
            'name' => $_GET['name']
        ];

        return '/generic/flow/edit?' . http_build_query($aArgs);
    }

    function hasValidations() { return false; }
    function validate()
    {
        $mResponse = false;
        return $mResponse;
    }

    function getFieldTitle(){
        return $this->sFieldLabel;
    }

    function getOverviewHeader()
    {
        $aOut = [];
        $aOut[] = '<th class="iconcol">';
        $aOut[] = '    <a href="#" class="btn btn-default br2 btn-xs">';
        $aOut[] = '         <i class="fa fa-' . $this->getIcon() .'"></i>';
        $aOut[] = '    </a>';
        $aOut[] = '</th>';
        return join(PHP_EOL, $aOut);
    }

    /**
     * @param $mData
     * @return string
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \ReflectionException
     */
    function getOverviewValue($mData)
    {
        if(!$mData instanceof Formulier)
        {
            throw new LogicException("Expected an instance of Product, got ".get_class($mData));
        }

        $oCrudEditor = $mData->getCrudEditorReference();
        $oCrudConfig = $oCrudEditor->getCrudConfig();
        $sCrudManagerFqn = $oCrudConfig->getManagerName();

        $oCrudManager = new $sCrudManagerFqn;

        $aOut = [];
        if(!$oCrudManager instanceof FormManager)
        {
            $aOut[] = '<td class="xx"></td>';
        }
        else
        {
            DeferredAction::register('form_edit', Utils::getRequestUri());
            $sQuery = http_build_query([
                "module" =>  $oCrudManager->getModuleName(),
                "manager" => $oCrudManager->getModuleName() . 'Manager',
                'name' => $oCrudEditor->getName(),
                'do_after_save' => 'form_edit',
                'title' => $mData->getTitel()
            ]);

            $sUrl = '/generic/crud/editor_edit?' . $sQuery;
            $aOut[] = '<td class="xx">';
            $aOut[] = '    <a title="Formulier bewerken" href="' . $sUrl . '" class="btn btn-success br2 btn-xs fs12 d">';
            $aOut[] = '         <i class="fa fa-pencil"></i>';
            $aOut[] = '    </a>';
            $aOut[] = '</td>';
        }
        return join(PHP_EOL, $aOut);
    }

    function getEditHtml($mData, $bReadonly)
    {
        throw new LogicException("Add field should not be there in edit view.");
    }
}
