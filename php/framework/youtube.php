<?php
namespace framework;



class youtube{

    

    public function getPart($id, $part){
        $params = array(
            'part' => $part,
            'id' => $id,
            'key' => YOUTUBE_API_KEY,
        );

        $api_url = YOUTUBE_API_BASE . '?' . http_build_query($params);
        $result = json_decode(@file_get_contents($api_url), true);

        return $result;
    }

    public function snippet($id){
        $snippet = $this->getPart($id, 'snippet');

        $this->channelTitle = $snippet['items'][0]['snippet']['channelTitle'];
        $this->channelId = $snippet['items'][0]['snippet']['channelId'];
        
        $this->videoTitle = $snippet['items'][0]['snippet']['title'];
        $this->videoPublishedAt = $snippet['items'][0]['snippet']['publishedAt'];
        $this->videoCategoryId = $snippet['items'][0]['snippet']['categoryId'];
        $this->videoDescription = $snippet['items'][0]['snippet']['description'];
        $this->videoTags = $snippet['items'][0]['snippet']['tags'];

        $this->videovideoThumbnailDefaultUrl = $snippet['items'][0]['snippet']['thumbnails']['default']['url'];
        $this->videovideoThumbnailDefaultWidth = $snippet['items'][0]['snippet']['thumbnails']['default']['width'];
        $this->videovideoThumbnailDefaultHeight = $snippet['items'][0]['snippet']['thumbnails']['default']['height'];

        $this->videoThumbnailMediumUrl = $snippet['items'][0]['snippet']['thumbnails']['medium']['url'];
        $this->videoThumbnailMediumWidth = $snippet['items'][0]['snippet']['thumbnails']['medium']['width'];
        $this->videoThumbnailMediumHeight = $snippet['items'][0]['snippet']['thumbnails']['medium']['height'];

        $this->videoThumbnailHighUrl = $snippet['items'][0]['snippet']['thumbnails']['high']['url'];
        $this->videoThumbnailHighWidth = $snippet['items'][0]['snippet']['thumbnails']['high']['width'];
        $this->videoThumbnailHighHeight = $snippet['items'][0]['snippet']['thumbnails']['high']['height'];

        $this->videoThumbnailMaxResUrl = $snippet['items'][0]['snippet']['thumbnails']['maxres']['url'];
        $this->videoThumbnailMaxResWidth = $snippet['items'][0]['snippet']['thumbnails']['maxres']['width'];
        $this->videoThumbnailMaxResHeight = $snippet['items'][0]['snippet']['thumbnails']['maxres']['height'];

        //echo '<pre>';
        //var_dump($snippet['items'][0]['snippet']);
        //echo '</pre>';
    }
}
?>