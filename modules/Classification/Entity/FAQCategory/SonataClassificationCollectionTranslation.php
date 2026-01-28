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

namespace App\Modules\Classification\Entity\FAQCategory;

use App\Modules\Classification\Entity\SonataClassificationCollection;
use App\Modules\Classification\Repository\FAQCategory\SonataClassificationCollectionTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;

#[ORM\Entity(repositoryClass: SonataClassificationCollectionTranslationRepository::class)]
#[ORM\Table(name: 'classification__collection_translations')]
class SonataClassificationCollectionTranslation extends AbstractPersonalTranslation
{
    #[ORM\ManyToOne(targetEntity: SonataClassificationCollection::class, inversedBy: 'translations')]
    #[ORM\JoinColumn(name: 'object_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    protected ?SonataClassificationCollection $objects = null;

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

    public function __serialize(): array
    {
        $data = (array) $this;

        return $data;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->id,
            $this->locale,
            $this->field,
            $this->object,
            $this->content,
        ] = $data;
    }
}
