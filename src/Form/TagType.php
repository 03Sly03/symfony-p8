<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('students', EntityType::class, [
                'class' => Student::class,
                'choice_label' => function(Student $student) {
                    return "{$student->getFirstname()} {$student->getFirstname()}";
                },
                'multiple' => true,
                'expanded' => false,
            ])
            ->add('projects', EntityType::class, [
                'class' => Project::class,
                'choice_label' => function(Project $project) {
                    return "{$project->getName()} {$project->getDescription()}";
                },
                'multiple' => true,
                'expanded' => false,
            ])
            ->add('teachers', EntityType::class, [
                'class' => Teacher::class,
                'choice_label' => function(Teacher $teacher) {
                    return "{$teacher->getFirstname()} {$teacher->getFirstname()}";
                },
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tag::class,
        ]);
    }
}
