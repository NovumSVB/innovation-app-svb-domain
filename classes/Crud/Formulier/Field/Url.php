<?php
namespace Crud\Custom\NovumSvb\Formulier\Field;
use Core\Type\InterfaceOasPrimitive;
use Core\Type\Primitive\StringType;
use Crud\Custom\NovumSvb\Formulier\Field\Base\Code as BaseCode;
use Crud\Generic\Field\GenericString;

/**
 * Skeleton subclass for representing code field from the formulieren table .
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class Url extends GenericString
{
    protected $sFieldName = 'endpoint_url';

    protected $sFieldLabel = 'Endpoint url';

    protected $sIcon = 'globe';

    protected $sPlaceHolder = '';

    protected $sGetter = '';

    protected $sFqModelClassname = '\Model\Custom\NovumSvb\Formulier';

    function getFieldName()
    {
        return $this->sFieldName;
    }
    function getDataType():string
    {
        return 'string';
    }
    function getPrimitive():InterfaceOasPrimitive
    {
        return new StringType();
    }
    static function getApiDescription(): string
    {
        return 'Any textual values, by default no validations are applied';
    }
}
