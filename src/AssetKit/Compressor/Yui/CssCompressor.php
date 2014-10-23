<?php
namespace AssetKit\Compressor\Yui;
use AssetKit\Process;
use AssetKit\Collection;

class CssCompressor
{
    public $jar;
    public $java;
    public $charset;

    public function __construct($jar = NULL,$java = '/usr/bin/java')
    {
        if (!$jar) {
            $jar = getenv('YUI_COMPRESSOR_BIN');
        }
        if (!$jar) {
            throw new Exception('YUI Compressor jar path is required.');
        }
        $this->jar = $jar;
        $this->java = $java;
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    public function compress(Collection $collection)
    { 
        $input = $collection->getContent();

        $proc = new Process( array( $this->java, '-jar', $this->jar ));
        $code = $proc->arg('--type')->arg('css')->input($input)->run();
        $content = $proc->getOutput();
        $collection->setContent($content);
    }
}

