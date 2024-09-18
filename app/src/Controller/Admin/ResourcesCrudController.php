<?php

namespace App\Controller\Admin;

use App\Entity\Resources;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ResourcesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Resources::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Ressources Éducatives')
            ->setPageTitle('index', 'Gestion des Ressources Éducatives');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->hideonform(),
            TextField::new('title', 'Titre')->setRequired(true),
            TextField::new('type', 'Type')->setRequired(true),
            TextareaField::new('description', 'Description')->setRequired(true),
            DateTimeField::new('publication_date', 'Date de publication')->setRequired(true),
            TextField::new('image', 'Url de l\'image'),
            TextField::new('other_content', 'Url du contenu'),
        ];
    }
}
