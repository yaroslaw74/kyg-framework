<?php

/**
 * KYG Framework for Business.
 *
 * @category Entity
 *
 * @version 1.0.0
 *
 * @copyright Copyright (c) Kataev Yaroslav
 * @license GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Media\Entity\Translation;

use App\Modules\Media\Entity\SonataMediaGallery;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;
use Gedmo\Translatable\Entity\Repository\TranslationRepository;

#[ORM\Table(name: 'media__gallery_Translation')]
#[ORM\Index(name: 'media__gallery_Translation_idx', columns: ['locale', 'object_id', 'field'])]
#[ORM\Entity(repositoryClass: TranslationRepository::class)]
class SonataMediaGalleryTranslation extends AbstractPersonalTranslation
{
    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, inversedBy: 'translations')]
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
