<?php
use AssetKit\AssetCollection;
class AssetCollectionTest extends AssetKit\TestCase
{
    public function testAssetCollectionConstructor()
    {
        $config = $this->getConfig();
        $loader = $this->getLoader();
        $assets = array();
        $assets[] = $loader->register("tests/assets/jquery");
        $assets[] = $loader->register("tests/assets/jquery-ui");
        $collection = new AssetKit\AssetCollection($assets);
        ok($collection);
    }

    public function testAssetCollectionAppend()
    {
        $config = $this->getConfig();
        $loader = $this->getLoader();
        $collection = new AssetKit\AssetCollection();
        ok($collection);

        $collection->add($loader->register("tests/assets/jquery"));
        $collection->add($loader->register("tests/assets/jquery-ui"));
    }
}
