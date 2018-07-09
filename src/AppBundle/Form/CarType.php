<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 09.07.18
 * Time: 13:33
 */

namespace AppBundle\Form;


use AppBundle\Entity\Cars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark',TextType::class,['label'=>'Marka'])
            ->add('color', TextType::class,['label'=>'Kolor'])
            ->add('price', NumberType::class, ['label'=>'Cena'])
            ->add('country', TextType::class, ['label' => 'Kraj pochodzenia'])
            ->add('submit', SubmitType::class, ['label'=>'Dodaj']);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>Cars::class]);
    }
}