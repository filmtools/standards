# FilmTools · Standards

**Still in experimental state**

## Installation

```bash
$ composer require filmtools/standards
```



## Interfaces and Traits


### The StandardInterface

```php
<?php
use FilmTools\Standards\StandardInterface;

// Returns a name or short description of this developing standard.
public function getName() : string;

// Returns the minimum film density of interest
public function getDmin() : float;

// Returns the maximum film density of interest
public function getDmax() : float;

// Returns the file path to CSV with norm data
public function getNormDataFile() : string;
```



### StandardProviderInterface

```php
<?php
use FilmTools\Standards\StandardProviderInterface;

// Returns the Standard instance, or null.
public function getStandard() : ?StandardInterface;
```



### StandardProviderTrait

This trait implements the **getStandard** method as a public **standard** member attribute.

```php
<?php
use FilmTools\Standards\StandardProviderTrait;
use FilmTools\Standards\StandardProviderInterface;

class MyClass implements StandardProviderInterface {
  use StandardProviderTrait;
}

$foo = new MyClass;

print_r( $foo->standard );
print_r( $foo->getStandard() );
```



### StandardAwareInterface

The *StandardAwareInterface* extends *StandardProviderInterface*.

```php
<?php
use FilmTools\Standards\StandardAwareInterface;

// Sets the Standard instance.
public function setStandard( StandardInterface $standard);
```



### StandardAwareTrait

The *StandardAwareTrait* uses *StandardProviderTrait* and implements **setStandard** method:

```php
<?php
use FilmTools\Standards\StandardAwareTrait;
use FilmTools\Standards\StandardAwareInterface;
use FilmTools\Standards\TraditionalStandard;

class MyClass implements StandardAwareInterface {
  use StandardAwareTrait;
}

$foo = new MyClass;
$foo->setStandard( new TraditionalStandard );
print_r( $foo->standard );
print_r( $foo->getStandard() );
```





## Classes

### The Standard Factory

This callable class creates a *StandardInterface* instance according to the developing standard name. The result is an extension of the *Standard* class.

The constructor accepts a name of the default standard which defaults to `iso6`.

See the examples below on how to setup a developing standard.

```php
<?php
use FilmTools\Standards\StandardsFactory;

$standard_factory = new StandardsFactory;
$standard_factory = new StandardsFactory("iso6");

// Call without standard name
$standard = $standard_factory();

echo get_class($standard);
// FilmTools\Standards\TraditionalStandard
```



### Standard classes

#### ISO 6 (Traditional Standard)

```php
<?php
use FilmTools\Standards\TraditionalStandard;
use FilmTools\Standards\TraditionalInterface;

echo TraditionalInterface::DMIN; // 0.1
echo TraditionalInterface::DMAX; // 1.29

$standard = new TraditionalStandard;
$standard = $standard_factory("iso6");
$standard = $standard_factory("traditional");

echo $standard->getName(); // "Traditional (ISO6)"
echo $standard->getDmin(); // 0.1
echo $standard->getDmax(); // 1.29
echo $standard->getNormDataFile // "/path/to/normdensities-iso6.csv"
```



#### Lambrecht/Woodhouse Standard

Ralph W. Lambrecht and Chris Woodhouse work in their famous book “Way Beyond Monochrome” with slightly higher density values.

```php
<?php
use FilmTools\Standards\LambrechtWoodhouseStandard;
use FilmTools\Standards\LambrechtWoodhouseInterface;

echo LambrechtWoodhouseInterface::DMIN; // 0.17
echo LambrechtWoodhouseInterface::DMAX; // 1.37

$standard = $standard_factory("wbm");
$standard = new LambrechtWoodhouseStandard;

echo $standard->getName(); // "Way Beyond Monochrome (Lambrecht/Woodhouse)"
echo $standard->getDmin(); // 0.17
echo $standard->getDmax(); // 1.37
echo $standard->getNormDataFile // "/path/to/normdensities-wbm.csv"
```



#### Kodak Standard

The Kodak standard extends from *TraditionalStandard*.

```php
<?php
use FilmTools\Standards\KodakStandard;

$standard = $standard_factory("kodak");
$standard = $standard_factory("ci");
$standard = new KodakStandard;

echo $standard->getName(); // "Contrast Index (Kodak)"
echo $standard->getDmin(); // 0.1
echo $standard->getDmax(); // 1.29
echo $standard->getNormDataFile // "/path/to/normdensities-ci.csv"
```



#### Ilford Standard

The Ilford standard extends from *TraditionalStandard*.

```php
<?php
use FilmTools\Standards\IlfordStandard;

$standard = $standard_factory("ilford");
$standard = $standard_factory("gbar");
$standard = new IlfordStandard;

echo $standard->getName(); // "G-bar (Ilford)"
echo $standard->getDmin(); // 0.1
echo $standard->getDmax(); // 1.29
echo $standard->getNormDataFile // "/path/to/normdensities-iso6.csv"
```

