<?php

namespace Cordpuller\interactions;

use Cordpuller\libs\fieldmaps\InteractionTypes;
use Cordpuller\types\Base;

class Interaction extends Base {

    protected string $token;
    protected string $interaction_type;
    protected string $guild_id;
    protected string $channel_id;

    public static function Build($json): ApplicationCommandAutocomplete|MessageComponent|ModalSubmit|ApplicationCommandInteraction|Interaction
    {
        $type = $json['type'];
        $interaction_data = $json['data'];
        switch($type){
            case InteractionTypes::PING:
            default:
                $x = new Interaction();
                break;
            case InteractionTypes::APPLICATION_COMMAND:
                $x = new ApplicationCommandInteraction();
                break;
            case InteractionTypes::MESSAGE_COMPONENT:
                $x = new MessageComponent();
                break;
            case InteractionTypes::APPLICATION_COMMAND_AUTOCOMPLETE:
                $x = new ApplicationCommandAutocomplete();
                break;
            case InteractionTypes::MODAL_SUBMIT:
                $x = new ModalSubmit();
                break;
        }

        $x->setInteractionType($type);
        return $x;

    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getInteractionType(): string
    {
        return $this->interaction_type;
    }

    /**
     * @param string $type
     */
    public function setInteractionType(string $type): void
    {
        $this->interaction_type = $type;
    }



}