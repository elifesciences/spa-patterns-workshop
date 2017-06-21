<?php

namespace tests\SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\Pattern\Menu;
use SomeCompany\Patterns\Pattern\MenuItem;
use SomeCompany\Patterns\Pattern\SiteHeader;
use Traversable;

final class SiteHeaderTest extends PatternTest
{
    /**
     * @test
     */
    public function it_has_data()
    {
        $data = [
            'title' => 'title',
            'homeUrl' => 'url',
            'text' => 'text',
        ];
        $pattern = new SiteHeader('title', 'url', 'text');

        $this->assertSame($data['title'], $pattern['title']);
        $this->assertSame($data['homeUrl'], $pattern['homeUrl']);
        $this->assertSame($data['text'], $pattern['text']);
        $this->assertSame($data, $pattern->toArray());

        $data = [
            'title' => 'title',
            'homeUrl' => 'url',
            'text' => 'text',
            'menu' => [
                'items' => [
                    [
                        'text' => 'text',
                        'url' => 'url',
                    ],
                ],
            ],
        ];
        $pattern = new SiteHeader('title', 'url', 'text', new Menu(new MenuItem('text', 'url')));

        $this->assertSame($data['title'], $pattern['title']);
        $this->assertSame($data['homeUrl'], $pattern['homeUrl']);
        $this->assertSame($data['text'], $pattern['text']);
        $this->assertSame($data['menu'], $pattern['menu']);
        $this->assertSame($data, $pattern->toArray());

    }

    public function patternProvider() : Traversable
    {
        yield 'without menu' => [new SiteHeader('title', 'url', 'text')];
        yield 'with menu' => [new SiteHeader('title', 'url', 'text', new Menu(new MenuItem('text', 'url', true)))];
    }

    protected function createPattern() : Pattern
    {
        return new SiteHeader('title', 'url', 'text');
    }
}
