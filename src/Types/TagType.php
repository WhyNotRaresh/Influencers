<?php


namespace App\Types;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TagType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		parent::buildForm($builder, $options);
	}
}