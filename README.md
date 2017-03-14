# Magneto-Country-Sort-Module

Magneto Country Sort Module is created to sort the countries according to our custom need.
For Example we see a list of countries like:

Afghanistan
Albania
Algeria
Andorra
Angola
Antigua and Barbuda
Argentina

But you want these countries to display us in a different way like:

Pakistan
United States of America
United Kingdom
Canada
Australia
UAE
Afghanistan
Albania
Algeria
Andorra
Angola
Antigua and Barbuda
Argentina

You are at right place.

#How to Install

Just Copy the module to your app/code/local/Country and the file placed in etc/modules to app/etc/modules

#Configure

In the Collection.php you'll see this method

public function rearrange($options)
{
	$indx = array(
	//Don't Change this Index
		array
		(
			'value' => '',
			'index' => '0'
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
		)
		...
		return $options;
}

Just add or remove the array

array
(
	'value' => 'PK',
	'index' => '1'
),

the index over here shows the position of the country for example if you want Pakistan to be on 1st position then you'll have to change the index.

#That's it...
