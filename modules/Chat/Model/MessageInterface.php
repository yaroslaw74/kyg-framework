<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model Interface
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\Model;

use App\Modules\Chat\Entity\Thread;
use App\Modules\Users\Entity\User;

interface MessageInterface extends ReadableInterface
{
    public function getId(): ?int;

    public function getThread(): ?Thread;

    public function setThread(?Thread $thread): static;

    public function getBody(): ?string;

    public function setBody(string $body): static;

    public function getSender(): ?User;

    public function setSender(?User $sender): static;
}
