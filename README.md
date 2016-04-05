# flysystem-tencentyun-cos


```
use Qcloud_cos\Cosapi;
use Helieting\Flysystem\Qcloud\QcloudAdapter;
use League\Flysystem\Filesystem;

require "vendor/autoload.php";

$config = [
	'bucket' => 'testbucket',
];

$storage = new Filesystem(new QcloudAdapter($config));

$storage->getMetadata('xxx.png');
```

