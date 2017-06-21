<?php

namespace tests\SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\Pattern\MenuItem;
use Traversable;

final class MenuItemTest extends PatternTest
{
    /**
     * @test
     */
    public function it_has_data()
    {
        $data = [
            'text' => 'text',
            'url' => 'url',
        ];
        $pattern = new MenuItem('text', 'url');

        $this->assertSame($data['text'], $pattern['text']);
        $this->assertSame($data['url'], $pattern['url']);
        $this->assertSame($data, $pattern->toArray());

        $data = [
            'text' => 'text',
            'url' => 'url',
            'isCurrent' => true,
        ];
        $pattern = new MenuItem('text', 'url', true);

        $this->assertSame($data['text'], $pattern['text']);
        $this->assertSame($data['url'], $pattern['url']);
        $this->assertSame($data['isCurrent'], $pattern['isCurrent']);
        $this->assertSame($data, $pattern->toArray());
    }

    public function patternProvider() : Traversable
    {
        yield 'is not current' => [new MenuItem('text', 'url')];
        yield 'is current' => [new MenuItem('text', 'url', true)];
    }

    protected function createPattern() : Pattern
    {
        return new MenuItem('text', 'url');
    }
}
