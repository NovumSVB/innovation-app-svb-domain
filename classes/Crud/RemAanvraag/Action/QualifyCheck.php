<?php
namespace Crud\Custom\NovumSvb\RemAanvraag\Action;

use Crud\AbstractActionDefinition;
use Crud\IActionDefinition;

final class QualifyCheck extends AbstractActionDefinition implements IActionDefinition
{
    function getExampleRequest(): string
    {
        return 'asdfafs';
    }
    function getExampleAnswer(): string
    {
        return 'asdfafs';
    }
    function getDescription(): string
    {
        return 'Controleer of gebruiker in aanmerking voor uitkering';
    }
    function trigger($sEnvironment): void
    {
        // TODO: Implement trigger() method.
    }
    function isConfigurable(): bool
    {
        return false;
    }

}
