<?php

/**
* 
*/
class Country_Rearrange_Model_Resource_Directory_Country_Collection extends Mage_Directory_Model_Resource_Country_Collection
{
	
    public function toOptionArray($emptyLabel = ' ')
    {
        $options = $this->_toOptionArray('country_id', 'name', array('title' => 'iso2_code'));

        $sort = array();
        foreach ($options as $data) {
            $name = Mage::app()->getLocale()->getCountryTranslation($data['value']);
            if (!empty($name)) {
                $sort[$name] = $data['value'];
            }
        }

        Mage::helper('core/string')->ksortMultibyte($sort);
        $options = array();
        foreach ($sort as $label => $value) {
            $options[] = array(
                'value' => $value,
                'label' => $label
            );
        }

        if (count($options) > 0 && $emptyLabel !== false) {
            array_unshift($options, array('value' => '', 'label' => $emptyLabel));
        }
        $options = $this->rearrange($options);
        return $options;
    }

    public function rearrange($options)
    {
    	$indx = array(
    		//Don't Change this Index
    		array
	        (
	            'value' => '',
	            'index' => ''
	        ),
    		//Safe to add indexes from here onwards
    		array
	        (
	            'value' => 'PK',
	            'index' => '1'
	        ),
	        array
	        (
	            'value' => 'US',
	            'index' => '2'
	        ),
	        array
	        (
	            'value' => 'GB',
	            'index' => '3'
	        ),
	    	array
	        (
	            'value' => 'CA',
	            'index' => '4'
	        ),
	    	array
	        (
	            'value' => 'AU',
	            'index' => '5'
	        ),
	    	array
	        (
	            'value' => 'AE',
	            'index' => '6'
	        )
        );
        //this is the count of indexes
		$ic = count($indx);
		//this is the count of main array
		$mc = count($options);
		for ($i=1; $i < $ic ; $i++) { 
			for ($j=0; $j < $mc; $j++) { 
				if ($options[$j]['value'] == $indx[$i]['value']) {
					$temp = $options[$indx[$i]['index']];
					$options[$indx[$i]['index']] = $options[$j];
					$options[$j] = $temp;
				}
			}
		}
    	return $options;
    }
}