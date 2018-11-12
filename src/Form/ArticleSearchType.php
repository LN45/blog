<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 12/11/18
 * Time: 16:56
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('searchField');
    }
}