<?php

namespace Helieting\Flysystem\Qcloud;

use League\Flysystem\Config;
use Qcloud_cos\Cosapi;
use League\Flysystem\Adapter\AbstractAdapter;

class QcloudAdapter extends AbstractAdapter
{
    protected $bucket;
    protected $config;

    protected $options = [];

    public function __construct($config) {
    	$this->config = $config;
        $this->bucket = $config['bucket'];
    }

    /**
     * Write a new file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function write($path, $contents,Config $config) {
    	$result = Cosapi::upload($contents, $this->bucket, '/'.$path);
    	return $this->checkSuccess($result);
    }
    /**
     * Write a new file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function writeStream($path, $resource, Config $config) {
     // TODO: Implement writeStream() method.
    }
    /**
     * Update a file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function update($path, $contents, Config $config) {
     // TODO: Implement update() method.
    }
    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function updateStream($path, $resource, Config $config) {
     // TODO: Implement updateStream() method.
    }
    /**
     * Rename a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function rename($path, $newpath) {
     // TODO: Implement rename() method.
    }
    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy($path, $newpath) {
     // TODO: Implement copy() method.
    }
    /**
     * Delete a file. * * @param string $path
     *
     * @return bool
     */
    public function delete($path) {
     
    	$result = Cosapi::del($this->bucket, $path);
    	return $this->checkSuccess($result);
    }
    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir($dirname) {
    	$result = Cosapi::delFolder($this->bucket, $dirname);
    	return $this->checkSuccess($result);	
    }


    protected function checkSuccess($result) {
    	if($result['httpcode'] == 200 && $result['code'] == 0) {
    		return true;  
    	}else {
	    	// \Log::info($result);
	    	return false;
    	}

    }
    /**
     * Create a directory.
     *
     * @param string $dirname directory name
     * @param Config $config
     *
     * @return array|false
     */
    public function createDir($dirname, Config $config) {
    	$result = Cosapi::createFolder($this->bucket, $dirname,$bizAttr = null);
    	return $this->checkSuccess($result);
    }
    /**
     * Set the visibility for a file.
     *
     * @param string $path
     * @param string $visibility
     *
     * @return array|false file meta data
     */
    public function setVisibility($path, $visibility) {
     // TODO: Implement setVisibility() method.
    }
    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return array|bool|null
     */
    public function has($path) {
    	$result = Cosapi::stat($this->bucket, $path);
    	return $this->checkSuccess($result);
    }

    /**
     * Read a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function read($path) {
     // TODO: Implement read() method.
    }
    /**
     * Read a file as a stream.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function readStream($path) {
     // TODO: Implement readStream() method.
    }
    /**
     * List contents of a directory.
     *
     * @param string $directory
     * @param bool   $recursive
     *
     * @return array
     */
    public function listContents($directory = '', $recursive = false) {
     // TODO: Implement listContents() method.
    }
    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMetadata($path) {
    	return Cosapi::stat($this->bucket, $path);	
    }
    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getSize($path) {
     // TODO: Implement getSize() method.
    }
    /**
     * Get the mimetype of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMimetype($path) {
     // TODO: Implement getMimetype() method.
    }
    /**
     * Get the timestamp of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getTimestamp($path) {
     // TODO: Implement getTimestamp() method.
    }
    /**
     * Get the visibility of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getVisibility($path) {
     // TODO: Implement getVisibility() method.
    }




 }