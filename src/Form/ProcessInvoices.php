<?php
namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProcessInvoices extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data')
            ->add('currencies')
            ->add('currency_code')
            ->add('customer_id')
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
            'csrf_protection' => false
        ]);
    }
}