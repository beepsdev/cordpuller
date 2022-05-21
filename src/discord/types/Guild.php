<?php

namespace Cordpuller\types;

use Cordpuller\libs\DiscordMedia;
use Cordpuller\libs\flags\Permissions;
use Cordpuller\libs\flags\SystemChannelFlags;

Class Guild Extends Base {

    static $ENDPOINT = 'guilds';

    protected string $name = '';
    protected ?string $icon = null;
    protected ?string $splash = null;
    protected ?string $discovery_splash = null;
    protected bool $owner = false;
    protected string $owner_id = '';
    protected ?Permissions $permissions = null;
    protected ?string $region = null;
    protected ?string $afk_channel_id = null;
    protected int $afk_timeout = 0;
    protected bool $widget_enabled = false;
    protected int $verification_level = 0;
    protected int $default_message_notifications = 0;
    protected int $explicit_content_filter = 0;
    protected array $roles = array();
    protected array $emoji = array();
    protected array $features = array();
    protected int $mfa_level = 0;
    protected ?string $application_id = null;
    protected ?string $system_channel_id = null;
    protected SystemChannelFlags $system_channel_flags;
    protected ?string $rules_channel_id = null;
    protected ?int $max_presences = null;
    protected int $max_members = 0;
    protected ?string $vanity_url_code = null;
    protected ?string $description = null;
    protected ?string $banner = null;
    protected int $premium_tier = 0;
    protected int $premium_subscription_count = 0;
    protected string $preferred_locale = '';
    protected ?string $public_updates_channel_id = null;
    protected int $max_video_channel_users = 0;
    protected ?int $approximate_member_count = null;
    protected ?int $approximate_presence_count = null;

    public function __construct()
    {
        $this->system_channel_flags = new SystemChannelFlags();
        parent::__construct();
    }

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
    public function setName(string $name): void
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
        return DiscordMedia::GuildIcon($this->getIcon(), $this->getId(), $format, $size);
    }

    /**
     * @param string|null $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return string|null
     */
    public function getSplash(): ?string
    {
        return $this->splash;
    }

    /**
     * @param string|null $splash
     */
    public function setSplash(?string $splash): void
    {
        $this->splash = $splash;
    }

    /**
     * @return string|null
     */
    public function getDiscoverySplash(): ?string
    {
        return $this->discovery_splash;
    }

    /**
     * @param string|null $discovery_splash
     */
    public function setDiscoverySplash(?string $discovery_splash): void
    {
        $this->discovery_splash = $discovery_splash;
    }

    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
    }

    /**
     * @param bool $owner
     */
    public function setOwner(bool $owner): void
    {
        $this->owner = $owner;
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
    public function setOwnerId(string $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return \Cordpuller\libs\flags\Permissions|null
     */
    public function getPermissions(): ?Permissions
    {
        return $this->permissions;
    }

    /**
     * @param \Cordpuller\libs\flags\Permissions|null $permissions
     */
    public function setPermissions(?Permissions $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string|null
     */
    public function getAfkChannelId(): ?string
    {
        return $this->afk_channel_id;
    }

    /**
     * @param string|null $afk_channel_id
     */
    public function setAfkChannelId(?string $afk_channel_id): void
    {
        $this->afk_channel_id = $afk_channel_id;
    }

    /**
     * @return int
     */
    public function getAfkTimeout(): int
    {
        return $this->afk_timeout;
    }

    /**
     * @param int $afk_timeout
     */
    public function setAfkTimeout(int $afk_timeout): void
    {
        $this->afk_timeout = $afk_timeout;
    }

    /**
     * @return bool
     */
    public function isWidgetEnabled(): bool
    {
        return $this->widget_enabled;
    }

    /**
     * @param bool $widget_enabled
     */
    public function setWidgetEnabled(bool $widget_enabled): void
    {
        $this->widget_enabled = $widget_enabled;
    }

    /**
     * @return int
     */
    public function getVerificationLevel(): int
    {
        return $this->verification_level;
    }

    /**
     * @param int $verification_level
     */
    public function setVerificationLevel(int $verification_level): void
    {
        $this->verification_level = $verification_level;
    }

    /**
     * @return int
     */
    public function getDefaultMessageNotifications(): int
    {
        return $this->default_message_notifications;
    }

    /**
     * @param int $default_message_notifications
     */
    public function setDefaultMessageNotifications(int $default_message_notifications): void
    {
        $this->default_message_notifications = $default_message_notifications;
    }

    /**
     * @return int
     */
    public function getExplicitContentFilter(): int
    {
        return $this->explicit_content_filter;
    }

    /**
     * @param int $explicit_content_filter
     */
    public function setExplicitContentFilter(int $explicit_content_filter): void
    {
        $this->explicit_content_filter = $explicit_content_filter;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getEmoji(): array
    {
        return $this->emoji;
    }

    /**
     * @param array $emoji
     */
    public function setEmoji(array $emoji): void
    {
        $this->emoji = $emoji;
    }

    /**
     * @return array
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param array $features
     */
    public function setFeatures(array $features): void
    {
        $this->features = $features;
    }

    /**
     * @return int
     */
    public function getMfaLevel(): int
    {
        return $this->mfa_level;
    }

    /**
     * @param int $mfa_level
     */
    public function setMfaLevel(int $mfa_level): void
    {
        $this->mfa_level = $mfa_level;
    }

    /**
     * @return string|null
     */
    public function getApplicationId(): ?string
    {
        return $this->application_id;
    }

    /**
     * @param string|null $application_id
     */
    public function setApplicationId(?string $application_id): void
    {
        $this->application_id = $application_id;
    }

    /**
     * @return string|null
     */
    public function getSystemChannelId(): ?string
    {
        return $this->system_channel_id;
    }

    /**
     * @param string|null $system_channel_id
     */
    public function setSystemChannelId(?string $system_channel_id): void
    {
        $this->system_channel_id = $system_channel_id;
    }

    /**
     * @return \Cordpuller\libs\flags\SystemChannelFlags
     */
    public function getSystemChannelFlags(): SystemChannelFlags
    {
        return $this->system_channel_flags;
    }

    /**
     * @param int $system_channel_flags
     */
    public function setSystemChannelFlags(int $system_channel_flags): void
    {
        $this->system_channel_flags = new SystemChannelFlags($system_channel_flags);
    }

    /**
     * @return string|null
     */
    public function getRulesChannelId(): ?string
    {
        return $this->rules_channel_id;
    }

    /**
     * @param string|null $rules_channel_id
     */
    public function setRulesChannelId(?string $rules_channel_id): void
    {
        $this->rules_channel_id = $rules_channel_id;
    }

    /**
     * @return int|null
     */
    public function getMaxPresences(): ?int
    {
        return $this->max_presences;
    }

    /**
     * @param int|null $max_presences
     */
    public function setMaxPresences(?int $max_presences): void
    {
        $this->max_presences = $max_presences;
    }

    /**
     * @return int
     */
    public function getMaxMembers(): int
    {
        return $this->max_members;
    }

    /**
     * @param int $max_members
     */
    public function setMaxMembers(int $max_members): void
    {
        $this->max_members = $max_members;
    }

    /**
     * @return string|null
     */
    public function getVanityUrlCode(): ?string
    {
        return $this->vanity_url_code;
    }

    /**
     * @param string|null $vanity_url_code
     */
    public function setVanityUrlCode(?string $vanity_url_code): void
    {
        $this->vanity_url_code = $vanity_url_code;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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
        return DiscordMedia::GuildBanner($this->getBanner(), $this->getId(), $format, $size);
    }

    /**
     * @param string|null $banner
     */
    public function setBanner(?string $banner): void
    {
        $this->banner = $banner;
    }

    /**
     * @return int
     */
    public function getPremiumTier(): int
    {
        return $this->premium_tier;
    }

    /**
     * @param int $premium_tier
     */
    public function setPremiumTier(int $premium_tier): void
    {
        $this->premium_tier = $premium_tier;
    }

    /**
     * @return int
     */
    public function getPremiumSubscriptionCount(): int
    {
        return $this->premium_subscription_count;
    }

    /**
     * @param int $premium_subscription_count
     */
    public function setPremiumSubscriptionCount(int $premium_subscription_count): void
    {
        $this->premium_subscription_count = $premium_subscription_count;
    }

    /**
     * @return string
     */
    public function getPreferredLocale(): string
    {
        return $this->preferred_locale;
    }

    /**
     * @param string $preferred_locale
     */
    public function setPreferredLocale(string $preferred_locale): void
    {
        $this->preferred_locale = $preferred_locale;
    }

    /**
     * @return string|null
     */
    public function getPublicUpdatesChannelId(): ?string
    {
        return $this->public_updates_channel_id;
    }

    /**
     * @param string|null $public_updates_channel_id
     */
    public function setPublicUpdatesChannelId(?string $public_updates_channel_id): void
    {
        $this->public_updates_channel_id = $public_updates_channel_id;
    }

    /**
     * @return int
     */
    public function getMaxVideoChannelUsers(): int
    {
        return $this->max_video_channel_users;
    }

    /**
     * @param int $max_video_channel_users
     */
    public function setMaxVideoChannelUsers(int $max_video_channel_users): void
    {
        $this->max_video_channel_users = $max_video_channel_users;
    }

    /**
     * @return int|null
     */
    public function getApproximateMemberCount(): ?int
    {
        return $this->approximate_member_count;
    }

    /**
     * @param int|null $approximate_member_count
     */
    public function setApproximateMemberCount(?int $approximate_member_count): void
    {
        $this->approximate_member_count = $approximate_member_count;
    }

    /**
     * @return int|null
     */
    public function getApproximatePresenceCount(): ?int
    {
        return $this->approximate_presence_count;
    }

    /**
     * @param int|null $approximate_presence_count
     */
    public function setApproximatePresenceCount(?int $approximate_presence_count): void
    {
        $this->approximate_presence_count = $approximate_presence_count;
    }

}