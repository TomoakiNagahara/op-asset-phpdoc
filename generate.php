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

/**	Check if the phpDocumentor file exists
 *
 * This script checks if the 'phpdoc' file exists in the current directory.
 * If it does not exist, it downloads the latest version of phpDocumentor.
 */
if(!file_exists('phpdoc') ){
	/**	Download and install phpDocumentor
	 *
	 * This script downloads the latest version of phpDocumentor,
	 * a tool for generating documentation from PHP source code.
	 */
	`wget -O phpdoc https://phpdoc.org/phpDocumentor.phar`;

	/**	Make the downloaded file executable
	 *
	 * After downloading, we change the permissions of the file to make it executable.
	 * This is necessary to run the tool.
	 */
	`chmod +x phpdoc`;
}

/**	Run phpDocumentor to generate documentation
 *
 * This command runs phpDocumentor with the specified options:
 * - `-d ../../` specifies the directory to scan for PHP files.
 * - `-t ./` specifies the target directory where the documentation will be generated.
 * - `--title onepiece-framework` sets the title of the documentation.
 */
$git_root = realpath(__DIR__ . '/../../');
`./phpdoc run -d {$git_root} -t ./ --title onepiece-framework`;
