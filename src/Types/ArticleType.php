<?php


namespace App\Types;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
	        ->add('tagList', CollectionType::class, [
		        'entry_type' => TagType::class,
		        'allow_add' => true,
		        'prototype' => true,
	        ])
	        ->add('author', AuthorType::class)
            ->add('title', TextType::class)
            ->add('content', TextType::class)
        ;
    }
}