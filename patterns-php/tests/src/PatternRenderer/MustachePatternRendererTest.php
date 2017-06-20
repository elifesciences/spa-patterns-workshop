<?php

namespace tests\SomeCompany\Patterns\PatternRenderer;

use Mustache_Engine;
use PHPUnit\Framework\TestCase;
use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\PatternRenderer;
use SomeCompany\Patterns\PatternRenderer\MustachePatternRenderer;

final class MustachePatternRendererTest extends TestCase
{
    /**
     * @test
     */
    public function it_is_a_pattern_renderer()
    {
        $patternRenderer = new MustachePatternRenderer(new Mustache_Engine());

        $this->assertInstanceOf(PatternRenderer::class, $patternRenderer);
    }

    /**
     * @test
     */
    public function it_renders_patterns()
    {
        $patternRenderer = new MustachePatternRenderer(new Mustache_Engine());

        $pattern1 = $this->prophesize(Pattern::class);
        $pattern1->offsetExists('foo')->willReturn(true);
        $pattern1->offsetGet('foo')->willReturn('bar');
        $pattern1->getTemplatePath()->willReturn('foo {{foo}}');

        $pattern2 = $this->prophesize(Pattern::class);
        $pattern2->offsetExists('baz')->willReturn(true);
        $pattern2->offsetGet('baz')->willReturn('qux');
        $pattern2->getTemplatePath()->willReturn('baz {{baz}}');

        $this->assertSame('foo barbaz qux', $patternRenderer->render($pattern1->reveal(), $pattern2->reveal()));
    }
}
