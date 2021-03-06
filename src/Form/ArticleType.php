<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 12/11/18
 * Time: 16:56
 */

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Article;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //on indique tous les champs de la table Article à remplir
        $builder->add('title');
        $builder->add('content');

        //permet de définir un select sur le name de toutes les catégories de la BDD
        $builder->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}