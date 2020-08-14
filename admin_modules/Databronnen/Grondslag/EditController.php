<?php
namespace AdminModules\Custom\NovumSvb\Databronnen\Grondslag;

/**
 * Skeleton subclass for drawing a list of Grondslag records.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
final class EditController extends Base\EditController
{
    function __construct($aGet, $aPost)
    {
        $this->addJsFile('/admin_modules/Custom/NovumSvb/Databronnen/Grondslag/edit.js');
        parent::__construct($aGet, $aPost);
    }
}
