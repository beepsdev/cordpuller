<?php

namespace Cordpuller_old\types;

use Cordpuller_old\libs\DiscordMedia;
use Cordpuller_old\libs\flags\UserFlags;

Class User Extends Base {

    static $ENDPOINT = 'users';
    static $CACHE_KEY = 'users';

    protected string $username = '';
    protected int $discriminator = 0000;
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
    protected UserFlags $flags;

    public function __construct()
    {
        $this->flags = new UserFlags();
        parent::__construct();
    }

    /**
     * @return null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getDiscriminator(): int
    {
        return $this->discriminator;
    }

    /**
     * @param int $discriminator
     */
    public function setDiscriminator(int $discriminator): void
    {
        $this->discriminator = $discriminator;
    }

    /**
     * @return null
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return null
     */
    public function getAvatarURL(string $format = DiscordMedia::DEFAULT_FORMAT, int $size = DiscordMedia::DEFAULT_SIZE): ?string
    {
        return DiscordMedia::UserAvatar($this->getAvatar(), $this->getId(), $format, $size);
    }

    /**
     * @param null $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->bot;
    }

    /**
     * @param bool $bot
     */
    public function setBot(bool $bot): void
    {
        $this->bot = $bot;
    }

    /**
     * @return bool
     */
    public function isSystem(): bool
    {
        return $this->system;
    }

    /**
     * @param bool $system
     */
    public function setSystem(bool $system): void
    {
        $this->system = $system;
    }

    /**
     * @return bool
     */
    public function isMfaEnabled(): bool
    {
        return $this->mfa_enabled;
    }

    /**
     * @param bool $mfa_enabled
     */
    public function setMfaEnabled(bool $mfa_enabled): void
    {
        $this->mfa_enabled = $mfa_enabled;
    }

    /**
     * @return null
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param null $banner
     */
    public function setBanner($banner): void
    {
        $this->banner = $banner;
    }

    /**
     * @return null
     */
    public function getBannerColor()
    {
        return $this->banner_color;
    }

    /**
     * @param null $banner_color
     */
    public function setBannerColor($banner_color): void
    {
        $this->banner_color = $banner_color;
    }

    /**
     * @return null
     */
    public function getAccentColor()
    {
        return $this->accent_color;
    }

    /**
     * @param null $accent_color
     */
    public function setAccentColor($accent_color): void
    {
        $this->accent_color = $accent_color;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->verified;
    }

    /**
     * @param bool $verified
     */
    public function setVerified(bool $verified): void
    {
        $this->verified = $verified;
    }

    /**
     * @return null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return UserFlags
     */
    public function getFlags(): UserFlags
    {
        return $this->flags;
    }

    /**
     * @param null $flags
     */
    public function setFlags($flags): static
    {
        $this->flags = new UserFlags($flags);
        return $this;
    }




}