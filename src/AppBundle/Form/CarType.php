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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark',TextType::class,['label'=>'Marka'])
            ->add('model',TextType::class,['label'=>'Model'])
            ->add('color', TextType::class,['label'=>'Kolor'])
            //->add('date_production', DateType::class,['label'=>'Data produkcji'])
            ->add('engine', TextType::class,['label'=>'silnik'])
            ->add('horsepower', TextType::class,['label'=>'ilość koni'])
            ->add('fuel', TextType::class,['label'=>'rodzaj paliwa'])
            ->add('body', TextType::class,['label'=>'rodzaj nadwozia'])
            ->add('price', NumberType::class, ['label'=>'Cena'])
            ->add('description', TextareaType::class, ['label'=>'Opis'])
            ->add('submit', SubmitType::class, ['label'=>'Dodaj']);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class'=>Car::class]);
    }
}