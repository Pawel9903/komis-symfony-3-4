<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 09.07.18
 * Time: 13:33
 */

namespace AppBundle\Form;


use AppBundle\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark',TextType::class,['label'=>'Marka*'])
            ->add('model',TextType::class,['label'=>'Model*'])
            ->add('color', TextType::class,['label'=>'Kolor*'])
            ->add('date_production', DateType::class,array(
                'widget'=>'choice',
                'years'=>range(date('Y')-30,date('Y'))
            ))
            ->add('engine', TextType::class,['label'=>'pojemność silnika'])
            ->add('horsepower', TextType::class,['label'=>'ilość koni'])
            ->add('fuel', ChoiceType::class, array(
                'choices'=>array(
                    'diesel'=>'diesel',
                    'benzyna'=>'petrol',
                    'benzyna+gaz'=>'petrolGas'
                )
            ))
            ->add('body', ChoiceType::class, array(
                'choices'=>array(
                    'sedan'=>'sedan',
                    'combi'=>'kombi',
                    'hatchback'=>'hatchback',
                    'cabriolet'=>'cabriolet'
                )
            ))
            ->add('price', NumberType::class, ['label'=>'Cena*'])
            ->add('description', TextareaType::class, ['label'=>'Opis'])
            ->add('image', FileType::class, ['label'=>'Wgraj zdjęcie'])
            ->add('submit', SubmitType::class, ['label'=>'Zapisz']);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>Car::class]);
    }

}