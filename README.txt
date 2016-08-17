Welcome to Availability Generator!

This script will let you generate a real time availability.

The key of this script is let you load data from differents formats (CSV, JSON, and XML) and generate differentes types of outputs depending your needs.

The current outputs supported are: CSV, JSON, XML and through SCREEN TERMINAL.

[REQUIREMENTS]

Before to use the script you will need install some third party libraries:

	- pear/console_table: Used for to draw pretty tables through terminal.
	- phpunit/phpunit: Used for to run the unitary tests. (Requires PHP >= 5.6.0)

[INSTALL]

You will need composer installed in your system before to run the next command:

	$ composer install

	References: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx

[USAGE]

After install the third party libraries you will can start tu use the script from command line.

Simply call the script (be sure have execution permissions)...

	$ ./availability-generator.php

...and the script will show you the help through the terminal.

Below you have a briefing of the help shown by the script:

	Usage:

		availability-generator.php [options]

	This script generate a real time availability from a file resource. The next file formats are supported: XML, JSON, and CSV.

	Optional arguments:

	  -h, --help          Show this help message.
	  -s, --source        Source file. Supported formats are: XML, JSON, and CSV.
	  -o, --output        Output file. This parameter is optional. If you don't choose an output file the script will show the output through the terminal.
	  -f, --format        Output file format. Supported formats are: XML, JSON, and CSV. Only required if you use output file.

[EXAMPLES]

	- Read a CSV file and show the output through the terminal.

		$ ./availability-generator.php -s examples/dummy.csv

	- Read a XML file and generate a JSON file output.

		$ ./availability-generator.php -s examples/dummy.xml -o output.json -f json

[TESTS]

	If you want run the test, you can use the next command:

		$ phpunit --bootstrap vendor/autoload.php src/Jarenal/Tests

	NOTE: Before run the tests you will need install:

		- PHPUNIT: https://phpunit.de/manual/current/en/installation.html
		- phpunit/phpunit package through composer. (see INSTALL step).

[CONTACT]

Please, feel free of contact through my email address jguidos(AT)hotmail(DOT)com me if you have questions or suggestions.








