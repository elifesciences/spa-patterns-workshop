<?php

namespace tests\SomeCompany\Patterns\Pattern;

use JsonSchema\Validator;
use PHPUnit\Framework\TestCase;
use SomeCompany\Patterns\NormalisesValues;
use SomeCompany\Patterns\Pattern;
use Traversable;

abstract class PatternTest extends TestCase
{
    use NormalisesValues;

    /**
     * @test
     */
    final public function it_is_a_pattern()
    {
        $this->assertInstanceOf(Pattern::class, $this->createPattern());
    }

    /**
     * @test
     */
    final public function it_has_a_template()
    {
        $pattern = $this->createPattern();

        $this->assertFileExists(__DIR__.'/../../../'.$pattern->getTemplatePath());
    }

    /**
     * @test
     */
    final public function it_has_a_schema()
    {
        $pattern = $this->createPattern();

        $this->assertFileExists(__DIR__.'/../../../'.$pattern->getSchemaPath());
    }

    /**
     * @test
     * @dataProvider patternProvider
     * @depends      it_has_a_schema
     */
    final public function it_matches_the_schema(Pattern $pattern)
    {
        $validator = new Validator();

        $json = json_encode($pattern->toArray());
        if ('[]' === $json) {
            $json = '{}';
        }

        $validator->check(json_decode($json), (object) ['$ref' => 'file://'.__DIR__.'/../../../'.$pattern->getSchemaPath()]);

        $message = '';
        foreach ($validator->getErrors() as $error) {
            $message .= sprintf("[%s] %s\n", $error['property'], $error['message']);
        }

        $this->assertTrue($validator->isValid(), $message);
    }

    /**
     * @test
     */
    final public function it_is_array_accessible()
    {
        $pattern = $this->createPattern();
        $data = $pattern->toArray();

        foreach ($data as $key => $value) {
            $actual = $this->normaliseValue($pattern[$key]);

            $this->assertSame($value, $actual);
        }
    }

    abstract protected function createPattern() : Pattern;

    abstract public function patternProvider() : Traversable;

    public static function assertSame($expected, $actual, $message = '')
    {
        parent::assertSame(static::normaliseValue($expected), static::normaliseValue($actual), $message);
    }
}
