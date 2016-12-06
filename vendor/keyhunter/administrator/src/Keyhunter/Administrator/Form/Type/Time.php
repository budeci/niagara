<?php namespace Keyhunter\Administrator\Form\Type;

use Keyhunter\Administrator\Form\Element;

class Time extends Element {

	/**
	 * The specific defaults for subclasses to override
	 *
	 * @var array
	 */
	protected $attributes = [
		'class' => 'form-control',
		'style'	=> 'width: 262px;'
	];

	/**
	 * The specific rules for subclasses to override
	 *
	 * @var array
	 */
	protected $rules = [];

	public function renderInput()
	{
		$input = \Form::input('text', $this->name, $this->value, $this->attributes + ['data-filter-type' => 'time']);
		return <<<OUT
<div class="input-group timepicker">
	<div class="input-group-addon">
		<span class="glyphicon glyphicon-time"></span>
	</div>
	{$input}
</div>

OUT;

	}
}