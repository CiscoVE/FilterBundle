FilterBundle
============

Bundle for Symfony 2 to create configurable filter forms

When registering this bundle in the AppKernel pass $this to the bundle
class instantiation.

A set of filters can consist of built-in filters or filters defined in
application level bundles. Such a filter must extend AbstractFilter and
be defined as a tagged service. Tags required are 'name' and 'alias',
where tag 'name' must have the value 'cisco.filtertype' and tag 'alias'
the name by which the filter type will be used in the configuration.
