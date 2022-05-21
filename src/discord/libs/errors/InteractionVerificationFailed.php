<?php

namespace Cordpuller\libs\errors;

class InteractionVerificationFailed extends DiscordException {

    const HTTP_MESSAGE = "Interaction verification Failed";
    const HTTP_CODE = "401";

}