<?php
/**	op-asset-phpdoc:/generate.php
 *
 * <pre>
 * php ./generate.php
 * </pre>
 *
 * @created    2025-06-15
 * @moved      2025-10-02 from op-skeleton-2030:/document/generate.php
 * @version    1.0
 * @package    op-asset-phpdoc
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

//	...
$url       = 'https://phpdoc.org/phpDocumentor.phar';
$test_file = __DIR__.'/.touch';
$phpdoc    = __DIR__.'/phpdoc';
//$phar    = 'phpDocumentor.phar';

/**	Testing Permissions.
 *
 * Testing write permissions in the current directory.
 * If this script cannot create a file, it will notify the user.
 */
if( touch($test_file) ){
	// Clean up after success.
	unlink($test_file);
	echo "OK: You have permission to write in this directory.\n";
}else{
	echo "\n";
	echo "ERROR:\n";
	echo "You do not have permission to create a file in this directory.\n";
	echo "Please adjust the directory permissions and try again.\n";
	echo "\n";
	exit(__LINE__);
}

/**	Check if the phpDocumentor file exists
 *
 * This script checks if the 'phpdoc' file exists in the current directory.
 * If it does not exist, it downloads the latest version of phpDocumentor.
 */
if(!file_exists($phpdoc) ){
	//	...
	echo "phpDocumentor not found. Downloading...\n";

	/**	Download and install phpDocumentor
	 *
	 * This script downloads the latest version of phpDocumentor,
	 * a tool for generating documentation from PHP source code.
	 */
	$wget = trim(shell_exec('command -v wget 2>/dev/null') ?? '');
	if( $wget ){
		`wget -O {$phpdoc} {$url}`;
	}else{
		if( $data = file_get_contents($url) ){
			file_put_contents($phpdoc, $data);
		}else{
			echo "\nERROR: file_get_contents() is failed.\n\n";
			exit(__LINE__);
		}
	}
}

/**	Make the downloaded file executable
 *
 * After downloading, we change the permissions of the file to make it executable.
 * This is necessary to run the tool.
 */
if( file_exists($phpdoc) ){
	`chmod +x {$phpdoc}`;
}else{
	echo "\nERROR: $phpdoc does not found.\n\n";
	exit(__LINE__);
}

/**	Run phpDocumentor to generate documentation
 *
 * -d {source}  : directory to scan
 * -t {target}  : output directory (here: current)
 * --title      : documentation title
 *
 * This command runs phpDocumentor with the specified options:
 * - `-d ../../` specifies the directory to scan for PHP files.
 * - `-t ./` specifies the target directory where the documentation will be generated.
 * - `--title onepiece-framework` sets the title of the documentation.
 */
$source = trim(`git rev-parse --show-superproject-working-tree`);
$target = __DIR__.'/content/';

`{$phpdoc} run -d {$source} -t {$target} --title onepiece-framework`;

/**	Display a completion message after documentation generation.
 *
 */
echo "\n\n";
echo "Documentation generation completed successful.\n";
echo "You can run this command multiple times.\n";
echo "If you update the Git repository, you'll need to generate new documentation.\n";
echo "\n";
