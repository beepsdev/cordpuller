<?php

namespace Cordpuller\Structs;


use Cordpuller\Builders\Bitfields\UserPublicFlags;
use Cordpuller\Discord;
use Cordpuller\Helpers\BaseStruct;
use Cordpuller\Helpers\Snowflake;
use Cordpuller\Helpers\UtilMethods;
use Cordpuller\Helpers\DiscordMedia;

Class User Extends BaseStruct {

    const ENDPOINT = 'users';

    protected string $username = '';
    protected string $discriminator = '0000';
    protected ?string $avatar = null;
    protected bool $bot = false;
    protected bool $system = false;
    protected bool $mfa_enabled = false;
    protected ?string $banner = null;
    protected ?string $banner_color = null;
    protected ?string $accent_color = null;
    protected string $locale = 'en-US';
    protected bool $verified = false;
    protected ?string $email = null;
    protected UserPublicFlags $public_flags;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(Snowflake|string $id): static{
        $discord = Discord::getInstance();
        $response = $discord->ApiRequest('GET', 'users/' . $id);
        return static::build($response);
    }

    protected static function build(array $data): static
    {

        $instance = new static();
        $keys = array_keys($data);

        foreach($keys as $key){
            $value = $data[$key];

            $setter_name = UtilMethods::dashToCamel($key);
            $setter_name = "Set$setter_name";
            if(method_exists($instance, $setter_name)){
                $instance->{$setter_name}($value);
            }else{
                $instance->{$key} = $data[$key];
            }

        }

        return $instance;

    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getDiscriminator(): string
    {
        return $this->discriminator;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @return string|null
     */
    public function getAvatarURL(string $format = DiscordMedia::DEFAULT_FORMAT, int $size = DiscordMedia::DEFAULT_SIZE): ?string
    {
        return DiscordMedia::UserAvatar($this->getAvatar(), $this->getId(), $format, $size);
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->bot;
    }

    /**
     * @return bool
     */
    public function isSystem(): bool
    {
        return $this->system;
    }

    /**
     * @return bool
     */
    public function isMfaEnabled(): bool
    {
        return $this->mfa_enabled;
    }

    /**
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->banner;
    }

    /**
     * @return string|null
     */
    public function getBannerURL(string $format = DiscordMedia::DEFAULT_FORMAT, int $size = DiscordMedia::DEFAULT_SIZE): ?string
    {
        return DiscordMedia::UserBanner($this->getBanner(), $this->getId(), $format, $size);
    }

    /**
     * @return string|null
     */
    public function getBannerColor(): ?string
    {
        return $this->banner_color;
    }

    /**
     * @return string|null
     */
    public function getAccentColor(): ?string
    {
        return $this->accent_color;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return UserPublicFlags
     */
    public function getPublicFlags(): UserPublicFlags
    {
        return $this->public_flags;
    }

    protected function setPublicFlags(int|UserPublicFlags $flags) {
        $this->public_flags = new UserPublicFlags($flags);
    }

    public function __toString(): string{
        return "<@" . $this->getId() . ">";
    }


}