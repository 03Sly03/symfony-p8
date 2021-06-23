<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\SchoolYear;
use App\Entity\Tag;
use App\Entity\Teacher;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('schoolYears', EntityType::class, [
                'class' => SchoolYear::class,
                'choice_label' => function(SchoolYear $schoolYear) {
                    return "{$schoolYear->getName()} {$schoolYear->getDescription()}";
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => function(Tag $tag) {
                    return "{$tag->getName()} {$tag->getDescription()}";
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => function(User $user) {
                    return "{$user->getId()} {$user->getEmail()}";
                },
                'expanded' => false,
            ])
            ->add('projects', EntityType::class, [
                'class' => Project::class,
                'choice_label' => function(Project $project) {
                    return "{$project->getName()} {$project->getdescription()}";
                },
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
