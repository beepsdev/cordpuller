<?php

namespace Cordpuller\libs;

use Cordpuller\types\Base;
use Exception;

class Cache {

    private array $data = array();

    /**
     * @throws Exception
     */
    public function add(string $id, mixed $data): static
    {

        $this->data[$id] = unserialize(serialize($data));
        if(method_exists($this->data[$id], 'setCached')){
            $this->data[$id]->setCached();
        }

        return $this;

    }

    /**
     * @throws Exception
     */
    public function has(string $id): bool
    {
        return array_key_exists($id, $this->data);
    }

    /**
     * @throws Exception
     */
    public function get(string $id): mixed
    {
        if($this->has($id)){
            return $this->data[$id];
        }else{
            throw new Exception('Object not found in Cache');
        }
    }

    /**
     * @throws Exception
     */
    public function remove(string $id): static
    {
        unset($this->data[$id]);
        return $this;
    }

}