<?php
namespace Crud\Custom\NovumSvb\Formulier\Field;

use Core\Cfg;
use Crud\Custom\NovumSvb\CrudApiTrait;
use Crud\Field;
use Crud\FormManager;
use Crud\IEventField;
use Exception\LogicException;
use Model\Custom\NovumSvb\Formulier;

class RenderedForm extends Field implements IEventField{

    protected $sFieldLabel = 'Formulier genereren';

    use CrudApiTrait;

    function getIcon()
    {
        return 'list';
    }

    function hasValidations() { return false; }
    function validate($aPostedData)
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
            $sBaseUrl = $this->getApiUrl();

            if(isset($_SERVER['IS_DEVEL']))
            {
                $sBaseUrl = preg_replace('/\.nu$/', '.nuidev.nl', $this->getApiUrl());
                $sBaseUrl = str_replace('https', 'http', $sBaseUrl);
            }

            $sUrl =  $sBaseUrl . '/v' . $this->getApiVersion() . "/rest/" . strtolower($oCrudManager->getModuleName()) . "/form?layout=" . $oCrudEditor->getName();

            $aOut[] = '<td class="xx">';
            $aOut[] = '    <a title="Open formulier" target="_blank" target="_blank" href="' . $sUrl . '" class="btn btn-success br2 btn-xs fs12 d">';
            $aOut[] = '         <i class="fa fa-' . $this->getIcon() . '"></i>';
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
