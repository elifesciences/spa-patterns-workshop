<?php

namespace tests\SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\Pattern\HelloWorld;
use Traversable;

final class HelloWorldTest extends PatternTest
{
    /**
     * @test
     */
    public function it_has_data()
    {
        $data = [];
        $pattern = new HelloWorld();

        $this->assertSame($data, $pattern->toArray());

        $data = [
            'worldName' => 'jupiter',
        ];
        $pattern = new HelloWorld($data['worldName']);

        $this->assertSame($data['worldName'], $pattern['worldName']);
        $this->assertSame($data, $pattern->toArray());
    }

    public function patternProvider() : Traversable
    {
        yield 'no name' => [new HelloWorld()];
        yield 'with name' => [new HelloWorld('jupiter')];
    }

    protected function createPattern() : Pattern
    {
        return new HelloWorld('jupiter');
    }
}
