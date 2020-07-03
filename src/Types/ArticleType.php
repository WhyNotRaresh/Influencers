<?php


namespace App\Types;

use App\Entity\Authors;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
	        ->add('author', AuthorType::class)
            ->add('title', TextType::class)
            ->add('content', TextType::class)
	        ->add('submit', SubmitType::class)
        ;
    }
}