<?php

namespace Cordpuller\Helpers;

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

    public static function log($message): void
    {
        $logfile = '../logs/app.log';
        if($logfile && ($fp = fopen($logfile, 'a+')) !== false) {
            fwrite($fp, '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL);
            fclose($fp);
        }
    }
}