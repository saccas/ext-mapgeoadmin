<?php

declare(strict_types=1);

namespace Saccas\Mapgeoadmin\UpgradeWizard;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

#[UpgradeWizard('txMapGeoAdminPluginUpdater')]
class PluginUpdate implements UpgradeWizardInterface
{
    private const array MIGRATION_SETTINGS = [
        'listType' => 'mapgeoadmin_embed',
        'targetCType' => 'mapgeoadmin_embed',
    ];

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return 'EXT:mapgeoadmin: Migrate plugins';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        $description = 'The old plugin using switchableControllerActions has been split into separate plugins. ';
        $description .= 'This update wizard migrates all existing plugin settings and changes the plugin';
        $description .= 'to use the new plugins available. Count of plugins: ' . count($this->getMigrationRecords());
        return $description;
    }

    /**
     * @inheritDoc
     */
    public function executeUpdate(): bool
    {
        return $this->performMigration();
    }

    /**
     * @inheritDoc
     */
    public function updateNecessary(): bool
    {
        return $this->checkIfWizardIsRequired();
    }

    /**
     * @inheritDoc
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    protected function performMigration(): bool
    {
        $records = $this->getMigrationRecords();

        foreach ($records as $record) {
            $targetCType = $this->getTargetCType($record['list_type']);
            if ($targetCType === '') {
                continue;
            }

            $this->updateContentElement($record['uid'], $targetCType);
        }

        return true;
    }

    protected function getTargetCType(string $oldListType): string
    {
        if (self::MIGRATION_SETTINGS['listType'] === $oldListType) {
            return self::MIGRATION_SETTINGS['targetCType'];
        }

        return '';
    }

    protected function updateContentElement(int $uid, string $newCType): void
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->update('tt_content')
            ->set('CType', $newCType)
            ->set('list_type', '')
            ->where(
                $queryBuilder->expr()->in(
                    'uid',
                    $queryBuilder->createNamedParameter($uid, Connection::PARAM_INT)
                )
            )
            ->executeStatement();
    }

    protected function checkIfWizardIsRequired(): bool
    {
        return count($this->getMigrationRecords()) > 0;
    }

    protected function getMigrationRecords(): array
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $queryBuilder = $connectionPool->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        return $queryBuilder
            ->select('uid', 'pid', 'CType', 'list_type')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq(
                    'CType',
                    $queryBuilder->createNamedParameter('list')
                ),
                $queryBuilder->expr()->eq(
                    'list_type',
                    $queryBuilder->createNamedParameter('mapgeoadmin_embed')
                )
            )
            ->executeQuery()
            ->fetchAllAssociative();
    }
}
