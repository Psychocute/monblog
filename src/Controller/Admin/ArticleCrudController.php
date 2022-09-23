<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'titre');
        yield SlugField::new('slug', 'url')->setTargetFieldName('title');
        yield TextEditorField::new('content', 'contenu');
        yield TextField::new('featuredText');
        yield AssociationField::new('categories', 'catégorie(s)');
        yield AssociationField::new('featuredImage', 'image');
        yield DateTimeField::new('createdAt', 'créer le')->hideOnForm();
        yield DateTimeField::new('updatedAt', 'éditer le')->hideOnForm();
    }
    
}
