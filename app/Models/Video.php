<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';
    protected $primaryKey = 'id_video'; 
    protected $fillable = ['id_album', 'tautan_video']; 

    // Relasi dengan model Album
    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
    }

    // Method untuk mendapatkan tautan video dalam format embed
    public function getEmbedLinkAttribute()
    {
        // Mengambil ID video dari tautan YouTube
        $videoId = $this->getYouTubeVideoId($this->tautan_video);

        // Membangun kembali tautan dalam format embed
        return "https://www.youtube.com/embed/{$videoId}";
    }

    // Method untuk mengambil ID video dari tautan YouTube
    private function getYouTubeVideoId($url)
    {
        // Pattern untuk mencocokkan ID video YouTube
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        preg_match($pattern, $url, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }
}
