<?php

namespace DoctrineORMModule\Proxy\__CG__\Core\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Country extends \Core\Entity\Country implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     */
    public function __get($name)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', array($name));

        return parent::__get($name);
    }

    /**
     * {@inheritDoc}
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__set', array($name, $value));

        return parent::__set($name, $value);
    }



    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'name', 'alpha2', 'alpha3', 'country_code', 'iso_3166_2', 'region_code', 'sub_region_code', 'created', 'status');
        }

        return array('__isInitialized__', 'id', 'name', 'alpha2', 'alpha3', 'country_code', 'iso_3166_2', 'region_code', 'sub_region_code', 'created', 'status');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Country $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getArrayCopy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArrayCopy', array());

        return parent::getArrayCopy();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlpha2($alpha2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlpha2', array($alpha2));

        return parent::setAlpha2($alpha2);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlpha2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlpha2', array());

        return parent::getAlpha2();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlpha3($alpha3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlpha3', array($alpha3));

        return parent::setAlpha3($alpha3);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlpha3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlpha3', array());

        return parent::getAlpha3();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountryCode($countryCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountryCode', array($countryCode));

        return parent::setCountryCode($countryCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountryCode', array());

        return parent::getCountryCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setIso31662($iso31662)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIso31662', array($iso31662));

        return parent::setIso31662($iso31662);
    }

    /**
     * {@inheritDoc}
     */
    public function getIso31662()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIso31662', array());

        return parent::getIso31662();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegionCode($regionCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegionCode', array($regionCode));

        return parent::setRegionCode($regionCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegionCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegionCode', array());

        return parent::getRegionCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubRegionCode($subRegionCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubRegionCode', array($subRegionCode));

        return parent::setSubRegionCode($subRegionCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubRegionCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubRegionCode', array());

        return parent::getSubRegionCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated($created)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', array($created));

        return parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', array());

        return parent::getCreated();
    }

}
