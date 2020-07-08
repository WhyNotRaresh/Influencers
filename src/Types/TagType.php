<?php


namespace App\Types;


use App\Entity\Tags;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('tagName', TextType::class, [
				'data' => '__value__',
				'label' => false,
				'attr' => [
					'readonly' => true,
					'class' => 'tag-form-style',
				]
			])
			->add('id', IntegerType::class, [
				'data' => -200,
				'label' => false,
				'attr' => [
					'hidden' => true,
					'readonly' => true
				]
			])
		;
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => Tags::class,
		]);
	}
}