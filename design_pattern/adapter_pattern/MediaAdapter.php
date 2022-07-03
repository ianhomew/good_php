<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/12/16
 * Time: 下午 05:14
 */



class MediaAdapter implements MediaPlayerInterface
{
    /** @var OtherMediaInterface $otherMedia */
    private $otherMedia;
    /** @var string $type */
    private $type;

    public function __construct( string $mediaType )
    {
        $this->type = strtoupper($mediaType);
    }


    public function play()
    {
        if (Mp4Player::TYPE === $this->type) {
            $this->otherMedia = new Mp4Player();
            $this->otherMedia->playMp4();
        } elseif (MovPlayer::TYPE === $this->type) {
            $this->otherMedia = new MovPlayer();
            $this->otherMedia->playMov();
        } elseif ($this->type === 'MP3') {
            $mp3Player = new Mp3Player();
            $mp3Player->play();
        } else {
            echo "只支援 mp3, mp4, mov  ({$this->type})";
        }
    }
}
