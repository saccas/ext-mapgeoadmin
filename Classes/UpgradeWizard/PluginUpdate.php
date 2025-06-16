<?php

declare(strict_types=1);

namespace Saccas\Mapgeoadmin\UpgradeWizard;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('txMapGeoAdminPluginUpdater')]
class PluginUpdate extends AbstractListTypeToCTypeUpdate
{
    #[\Override]
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'mapgeoadmin_embed' => 'mapgeoadmin_embed',
        ];
    }

    #[\Override]
    public function getTitle(): string
    {
        return 'EXT:mapgeoadmin: Migrate plugins';
    }

    #[\Override]
    public function getDescription(): string
    {
        $description = 'This update wizard migrates all existing plugin settings and changes the plugin';
        $description .= ' from list_type to CType.';
        return $description;
    }
}
