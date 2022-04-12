<?php

use Doctum\Doctum;
use Doctum\RemoteRepository\GitHubRemoteRepository;
use Doctum\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$dir = "/home/andrew/Development/creative-library/";

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('docs')
    ->exclude('vendor')
    ->exclude('tests')
    ->exclude("public")
    ->exclude("storage")
    ->in($dir);

// generate documentation for all v2.0.* tags, the 2.0 branch, and the main one
$versions = GitVersionCollection::create($dir)
    // In a non case-sensitive way, tags containing "PR", "RC", "BETA" and "ALPHA" will be filtered out
    // To change this, use: `$versions->setFilter(static function (string $version): bool { // ... });`
    // ->addFromTags('v2.0.*')
    // ->add('2.0', '2.0 branch')

    // ->add('main', 'Main Branch')
    ->add("develop", "Development Branch");

$dirs  =[
    "build" => $dir . "docs/build/%version%",
    "cache" => $dir . "docs/cache/%version%",
    "source" => $dir,
];

return new Doctum($iterator, [
    'versions'             => $versions,
    'title'                => 'CreativeLibrary API',
    'language'             => 'en', // Could be 'fr'
    'build_dir'            => $dirs['build'],
    'cache_dir'            => $dirs['cache'],
    'source_dir'           => $dirs['source'],
    'remote_repository'    => new GitHubRemoteRepository('559labs/creative-library', dirname($dir)),
    'default_opened_level' => 2, // optional, 2 is the default value
]);