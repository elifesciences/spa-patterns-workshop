<?php

namespace SomeCompany\Application\Composer;

use ComposerLocator;
use Symfony\Component\Filesystem\Filesystem;

final class ScriptHandler
{
    public static function installAssets()
    {
        $filesystem = new Filesystem();

        $filesystem->mirror(ComposerLocator::getPath('some-company/patterns').'/resources/css', __DIR__.'/../../web/patterns', null, ['delete' => true]);
    }
}
