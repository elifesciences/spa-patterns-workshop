<?php

namespace SomeCompany\Application\Composer;

use ComposerLocator;
use Symfony\Component\Filesystem\Filesystem;

final class ScriptHandler
{
    public static function installAssets()
    {
        $filesystem = new Filesystem();

        // Makes stylesheets and images publically available.
        $filesystem->mirror(ComposerLocator::getPath('some-company/patterns').'/resources/css', __DIR__.'/../../web/patterns/css', null, ['delete' => true]);
        $filesystem->mirror(ComposerLocator::getPath('some-company/patterns').'/resources/images', __DIR__.'/../../web/patterns/images', null, ['delete' => true]);
    }
}
