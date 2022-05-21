<?php

namespace Cordpuller\libs;

use Cordpuller\libs\fieldmaps\StickerFormats;

/**
 * @link https://discord.com/developers/docs/reference#image-formatting
 */
class DiscordMedia {

    public static $DISCORD_BASE_IMAGE_URL = "https://cdn.discordapp.com";
    public const DEFAULT_FORMAT = 'DEFAULT';
    public const DEFAULT_SIZE = 512;

    public static function Emoji(string $hash, ?string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/emojis/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function GuildIcon(string $hash, string $guild_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/icons/' . $guild_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function GuildSplash(string $hash, string $guild_id, string $format, int $size): string
    {
        return static::$DISCORD_BASE_IMAGE_URL . '/splashes/' . $guild_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function GuildDiscoverySplash(string $hash, string $guild_id, string $format, int $size): string
    {
        return static::$DISCORD_BASE_IMAGE_URL . '/discovery-splashes/' . $guild_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function GuildBanner(string $hash, string $guild_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/banners/' . $guild_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function UserBanner(string $hash, string $user_id, string $format, int $size): string
    {
        return static::GuildBanner($hash, $user_id, $format, $size);
    }

    public static function UserAvatar(string $hash, string $user_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/avatars/' . $user_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function GuildMemberAvatar(string $hash, string $user_id, string $guild_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/guilds/' . $guild_id . '/users/' . $user_id . '/avatars/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function ApplicationIcon(string $hash, string $application_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/app-icons/' . $application_id . '/' .$hash . '.' . $format . '?size=' . $size;
    }

    public static function ApplicationCoverImage(string $hash, string $application_id, string $format, int $size): string
    {
        return static::ApplicationIcon($hash, $application_id, $format, $size);
    }

    public static function ApplicationAsset(string $hash, string $application_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/app-assets/' . $application_id . '/' .$hash . '.' . $format . '?size=' . $size;
    }

    public static function AchievementIcon(string $hash, string $application_id, string $achievement_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/app-assets/' . $application_id . '/achievements/' . $achievement_id . '/icons/' .$hash . '.' . $format . '?size=' . $size;
    }

    public static function StickerPackBanner(string $hash, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/app-assets/710982414301790216/store/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function TeamIcon(string $hash, string $team_id, string $format, int $size): string
    {
        if($format == static::DEFAULT_FORMAT){
            $format = (str_starts_with($hash, 'a_') ? 'gif' : 'png');
        }
        return static::$DISCORD_BASE_IMAGE_URL . '/team-icons/' . $team_id . '/' . $hash . '.' . $format . '?size=' . $size;
    }

    public static function Sticker(string $hash, string $format_type, int $size): string
    {
        switch($format_type){
            case StickerFormats::PNG:
            case StickerFormats::APNG:
            default:
                return static::$DISCORD_BASE_IMAGE_URL . '/stickers/' . $hash . '.png' . '?size=' . $size;
            case StickerFormats::LOTTIE:
                return static::$DISCORD_BASE_IMAGE_URL . '/stickers/' . $hash . '.json' . '?size=' . $size;
        }
    }

}