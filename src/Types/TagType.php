<?php


namespace App\Types;


use App\Entity\Tags;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('tagName', TextType::class)
			->add('id', TextType::class)
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Tags::class,
		]);
	}
}