<?php namespace SeBuDesign\BuckarooJson\Partials;

trait Data
{
    /**
     * Dynamically set and get values
     *
     * @param string $sName      The name of the called function
     * @param array  $aArguments The arguments passed to the function
     *
     * @return $this|mixed
     */
    public function __call($sName, $aArguments)
    {
        if (!isset($this->oData)) {
            $this->oData = new \SeBuDesign\BuckarooJson\Parts\Data();
        }

        // Check if the method exists in the class
        if (!method_exists($this, $sName)) {
            if (strpos($sName, 'set') === 0 && count($aArguments) == 1) {
                // With a method that starts with set, set the data

                $sName = str_replace('set', '', $sName);
                $this->oData->{$sName} = $aArguments[ 0 ];

                return $this;
            } elseif (strpos($sName, 'get') === 0) {
                // With a method that starts with get, get the data

                $sName = str_replace('get', '', $sName);

                return (isset($this->oData->{$sName}) ? $this->oData->{$sName} : false);
            }
        }
    }
}