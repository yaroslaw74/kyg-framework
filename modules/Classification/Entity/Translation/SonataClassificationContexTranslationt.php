<?php

/**
 * KYG Framework for Business.
 *
 * @category   Entity
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Classification\Entity\Translation;

use App\Modules\Classification\Entity\SonataClassificationContext;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

#[ORM\Table(name: 'classification__context_translationt')]
#[ORM\Index(name: 'classification__context_translationt_idx', columns: ['locale', 'object_id', 'field'])]
#[ORM\Entity(repositoryClass: TranslationRepository::class)]
class SonataClassificationContexTranslationt extends AbstractPersonalTranslation
{
    #[ORM\ManyToOne(targetEntity: SonataClassificationContext::class, inversedBy: 'translations')]
    #[ORM\JoinColumn(name: 'object_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected $object;

    /**
     * Convenient constructor.
     *
     * @param string $locale
     * @param string $field
     * @param string $value
     */
    public function __construct($locale, $field, $value)
    {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($value);
    }
}
