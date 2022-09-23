<?php

namespace App\Twig;

use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    const ADMIN_NAMESPACE = 'App\Controller\Admin';

    public function __construct( private RouterInterface $router, private AdminUrlGenerator $adminUrlGenerator ) {

    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('menuLink', [$this, 'menuLink']),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('ea_gen_url', [$this, 'getAdminUrl'])
        ];
    }

    public function getAdminUrl(string $controller, ?string $action = null)
    {
        $adminUrlGenerator = $this->adminUrlGenerator
            ->setController(self::ADMIN_NAMESPACE . DIRECTORY_SEPARATOR . $controller);

            if ($action) {
                $adminUrlGenerator->setAction($action);
            }

            return $adminUrlGenerator->generateUrl();
    }

    public function menuLink(Menu $menu): string
    {
        $url = $menu->getLink() ?: '#';

        if ($url !== '#') {
            return $url;
        }

        $page = $menu->getPage();

        if ($page) {
            $name = 'page_show';
            $slug = $page->getSlug();
        }

        $article = $menu->getArticle();

        if ($article) {
            $name = 'article_show';
            $slug = $article->getSlug();
        } ;

        $category = $menu->getCategory();

        if ($category) {
            $name = 'category_show';
            $slug = $category->getSlug();
        }

        if (!isset($name, $slug)){
            return $url;
        }

        return $this->router->generate($name, [
            'slug' => $slug
        ]);
    }


}