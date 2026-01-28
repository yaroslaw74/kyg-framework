<?php

/**
 * KYG Framework for Business.
 *
 * @category   Admin
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Classification\Admin;

use App\Modules\Classification\Entity\SonataClassificationCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\TranslationBundle\Enum\TranslationFilterMode;
use Sonata\TranslationBundle\Filter\TranslationFieldFilter;

/**
 * @extends AbstractAdmin<SonataClassificationCategory>
 */
final class CategoryAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('title', TranslationFieldFilter::class, [
                'filter_mode' => TranslationFilterMode::GEDMO,
            ]);
    }
}
