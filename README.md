MinimalOriginal PageBundle
========

The page bundle for Minimal

Register bundle
========
$bundles = [
    ...
    new MinimalOriginal\PageBundle\MinimalPageBundle(),
];

Register routes
========
minimal_page:
    resource: "@MinimalPageBundle/Resources/config/routing.yml"
    prefix:   /

Command to launch
========
bin/console minimal_page:create-first-page
