<?php
namespace anlutro\LaravelForm\Tests;

use Mockery as m;

class ValidatedFormTest extends TestCase
{
	public function tearDown()
	{
		m::close();
	}

	/** @test */
	public function simpleValidation()
	{
		$form = $this->makeForm('ValidatedFormStub');
		$this->validator->shouldReceive('make')->once()->with(['foo' => 'bar'], ['foo' => 'required'], [], [])->andReturn(m::mock(['passes' => true]));
		$this->mockRequest($form, ['foo' => 'bar']);
		$this->assertTrue($form->isValid());
	}
}

class ValidatedFormStub extends \anlutro\LaravelForm\AbstractForm
{
	public function getValidationRules()
	{
		return ['foo' => 'required'];
	}
}
