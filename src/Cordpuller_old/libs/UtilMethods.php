<?php

namespace Cordpuller_old\libs;

class UtilMethods {

    public static function dashToCamel(string $input): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $input)));
    }

    #[\ReturnTypeWillChange]
    public static function verifyKey($rawBody, $signature, $timestamp, $client_public_key): bool {

        $ec = new \Elliptic\EdDSA('ed25519');
        $key = $ec->keyFromPublic($client_public_key);

        $message = array_merge(unpack('C*', $timestamp), unpack('C*', $rawBody));
        return $key->verify($message, $signature) == TRUE;
        return true;
    }
}