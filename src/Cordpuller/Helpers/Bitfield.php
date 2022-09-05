<?php

namespace Cordpuller\Helpers;

use Exception;

class Bitfield {

    static $DEFAULT_BIT = 0;
    static $FLAGS = array();

    private $bitfield = 0;

    public function __construct($raw_data = 0) {
        $this->bitfield = $this->resolveBits($raw_data);
    }

    /**
     * Normalizes inputs
     */
    static function resolveBits(int|string|null $bit): int {

        if(!isset($bit)){
            return static::$DEFAULT_BIT;
        }

        if(gettype($bit) === gettype(static::$DEFAULT_BIT) && $bit >= static::$DEFAULT_BIT){
            return $bit;
        }

        if(is_string($bit) && isset(static::$FLAGS[$bit])){
            return static::$FLAGS[$bit];
        }

        throw new Exception('Unable to resolve Bitfield');

    }

    /**
     * @throws Exception
     */
    public function set(...$bits): static{
        $total = static::$DEFAULT_BIT;
        foreach($bits as $bit){
            $total |= static::resolveBits($bit);
        }
        $this->bitfield |= $total;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function unset(...$bits): static{
        $total = static::$DEFAULT_BIT;
        foreach($bits as $bit){
            $total |= static::resolveBits($bit);
        }
        $this->bitfield &= ~$total;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function has(int|string|null $bit): bool{
        $bit = self::resolveBits($bit);
        return ($this->bitfield & $bit) === $bit;
    }

    public function __toString(): string{
        return (string)$this->bitfield;
    }

    /**
     * Returns a set of $FLAGS with their bits set.
     * @return array
     * @throws Exception
     */
    public function toArray(): array {

        $flags = array_keys(static::$FLAGS);
        $setFlags = array();

        foreach($flags as $flag){
            if( $this->has($flag)){
                $setFlags[] = $flag;
            }
        }

        return $setFlags;
    }

    /**
     * Returns the value of this bitfield.
     * @return int
     */
    public function value(): int {
        return $this->bitfield;
    }

}