<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'slub_web_addressbooks',
    'Configuration/TypoScript',
    'SLUB: Historische Adressbuecher'
);
