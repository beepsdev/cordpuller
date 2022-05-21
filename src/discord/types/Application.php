<?php

namespace Cordpuller\types;

use Cordpuller\libs\DiscordMedia;
use Cordpuller\libs\fieldmaps\InstallParams;
use Cordpuller\libs\flags\ApplicationFlags;
use Cordpuller\libs\flags\Permissions;

class Application extends Base {

    static $ENDPOINT = 'applications';

    protected string $name;
    protected ?string $icon;
    protected string $description;
    protected ?array $rpc_origins;
    protected bool $bot_public;
    protected bool $bot_require_code_grant;
    protected string $terms_of_service_url;
    protected string $privacy_policy_url;
    protected User $owner;
    protected string $owner_id;
    protected string $verify_key;
    protected ?Team $team;
    protected string $team_id;
    protected ?Guild $guild;
    protected ?string $guild_id;
    protected ?string $primary_sku_id;
    protected ?string $slug;
    protected ?string $cover_image;
    protected ApplicationFlags $flags;
    protected ?array $tags;
    protected ?InstallParams $install_params;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
     protected function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string|null
     */
    public function getIconURL(string $format = DiscordMedia::DEFAULT_FORMAT, int $size = DiscordMedia::DEFAULT_SIZE): ?string
    {
        return DiscordMedia::ApplicationIcon($this->getIcon(), $this->getId(), $format, $size);
    }

    /**
     * @param string|null $icon
     */
     protected function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
     protected function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array|null
     */
    public function getRpcOrigins(): ?array
    {
        return $this->rpc_origins;
    }

    /**
     * @param array|null $rpc_origins
     */
     protected function setRpcOrigins(?array $rpc_origins): void
    {
        $this->rpc_origins = $rpc_origins;
    }

    /**
     * @return bool
     */
    public function isBotPublic(): bool
    {
        return $this->bot_public;
    }

    /**
     * @param bool $bot_public
     */
     protected function setBotPublic(bool $bot_public): void
    {
        $this->bot_public = $bot_public;
    }

    /**
     * @return bool
     */
    public function isBotRequireCodeGrant(): bool
    {
        return $this->bot_require_code_grant;
    }

    /**
     * @param bool $bot_require_code_grant
     */
     protected function setBotRequireCodeGrant(bool $bot_require_code_grant): void
    {
        $this->bot_require_code_grant = $bot_require_code_grant;
    }

    /**
     * @return string
     */
    public function getTermsOfServiceUrl(): string
    {
        return $this->terms_of_service_url;
    }

    /**
     * @param string $terms_of_service_url
     */
     protected function setTermsOfServiceUrl(string $terms_of_service_url): void
    {
        $this->terms_of_service_url = $terms_of_service_url;
    }

    /**
     * @return string
     */
    public function getPrivacyPolicyUrl(): string
    {
        return $this->privacy_policy_url;
    }

    /**
     * @param string $privacy_policy_url
     */
     protected function setPrivacyPolicyUrl(string $privacy_policy_url): void
    {
        $this->privacy_policy_url = $privacy_policy_url;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
     protected function setOwner(array|User $owner): void
    {

        if($owner instanceof User){
            $this->owner = $owner;
        }else{
            $this->owner = static::$client->getUser($owner['id']);
        }

    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->owner_id;
    }

    /**
     * @param string $owner_id
     */
     protected function setOwnerId(string $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return string
     */
    public function getVerifyKey(): string
    {
        return $this->verify_key;
    }

    /**
     * @param string $verify_key
     */
     protected function setVerifyKey(string $verify_key): void
    {
        $this->verify_key = $verify_key;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
     protected function setTeam(Team|null $team): void
    {
        $this->team = $team;
    }

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->team_id;
    }

    /**
     * @param string $team_id
     */
     protected function setTeamId(string $team_id): void
    {
        $this->team_id = $team_id;
    }

    /**
     * @return Guild|null
     */
    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    /**
     * @param Guild|null $guild
     */
     protected function setGuild(?Guild $guild): void
    {
        $this->guild = $guild;
    }

    /**
     * @return string|null
     */
    public function getGuildId(): ?string
    {
        return $this->guild_id;
    }

    /**
     * @param string|null $guild_id
     */
     protected function setGuildId(?string $guild_id): void
    {
        $this->guild_id = $guild_id;
    }

    /**
     * @return string|null
     */
    public function getPrimarySkuId(): ?string
    {
        return $this->primary_sku_id;
    }

    /**
     * @param string|null $primary_sku_id
     */
     protected function setPrimarySkuId(?string $primary_sku_id): void
    {
        $this->primary_sku_id = $primary_sku_id;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
     protected function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string|null
     */
    public function getCoverImage(): ?string
    {
        return $this->cover_image;
    }

    /**
     * @param string|null $cover_image
     */
     protected function setCoverImage(?string $cover_image): void
    {
        $this->cover_image = $cover_image;
    }

    /**
     * @return \Cordpuller\libs\flags\ApplicationFlags
     */
    public function getFlags(): ApplicationFlags
    {
        return $this->flags;
    }

    /**
     * @param ApplicationFlags|int $flags
     */
     protected function setFlags(ApplicationFlags|int $flags): void
    {
        if($flags instanceof ApplicationFlags){
            $this->flags = $flags;
        }else{
            $this->flags = new ApplicationFlags($flags);
        }
    }

    /**
     * @return array|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @param array|null $tags
     */
     protected function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return InstallParams|null
     */
    public function getInstallParams(): ?InstallParams
    {
        return $this->install_params;
    }

    /**
     * @param array|InstallParams|null $install_params
     */
     protected function setInstallParams(array|InstallParams|null $install_params): void
    {
        if($install_params == null){
            $this->install_params = null;
        }else{
            if($install_params instanceof InstallParams){
                $this->install_params = $install_params;
            }else{
                $this->install_params = new InstallParams($install_params['scopes'], new Permissions($install_params['permissions']));
            }
        }

    }




}