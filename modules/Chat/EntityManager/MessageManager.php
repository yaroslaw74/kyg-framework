<?php

/**
 * KYG Framework for Business.
 *
 * @category   Entity Manager
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\EntityManager;

use App\Modules\Chat\Entity\Message;
use App\Modules\Chat\Entity\MessageMetadata;
use App\Modules\Chat\Entity\Thread;
use App\Modules\Chat\ModelManager\MessageManager as BaseMessageManager;
use App\Modules\Chat\Repository\MessageRepository;
use App\Modules\Users\Entity\User;
use Doctrine\ORM\EntityManager;

class MessageManager extends BaseMessageManager
{
    public function __construct(
        protected EntityManager $entityManager,
        protected MessageRepository $repository,
    ) {
    }

    public function getNbUnreadMessageByParticipant(User $participant): int
    {
        $builder = $this->repository->createQueryBuilder('m');

        return (int) $builder
            ->select($builder->expr()->count('mm.id'))

            ->innerJoin('m.metadata', 'mm')
            ->innerJoin('mm.participant', 'p')

            ->where('p.id = :participant_id')
            ->setParameter('participant_id', $participant->getId())

            ->andWhere('m.sender != :sender')
            ->setParameter('sender', $participant->getId())

            ->andWhere('mm.isRead = :isRead')
            ->setParameter('isRead', false, \PDO::PARAM_BOOL)

            ->getQuery()
            ->getSingleScalarResult();
    }

    public function markAsReadByParticipant(Thread|Message $readable, User $participant): void
    {
        $readable->setIsReadByParticipant($participant, true);
    }

    public function markAsUnreadByParticipant(Thread|Message $readable, User $participant): void
    {
        $readable->setIsReadByParticipant($participant, false);
    }

    public function markIsReadByThreadAndParticipant(Thread $thread, User $participant, bool $isRead): void
    {
        foreach ($thread->getMessages() as $message) {
            $this->markIsReadByParticipant($message, $participant, $isRead);
        }
    }

    protected function markIsReadByParticipant(Message $message, User $participant, bool $isRead): void
    {
        $meta = $message->getMetadataForParticipant($participant);
        if (!$meta || $meta->getIsRead() == $isRead) {
            return;
        }

        $this->entityManager->createQueryBuilder()
            ->update(MessageMetadata::class, 'm')
            ->set('m.isRead', '?1')
            ->setParameter('1', $isRead, \PDO::PARAM_BOOL)

            ->where('m.id = :id')
            ->setParameter('id', $meta->getId())

            ->getQuery()
            ->execute();
    }

    public function saveMessage(Message $message, bool $andFlush = true): void
    {
        $this->denormalize($message);
        $this->entityManager->persist($message);
        if ($andFlush) {
            $this->entityManager->flush();
        }
    }

    /*
     * DENORMALIZATION
     *
     * All following methods are relative to denormalization
     */

    /**
     * Performs denormalization tricks.
     */
    protected function denormalize(Message $message): void
    {
        $this->doMetadata($message);
    }

    /**
     * Ensures that the message metadata are up to date.
     */
    protected function doMetadata(Message $message): void
    {
        foreach ($message->getThread()->getAllMetadata() as $threadMeta) {
            $meta = $message->getMetadataForParticipant($threadMeta->getParticipant());
            if (!$meta) {
                $meta = $this->createMessageMetadata();
                $meta->setParticipant($threadMeta->getParticipant());

                $message->addMetadata($meta);
            }
        }
    }

    protected function createMessageMetadata(): MessageMetadata
    {
        return new MessageMetadata();
    }
}
