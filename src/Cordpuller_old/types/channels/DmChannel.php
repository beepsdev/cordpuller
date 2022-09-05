<?php

namespace Cordpuller_old\types\channels;

use Cordpuller_old\types\User;

class DmChannel extends Channel {

    protected ?User $recipient;
    protected string $recipient_id;

    /**
     * @return User
     */
    public function getRecipient(): User
    {
        if($this->recipient instanceof User){
            return $this->recipient;
        }else{
            $this->setRecipient(static::$client->getUser($this->getRecipientId()));
            return $this->guild;
        }
    }

    /**
     * @param User $recipient
     */
    public function setRecipient(User|int $recipient): void
    {
        if($recipient instanceof User){
            $this->recipient = $recipient;
            $this->setRecipientId($recipient->getId());
        }else{
            $this->setRecipientId($recipient);
        }
    }

    /**
     * @return string
     */
    public function getRecipientId(): string
    {
        return $this->recipient_id;
    }

    /**
     * @param string $recipient_id
     */
    public function setRecipientId(string $recipient_id): void
    {
        $this->recipient_id = $recipient_id;
    }



}