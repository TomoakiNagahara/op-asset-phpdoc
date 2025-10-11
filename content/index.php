<?php
/**	op-asset-phpdoc:/index.php
 *
 * @created   2025-10-02
 * @version   1.0
 * @package   op-asset-phpdoc
 * @author    Tomoaki Nagahara
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**	declare
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

//	...
if( file_exists('index.html') ){
	include('index.html');
	return;
}

?>
<section data-translation="true">
	<h1>Reference of the ONEPIECE Framework</h1>
	<p>
		The API reference has not been generated yet.
		To generate the reference, follow the steps below:
	</p>
	<ul>
		<li>
			Open the terminal application.
		</li>
		<li>
			Change the current directory:
			<code>cd <?= __DIR__ ?></code>
		</li>
		<li>
			Run the following command:
			<code>php ./generate.php</code>
		</li>
		<li>
			After the process is complete, reload this page.
		</li>
	</ul>
</section>
