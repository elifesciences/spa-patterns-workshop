<?php

namespace tests\SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\Pattern\Menu;
use SomeCompany\Patterns\Pattern\MenuItem;
use Traversable;

final class MenuTest extends PatternTest
{
    /**
     * @test
     */
    public function it_has_data()
    {
        $data = [
            'items' => [
                [
                    'text' => 'text',
                    'url' => 'url',
                ],
            ],
        ];
        $pattern = new Menu(new MenuItem('text', 'url'));

        $this->assertSame($data['items'], $pattern['items']);
        $this->assertSame($data, $pattern->toArray());
    }

    public function patternProvider() : Traversable
    {
        yield [new Menu(new MenuItem('text', 'url'))];
    }

    protected function createPattern() : Pattern
    {
        return new Menu(new MenuItem('text', 'url'));
    }
}
