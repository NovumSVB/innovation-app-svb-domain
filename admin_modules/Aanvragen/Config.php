<?php
namespace AdminModules\Custom\NovumSvb\Aanvragen;

use AdminModules\ModuleConfig;
use Core\Translate;

final class Config extends ModuleConfig
{
	public function isEnabelable(): bool
	{
		return true;
	}


	public function getModuleTitle(): string
	{
		return Translate::fromCode("Aanvragen");
	}
}
