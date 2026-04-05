<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model Manager Interface
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\ModelManager;

use App\Modules\Chat\Entity\Thread;
use App\Modules\Chat\Model\ThreadInterface;
use App\Modules\Users\Entity\User;
use Doctrine\ORM\QueryBuilder;

interface ThreadManagerInterface extends ReadableManagerInterface
{
    public function findThreadById(int $id): ?Thread;

    /**
     * Finds not deleted threads for a participant,
     * containing at least one message not written by this participant,
     * ordered by last message not written by this participant in reverse order.
     * In one word: an inbox.
     */
    public function getParticipantInboxThreadsQueryBuilder(User $participant): QueryBuilder;

    /**
     * Finds not deleted threads for a participant,
     * containing at least one message not written by this participant,
     * ordered by last message not written by this participant in reverse order.
     * In one word: an inbox.
     */
    public function findParticipantInboxThreads(User $participant): QueryBuilder;

    /**
     * Finds not deleted threads from a participant,
     * containing at least one message written by this participant,
     * ordered by last message written by this participant in reverse order.
     * In one word: an sentbox.
     */
    public function getParticipantSentThreadsQueryBuilder(User $participant): QueryBuilder;

    /**
     * Finds not deleted threads from a participant,
     * containing at least one message written by this participant,
     * ordered by last message written by this participant in reverse order.
     * In one word: an sentbox.
     */
    public function findParticipantSentThreads(User $participant): QueryBuilder;

    /**
     * Finds deleted threads from a participant,
     * ordered by last message date.
     */
    public function getParticipantDeletedThreadsQueryBuilder(User $participant): QueryBuilder;

    /**
     * Finds deleted threads from a participant,
     * ordered by last message date.
     *
     * @return ThreadInterface[]
     */
    public function findParticipantDeletedThreads(User $participant): array;

    /**
     * Finds not deleted threads for a participant,
     * matching the given search term
     * ordered by last message not written by this participant in reverse order.
     */
    public function getParticipantThreadsBySearchQueryBuilder(User $participant, string $search): QueryBuilder;

    /**
     * Finds not deleted threads for a participant,
     * matching the given search term
     * ordered by last message not written by this participant in reverse order.
     *
     * @return ThreadInterface[]
     */
    public function findParticipantThreadsBySearch(User $participant, string $search): array;

    /**
     * Gets threads created by a participant.
     *
     * @return ThreadInterface[]
     */
    public function findThreadsCreatedBy(User $participant): array;

    public function createThread(): Thread;

    public function saveThread(Thread $thread, bool $andFlush = true): void;

    public function deleteThread(Thread $thread): void;
}
