<?php 
namespace Keyhunter\Administrator\Form\Type;
use Keyhunter\Administrator\Form\Element;

class Color extends Element {

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
		$color = ($this->value == null ? '#000000': $this->value);
		$input = \Form::input('text', $this->name, $this->value, $this->attributes + ['data-color' => true]);
		return <<<OUT
			<div class="input-group  colorpicker-component colorpicker-element">
				<span class="input-group-addon">
					<i style="background-color: {$color}"></i>
				</span>
				{$input}
			</div>
OUT;

	}
}
