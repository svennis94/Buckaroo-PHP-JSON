<?php namespace SeBuDesign\BuckarooJson\Parts;

use SeBuDesign\BuckarooJson\Partials\Data;

/**
 * Class Service
 *
 * @package SeBuDesign\BuckarooJson\Parts
 *
 * @method $this setName( string $sName )
 * @method string|boolean getName()
 *
 * @method $this setAction( string $sAction )
 * @method string|boolean getAction()
 *
 * @method $this setVersion( integer $iVersion )
 * @method string|boolean getVersion()
 */
class Service
{
    use Data;

    /**
     * Adds a service parameter
     *
     * @param string       $sName      The name of the service parameter
     * @param mixed        $mValue     The value of the service parameter
     * @param null|integer $iGroupId   The group id of the service parameter
     * @param null|string  $sGroupType The group type of the service parameter
     *
     * @return $this
     */
    public function addParameter($sName, $mValue, $iGroupId = null, $sGroupType = null)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->Parameters )) {
            $this->oData->Parameters = [];
        }

        if ($this->hasParameter($sName)) {
            $this->removeParameter($sName);
        }

        $oServiceParameter = new ServiceParameter();
        $oServiceParameter->setName($sName);
        $oServiceParameter->setValue($mValue);
        $oServiceParameter->setGroupID($iGroupId);
        $oServiceParameter->setGroupType($sGroupType);

        $this->oData->Parameters[] = $oServiceParameter;

        return $this;
    }

    /**
     * Gets a specific service parameter
     *
     * @param string $sName The string of the parameter to find
     *
     * @return boolean|ServiceParameter
     */
    public function getParameter($sName)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->Parameters ) || empty( $this->oData->Parameters )) {
            return false;
        }

        $mFound = false;
        foreach ($this->oData->Parameters as $oServiceParameter) {
            if ($oServiceParameter->getName() == $sName) {
                $mFound = $oServiceParameter;
                break;
            }
        }

        return $mFound;
    }

    /**
     * Checks if the service parameter exists
     *
     * @param string $sName The string of the parameter to find
     *
     * @return boolean
     */
    public function hasParameter($sName)
    {
        return ( $this->getParameter($sName) === false ? false : true );
    }

    /**
     * Remove a specific service parameter
     *
     * @param string $sName The string of the parameter to find
     *
     * @return $this
     */
    public function removeParameter($sName)
    {
        $this->ensureDataObject();

        if (!isset( $this->oData->Parameters ) || empty( $this->oData->Parameters )) {
            return $this;
        }

        foreach ($this->oData->Parameters as $iIndex => $oServiceParameter) {
            if ($oServiceParameter->getName() == $sName) {
                unset( $this->oData->Parameters[ $iIndex ] );
                break;
            }
        }

        return $this;
    }
}