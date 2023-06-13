<?php
namespace Bot\Titan\Model;

use Bot\Titan\Utils\Extract;

class File
{

    private $url;

    private $filename;

    private $file;
    
    private $put_url;
    
    private $id;
    
    public function __construct($url)
    {
        $this->url = $url;
        $this->saveFile();
    }
    
    /**
     * @return mixed
     */
    public function getPut_url()
    {
        return $this->put_url;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $put_url
     */
    public function setPut_url($put_url)
    {
        $this->put_url = $put_url;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     * @return mixed
     */
    public function getFilename()
    {
        $url_array = explode("/", $this->url);
        return $this->filename = $url_array[count($url_array) - 1];
    }

    /**
     *
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     *
     * @return mixed
     */
    public function getContent_type()
    {
        return Extract::content_type($this->getFilename());
    }

    /**
     *
     * @return mixed
     */
    public function getContents()
    {
        return fopen($this->file, 'rb');
    }

    /**
     *
     * @return mixed
     */
    public function getSize()
    {
        return filesize($this->file);
    }

    public function saveFile()
    {
        $config = include (__DIR__ . '/../../config/config.php');

        $this->file = $config->temp_folder . DIRECTORY_SEPARATOR . $this->getFilename();
        
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $response = file_get_contents($this->url, false, stream_context_create($arrContextOptions));

        file_put_contents($this->file, $response);
        if (! file_exists($this->file)) {
            die('File: ' . $this->file . ' does not save');
        }
    }
}

