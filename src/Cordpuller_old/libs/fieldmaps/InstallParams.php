<?php

namespace Cordpuller_old\libs\fieldmaps;

use Cordpuller_old\libs\flags\Permissions;

class InstallParams
{

    protected array $scopes;
    protected string $permissions;

    /**
     * @param string[] $scopes
     * @param Permissions $permissions
     */
    public function __construct(array $scopes, Permissions $permissions)
    {
        $this->scopes = $scopes;
        $this->permissions = $permissions;
    }

}