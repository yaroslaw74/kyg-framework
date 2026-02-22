<?php

/**
 * KYG Framework for Business.
 *
 * @category   Menu Builder
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Menu;

use Knp\Menu\Attribute\AsMenuBuilder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    public function __construct(private FactoryInterface $factory)
    {
    }
    #[AsMenuBuilder('app_sidebar_menu')]
    public function createMainMenu(): ItemInterface
    {
        $menu = $this->factory->createItem('app_sidebar_menu');
        $menu->setChildrenAttribute('class', 'main-menu');

        $menu->addChild('home', [
            'label' => 'Home',
            'attributes' => [
                'class' => 'slide__category'
            ],
            'labelAttributes' => [
                'class' => 'category-name'
            ]
        ]);
        $menu->addChild('dashboard', [
            'route' => 'app_home',
            'label' => 'Dashboard',
            'attributes' => [
                'class' => 'slide'
            ],
            'labelAttributes' => [
                'class' => 'side-menu__label'
            ],
            'linkAttributes' => [
                'class' => 'side-menu__item'
            ],
            'extras' => [
                'icon' => 'ic:twotone-dashboard'
            ]
        ]);

        return $menu;
    }
}
